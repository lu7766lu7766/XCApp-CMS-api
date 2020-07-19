# APP管理

### APP自動生成

> 取得列表

```
{
  "code": 200,
  "data": [
    {
      "id": 1,
      "uuid": "cc844f7e-786e-11e9-a90d-0242c0a86003",
      "code": "APN-001",
      "name": "APN_001",
      "package_name": "package.com",
      "status": "pending",
      "account_id": 1,
      "platform": {
        "baidu": "https://apk.apps99.cc/appcms/N-APP0030/N-APP0030_ToBaidu_Release_1.0.0.apk",
        "xiaomi": "https://apk.apps99.cc/appcms/N-APP0030/N-APP0030_ToXiaomi_Release_1.0.0.apk"
      },
      "notify_channel": "xiaomi",
      "created_at": "2019-05-17 14:42:47",
      "updated_at": "2019-05-17 16:20:08",
      "deleted_at": null,
      "used": [
        {
          "id": 332,
          "files_status": "off",
          "files_url": [
            "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
          ],
          "files_name": "9d42f8d9680fd366aaa119a14eeabbe9.zip",
          "files_mime": "zip",
          "files_path": "public/uploads/2019/05/16/",
          "files_storage_path": [
            "public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
          ],
          "files_source_name": "config.zip",
          "created_at": "2019-05-16 17:08:41",
          "updated_at": "2019-05-16 17:08:41",
          "pivot": {
            "file_used_model_id": 1,
            "files_id": 332,
            "file_used_model_type": "Modules\\AppAutomation\\Entities\\AppAutomation"
          }
        }
      ]
    }
  ]
}
```

> 取得列表總筆數

```
{
  "code": 200,
  "data": "3"
}
```

> 單筆明細
                    
```
{
  "code": 200,
  "data": {
    "id": 1,
    "uuid": "cc844f7e-786e-11e9-a90d-0242c0a86003",
    "code": "APN-001",
    "name": "APN_001",
    "package_name": "package.com",
    "status": "pending",
    "account_id": 1,
    "platform": {
      "baidu": "https://apk.apps99.cc/appcms/N-APP0030/N-APP0030_ToBaidu_Release_1.0.0.apk",
      "xiaomi": "https://apk.apps99.cc/appcms/N-APP0030/N-APP0030_ToXiaomi_Release_1.0.0.apk"
    },
    "notify_channel": "xiaomi",
    "config": null,
    "created_at": "2019-05-17 14:42:47",
    "updated_at": "2019-05-17 16:20:08",
    "deleted_at": null,
    "used": [
      {
        "id": 332,
        "files_status": "off",
        "files_url": [
          "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
        ],
        "files_name": "9d42f8d9680fd366aaa119a14eeabbe9.zip",
        "files_mime": "zip",
        "files_path": "public/uploads/2019/05/16/",
        "files_storage_path": [
          "public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
        ],
        "files_source_name": "config.zip",
        "created_at": "2019-05-16 17:08:41",
        "updated_at": "2019-05-16 17:08:41",
        "pivot": {
          "file_used_model_id": 1,
          "files_id": 332,
          "file_used_model_type": "Modules\\AppAutomation\\Entities\\AppAutomation"
        }
      }
    ]
  }
}
```

> 檔案上傳
                    
```
{
  "code": 200,
  "data": {
    "files_name": "f02f71de5a051aac227e52faf72415fb.zip",
    "files_path": "public/uploads/2019/05/23/",
    "files_url": [
      "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/public/uploads/2019/05/23/f02f71de5a051aac227e52faf72415fb.zip"
    ],
    "files_storage_path": [
      "public/uploads/2019/05/23/f02f71de5a051aac227e52faf72415fb.zip"
    ],
    "files_mime": "zip",
    "files_source_name": "config.zip",
    "files_status": "off",
    "updated_at": "2019-05-23 18:41:51",
    "created_at": "2019-05-23 18:41:51",
    "id": 333
  }
}
```

> 新增資料
                    
