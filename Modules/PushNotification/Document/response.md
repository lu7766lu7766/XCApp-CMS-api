# Push Notification Api

## 取得Push Notification 管理列表
```
{
"data": [
        {
            "id": 37,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 20:02:35",
            "updated_at": "2018-09-25 20:02:35",
            "app_managements": [
                {
                    "id": 1,
                    "code": "test",
                    "name": "test",
                    "category": "lottery",
                    "mobile_device": "ios",
                    "redirect_switch": "on",
                    "redirect_url": "testt",
                    "update_switch": "on",
                    "update_url": "test",
                    "update_content": "test",
                    "qq_id": "test",
                    "wechat_id": "test",
                    "customer_service": "",
                    "status": "unpublished",
                    "topic_id": "21231312",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "pivot": {
                        "push_notification_id": 37,
                        "app_management_id": 1
                    }
                },
                {
                    "id": 2,
                    "code": "test",
                    "name": "test",
                    "category": "lottery",
                    "mobile_device": "ios",
                    "redirect_switch": "on",
                    "redirect_url": "test",
                    "update_switch": "on",
                    "update_url": "test",
                    "update_content": "test",
                    "qq_id": "tet",
                    "wechat_id": null,
                    "customer_service": null,
                    "status": "unpublished",
                    "topic_id": "2121",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null,
                    "pivot": {
                        "push_notification_id": 37,
                        "app_management_id": 2
                    }
                }
            ]
        },
        {
            "id": 36,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 20:02:08",
            "updated_at": "2018-09-25 20:02:08",
            "app_managements": []
        },
        {
            "id": 33,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 20:00:09",
            "updated_at": "2018-09-25 20:00:09",
            "app_managements": []
        },
        {
            "id": 22,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:38:57",
            "updated_at": "2018-09-25 18:38:57",
            "app_managements": []
        },
        {
            "id": 21,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:27:22",
            "updated_at": "2018-09-25 18:27:22",
            "app_managements": []
        },
        {
            "id": 20,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:18:18",
            "updated_at": "2018-09-25 18:18:18",
            "app_managements": []
        },
        {
            "id": 19,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:11:56",
            "updated_at": "2018-09-25 18:11:56",
            "app_managements": []
        },
        {
            "id": 18,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:09:18",
            "updated_at": "2018-09-25 18:09:18",
            "app_managements": []
        },
        {
            "id": 17,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:05:17",
            "updated_at": "2018-09-25 18:05:17",
            "app_managements": []
        }
    ],
    "code": 200
}
```
## 取得TopicList列表
```
{
    "data": {
            "id": 1,
            "topic_id": "arn:aws:sns:ap-southeast-1:748166261271:XinjiangFutures-Dev-Baidu"
        },
    "code": 200,
}
```
## 取得Push Notification列表總比數
```
{
    "data":{
        "count": 0
    },
    "code": 200,
}
```
## 新增Push Notification 推播內容資訊
```
{
    "data": {
        "content": "rice food",
        "schedule_time": 1553338800,
        "updated_at": "2019-03-22 15:29:19",
        "created_at": "2019-03-22 15:29:19",
        "id": 53
    },
    "code": 200
}
```
## 編輯Push Notification 管理資訊
```
{
    "data": {
        "id": 1,
        "content": "1",
        "app_management_id": 1,
        "deleted_at": null,
        "created_at": "2018-09-18 12:55:57",
        "updated_at": "2018-09-18 12:55:57"
    },
    "code": 200
}
```
## 更新Push Notification 管理資訊
```
{
    "data": {
        "id": 48,
        "content": "fly trutle",
        "deleted_at": null,
        "created_at": "2019-03-18 13:50:26",
        "updated_at": "2019-03-22 15:28:19",
        "schedule_time": 1553331720
    },
    "code": 200,
    "client_request_body": {
        "id": "1",
        "content": "test",
        "app_management_id": "1"
    }
}
```
## 刪除Push Notification 管理資訊
```
{
    "data": {
        "id": 3,
        "content": "1",
        "app_management_id": 1,
        "deleted_at": {
            "date": "2018-09-18 14:37:05.958847",
            "timezone_type": 3,
            "timezone": "Asia/Taipei"
        },
        "created_at": "2018-09-18 14:36:59",
        "updated_at": "2018-09-18 14:37:05"
    },
    "code": 200,
    "client_request_body": {
        "id": "3"
    }
}
```
## 推播Push Notification 管理資訊
```
{
    "data": {
            "id": 18,
            "content": "123456",
            "deleted_at": null,
            "created_at": "2018-09-25 18:09:18",
            "updated_at": "2018-09-25 18:09:18"
        },
        "code": 200,
        "client_request_body": {
            "id": "18"
        },
}
```

