package Service

import (
    "fmt"
    "github.com/3rdpay/xc-golang-umeng-push/src/Constants"
    "github.com/3rdpay/xc-golang-umeng-push/src/Service"
    "log"
    "push/Config"
    "push/Constants/Env"
    "push/Repository"
    "strconv"
    "sync"
)

var wg sync.WaitGroup

type PushService struct {
}

func NewPushService() *PushService {
    return &PushService{}
}

func (this *PushService) Push(appId uint, message string) {
    repo := Repository.NewAppManageRepo()
    app, error := repo.FindWithDeviceInfo(appId)
    if error == nil {
        if len(app.DeviceInfo) > 0 {
            deviceTokens := make([]string, len(app.DeviceInfo))
            for key, device := range app.DeviceInfo {
                deviceTokens[key] = device.Identify
            }
            maxPushCountStr := Config.Get(Env.MAX_PUSH_COUNT)
            //一次最大推送數量
            maxPushCount, e := strconv.Atoi(maxPushCountStr)
            if e != nil {
                fmt.Println(e)
                maxPushCount = 500
            }
            //最大推送次數
            maxPushTime := (len(deviceTokens) / maxPushCount)
            if ((len(deviceTokens) % maxPushCount) > 0) {
                maxPushTime = maxPushTime + 1
            }

            var groupDeviceToken [][]string
            for i := 0; i < maxPushTime; i++ {
                remainder := (i + 1) * maxPushCount
                if i+1 == maxPushTime {
                    remainder = len(deviceTokens)
                }
                groupDeviceToken = append(groupDeviceToken, deviceTokens[i*maxPushCount:remainder])
            }

            topic := app.GetTopic()
            iosClient := Service.NewIOSClient(topic.AppKey, topic.AppSecret, Constants.PRODUCT)
            alert := Service.AlertParams{
                Title:    app.Name,
                SubTitle: app.Name,
                Body:     message,
            }
            aps := Service.ApsParams{Alert: alert}
            payload := Service.Payload{
                Aps: aps,
            }
            fmt.Println("app_id: " + fmt.Sprint(appId) + " start send....")
            wg.Add(maxPushTime)
            for i := 0; i < maxPushTime; i++ {
                go this.currencyPublish(iosClient, payload, deviceTokens)
            }
            wg.Wait()

        }
    }
}
func (PushService) currencyPublish(iosClient *Service.IOSClient, payload Service.Payload, deviceToken []string) {
    push, err := iosClient.ListPush(payload, deviceToken)
    if err != nil {
        log.Fatalln(err)
    } else {
        defer push.Close()
        if push.IsConnectSuccess() {
            if !push.IsErrorOccur() {
                fmt.Printf(
                    "success Send title: %s message: %s messageID: %s \n",
                    payload.Aps.Alert.Title,
                    payload.Aps.Alert.Body,
                    push.GetMessageId(),
                )
            } else {
                log.Fatalln(push.GetErrorMessage())
            }

        } else {
            log.Fatalln("連接友盟失敗")
        }
    }
    wg.Done()
}