```
{
  "code": 200,
  "data": {
    "uuid": "5105d264-fcab-43a1-bf4c-f6760e1f409",
    "code": "APN-002",
    "name": "RE",
    "package_name": "package.com",
    "status": "complete",
    "account_id": 7,
    "platform": {
      "360": null,
      "baidu": null
    },
    "notify_channel": "xiaomi",
    "updated_at": "2019-05-23 20:03:32",
    "created_at": "2019-05-23 20:03:32",
    "id": 2,
    "used": [
      {
        "id": 333,
        "files_status": "off",
        "files_url": [
          "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/public/uploads/2019/05/23/f02f71de5a051aac227e52faf72415fb.zip"
        ],
        "files_name": "f02f71de5a051aac227e52faf72415fb.zip",
        "files_mime": "zip",
        "files_path": "public/uploads/2019/05/23/",
        "files_storage_path": [
          "public/uploads/2019/05/23/f02f71de5a051aac227e52faf72415fb.zip"
        ],
        "files_source_name": "config.zip",
        "created_at": "2019-05-23 18:41:51",
        "updated_at": "2019-05-23 20:03:32",
        "pivot": {
          "file_used_model_id": 2,
          "files_id": 333,
          "file_used_model_type": "Modules\\AppAutomation\\Entities\\AppAutomation"
        }
      }
    ]
  }
}
```

> 更新資料
                    
```
{
  "code": 200,
  "data": {
    "id": 2,
    "uuid": "5105d264-fcab-43a1-bf4c-f6760e1f409",
    "code": "APN-002",
    "name": "RE",
    "package_name": "package.com",
    "status": "complete",
    "account_id": 7,
    "platform": {
      "baidu": "http://www.baidu.com",
      "xiaomi": null
    },
    "notify_channel": "aurora",
    "created_at": "2019-05-23 20:03:32",
    "updated_at": "2019-05-24 10:02:55",
    "deleted_at": null,
    "used": [
      {
        "id": 332,
        "files_status": "off",
        "files_url": [
          "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
        ],
        "files_name": "9d42f8d9680fd366aaa119a14eeabbe9.zip",
        "files_mime": "zip",
        "files_path": "public/uploads/2019/05/16/",
        "files_storage_path": [
          "public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
        ],
        "files_source_name": "config.zip",
        "created_at": "2019-05-16 17:08:41",
        "updated_at": "2019-05-24 10:02:55",
        "pivot": {
          "file_used_model_id": 2,
          "files_id": 332,
          "file_used_model_type": "Modules\\AppAutomation\\Entities\\AppAutomation"
        }
      }
    ]
  }
}
```

> 刪除資料
                    
```
{
  "code": 200,
  "data": {
    "count": true
  }
}
```

> 打包

```
{
  "code": 200,
  "data": {
    "result": false
  }
}
```
> APK完成回調
                    
```
{
  "code": 200,
  "data": {
    "id": 1,
    "uuid": "cc844f7e-786e-11e9-a90d-0242c0a86003",
    "code": "APN-001",
    "name": "APN_001",
    "package_name": "package.com",
    "status": "complete",
    "account_id": 1,
    "platform": {
      "xiaomi": "https://apk.apps99.cc/appcms/N-APP0030/N-APP0030_ToXiaomi_Release_1.0.0.apk"
    },
    "notify_channel": "xiaomi",
    "created_at": "2019-05-17 14:42:47",
    "updated_at": "2019-05-24 17:57:51",
    "deleted_at": null,
    "used": [
      {
        "id": 332,
        "files_status": "off",
        "files_url": [
          "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
        ],
        "files_name": "9d42f8d9680fd366aaa119a14eeabbe9.zip",
        "files_mime": "zip",
        "files_path": "public/uploads/2019/05/16/",
        "files_storage_path": [
          "public/uploads/2019/05/16/9d42f8d9680fd366aaa119a14eeabbe9.zip"
        ],
        "files_source_name": "config.zip",
        "created_at": "2019-05-16 17:08:41",
        "updated_at": "2019-05-24 17:57:51",
        "pivot": {
          "file_used_model_id": 1,
          "files_id": 332,
          "file_used_model_type": "Modules\\AppAutomation\\Entities\\AppAutomation"
        }
      }
    ]
  }
}
```
