package Models

import (
    "encoding/json"
)

type TopId struct {
    AppKey    string `json:"app_key"`
    AppSecret string `json:"app_secret"`
}

type AppManage struct {
    Models
    Name            string   `json:"name"`
    Category        string   `json:"category"`
    MobileDevice    string   `json:"mobile_device"`
    RedirectSwitch  string   `json:"redirect_switch"`
    RedirectUrl     string   `json:"redirect_switch"`
    UpdateSwitch    string   `json:"update_switch"`
    UpdateUrl       string   `json:"update_url"`
    UpdateContent   string   `json:"update_content"`
    QQId            string   `json:"qq_id"`
    WeChatId        string   `json:"wechat_id"`
    CustomerService string   `json:"customer_service"`
    Status          string   `json:"status"`
    TopicId         string   `json:"topic_id"`
    DeletedAt       string   `json:"deleted_at"`
    AccountId       string   `json:"account_id"`
    PushPath        string   `json:"push_path"`
    AppVersion      string   `json:"app_version"`
    AppUrl          string   `json:"app_url"`
    DeviceInfo      []Device `gorm:"foreignkey:AppID"`
}

func (AppManage) TableName() string {
    return "app_management"
}

func (this AppManage) GetTopic() *TopId {
    topic := TopId{}
    json.Unmarshal([]byte(this.TopicId), &topic)
    return &topic
}
