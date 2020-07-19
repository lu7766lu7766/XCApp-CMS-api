# APP管理

### IP管理

> 取得列表

```
{
  "code": 200,
  "data": [
    {
      "id": 1,
      "ip": "172.16.58.97",
      "type": "whitelist",
      "device": "ios",
      "status": "disable",
      "remark": "備註變更",
      "created_at": "2019-06-06 16:27:45",
      "updated_at": "2019-06-06 16:39:59",
      "deleted_at": null
    },
    {
      "id": 2,
      "ip": "192.168.25.68",
      "type": "whitelist",
      "device": "ios",
      "status": "enable",
      "remark": "自由發揮備註",
      "created_at": "2019-06-06 16:28:21",
      "updated_at": "2019-06-06 16:39:59",
      "deleted_at": null
    }
  ]
}
```

> 取得列表總筆數

```
{
  "code": 200,
  "data": "2"
}
```

> 單筆明細
                    
```
{
  "code": 200,
  "data": {
    "id": 1,
    "ip": "172.16.58.97",
    "type": "whitelist",
    "device": "ios",
    "status": "disable",
    "remark": "備註變更",
    "created_at": "2019-06-06 16:27:45",
    "updated_at": "2019-06-06 16:39:59",
    "deleted_at": null
  }
}
```

> 新增資料
                    
```
{
  "code": 200,
  "data": {
    "ip": "192.168.25.68",
    "type": "whitelist",
    "device": "ios",
    "status": "enable",
    "remark": "自由發揮備註",
    "updated_at": "2019-06-06 16:28:21",
    "created_at": "2019-06-06 16:28:21",
    "id": 2
  }
}
```

> 更新資料
                    
```
{
  "code": 200,
  "data": {
    "ip": "192.168.25.68",
    "type": "whitelist",
    "device": "ios",
    "status": "enable",
    "remark": "自由發揮備註",
    "updated_at": "2019-06-06 16:28:21",
    "created_at": "2019-06-06 16:28:21",
    "id": 2
  }
}
```

> 刪除資料
                    
```
{
  "code": 200,
  "data": {
    "result": true
  }
}
```

### IP資訊

> 取得列表
                    
```
{
  "data": [
    {
      "id": 1,
      "ip": "172.16.58.97",
      "type": "whitelist",
      "device": "ios",
      "status": "enable",
      "remark": "備註變更",
      "created_at": "2019-06-06 16:27:45",
      "updated_at": "2019-06-06 16:39:59",
      "deleted_at": null
    },
    {
      "id": 2,
      "ip": "172.16.40.52",
      "type": "blacklist",
      "device": "ios",
      "status": "enable",
      "remark": "備註變更2",
      "created_at": "2019-06-06 16:28:21",
      "updated_at": "2019-06-10 10:52:31",
      "deleted_at": null
    },
    {
      "id": 3,
      "ip": "172.68.95.84",
      "type": "whitelist",
      "device": "ios",
      "status": "enable",
      "remark": "備註變更3",
      "created_at": "2019-06-10 16:32:36",
      "updated_at": "2019-06-10 16:32:36",
      "deleted_at": null
    }
  ],
  "code": 200
}
```

> 新增資料
                    
```
{
  "code": 200,
  "data": {
    "ip": "192.168.25.68",
    "type": "whitelist",
    "device": "ios",
    "status": "enable",
    "remark": "自由發揮備註",
    "updated_at": "2019-06-06 16:28:21",
    "created_at": "2019-06-06 16:28:21",
    "id": 2
  }
}
```

> 刪除資料
                    
```
{
  "code": 200,
  "data": {
    "result": true
  }
}
```
