# APP管理Response

#### 取得APP列表
```html
{
    "data": [
            {
                "id": 33,
                "code": "test123QQ123wwqq",
                "name": "waterGOQQ",
                "category": "lottery",
                "mobile_device": "ios",
                "redirect_switch": "off",
                "redirect_url": [
                    "https://tw.yahoo.com",
                    "https://www.google.com.tw"
                ],
                "update_switch": "off",
                "update_url": "https://tw.yahoo.com",
                "update_content": "test12345",
                "qq_id": "qq123",
                "wechat_id": "ww123",
                "customer_service": "cc123",
                "status": "unpublished",
                "topic_id": {
                    "topic": "123abc"
                },
                "created_at": "2018-10-19 15:57:53",
                "updated_at": "2018-10-19 15:57:53",
                "deleted_at": null,
                "account_id": 5,
                "push_path": "aws",
                "account_info": {
                    "id": 5,
                    "account": "funny",
                    "display_name": "系统管理员"
                },
                "app_url": "https://www.google.com.tw",
                "app_version": "1.0.0.0.0.1"
            }
        ],
        "code": 200
}
```

#### 新增APP資訊
```html
{
   "data": {
          "mobile_device": "ios",
          "code": "test123QQ123wwqqh",
          "name": "waterGOQQ",
          "category": "lottery",
          "redirect_switch": "off",
          "redirect_url": [
              "https://tw.yahoo.com",
              "https://www.google.com.tw"
          ],
          "update_switch": "off",
          "update_url": "https://tw.yahoo.com",
          "update_content": "test12345",
          "qq_id": "qq123",
          "wechat_id": "ww123",
          "customer_service": "cc123",
          "status": "unpublished",
          "topic_id": {
              "topic": "123abc"
          },
          "account_id": 5,
          "push_path": "aws",
          "updated_at": "2018-10-19 16:02:53",
          "created_at": "2018-10-19 16:02:53",
          "id": 34,
          "app_url": "https://www.google.com.tw",
          "app_version": "1.0.0.0.0.1"
      },
      "code": 201
}
```

#### 編輯APP資訊
```html
{
    "data": {
        "data": {
               "mobile_device": "ios",
               "code": "test123QQ123wwqqh",
               "name": "waterGOQQ",
               "category": "lottery",
               "redirect_switch": "off",
               "redirect_url": [
                   "https://tw.yahoo.com",
                   "https://www.google.com.tw"
               ],
               "update_switch": "off",
               "update_url": "https://tw.yahoo.com",
               "update_content": "test12345",
               "qq_id": "qq123",
               "wechat_id": "ww123",
               "customer_service": "cc123",
               "status": "unpublished",
               "topic_id": {
                   "topic": "123abc"
               },
               "account_id": 5,
               "push_path": "aws",
               "updated_at": "2018-10-19 16:02:53",
               "created_at": "2018-10-19 16:02:53",
               "id": 34,
               "app_url": "https://www.google.com.tw",
               "app_version": "1.0.0.0.0.1"
           },
           "code": 201
}
```

#### 刪除APP資訊
```html
{
    "data": {
           "mobile_device": "ios",
           "code": "test123QQ123wwqqh",
           "name": "waterGOQQ",
           "category": "lottery",
           "redirect_switch": "off",
           "redirect_url": [
               "https://tw.yahoo.com",
               "https://www.google.com.tw"
           ],
           "update_switch": "off",
           "update_url": "https://tw.yahoo.com",
           "update_content": "test12345",
           "qq_id": "qq123",
           "wechat_id": "ww123",
           "customer_service": "cc123",
           "status": "unpublished",
           "topic_id": {
               "topic": "123abc"
           },
           "account_id": 5,
           "push_path": "aws",
           "updated_at": "2018-10-19 16:02:53",
           "created_at": "2018-10-19 16:02:53",
           "id": 34,
           "app_url": "https://www.google.com.tw",
           "app_version": "1.0.0.0.0.1"
       },
       "code": 201
}
```

#### 取得總筆數
```html
{
    "data": "2",
    "code": 200
}
```

#### 取得搜尋選項
```html
{"data": {
         "category": [
             "lottery",
             "futures",
             "sports"
         ],
         "device": [
             "ios",
             "android"
         ],
         "status": [
             "unpublished",
             "verifying",
             "published",
             "removed"
         ]
     },
     "code": 200
}
```

#### 提供app裝置取得後台app管理資訊
```html
{
   "data": {
           "id": 33,
           "code": "test123QQ123wwqq",
           "name": "waterGOQQ",
           "category": "lottery",
           "mobile_device": "ios",
           "redirect_switch": "off",
           "redirect_url": [
               "https://tw.yahoo.com",
               "https://www.google.com.tw"
           ],
           "update_switch": "off",
           "update_url": "https://tw.yahoo.com",
           "update_content": "test12345",
           "qq_id": "qq123",
           "wechat_id": "ww123",
           "customer_service": "cc123",
           "status": "unpublished",
           "topic_id": {
               "topic": "123abc"
           },
           "created_at": "2018-10-19 15:57:53",
           "updated_at": "2018-10-19 15:57:53",
           "deleted_at": null,
           "account_id": 5,
           "push_path": "aws",
           "account_info": {
               "id": 5,
               "account": "funny",
               "display_name": "系统管理员"
           },
           "app_url": "https://www.google.com.tw",
           "app_version": "1.0.0.0.0.1"
       },
       "code": 200
}
```
#### 新增app device identify
```html
{
    "data": {
        "id": 19,
        "code": "1225522221",
        "name": "testUmeng",
        "category": "sports",
        "mobile_device": "ios",
        "redirect_switch": "on",
        "redirect_url": null,
        "update_switch": "on",
        "update_url": null,
        "update_content": null,
        "qq_id": null,
        "wechat_id": null,
        "customer_service": null,
        "status": "removed",
        "topic_id": {
            "app_key": "5cef53133fc195baf70000e0",
            "app_secret": "pzqzgdz512imnikvmql7vbhxcpn8deva"
        },
        "created_at": "2019-06-06 13:30:25",
        "updated_at": "2019-06-06 13:30:25",
        "deleted_at": null,
        "account_id": 6,
        "push_path": "umeng",
        "app_version": null,
        "app_url": null
    },
    "code": 200
}
```
