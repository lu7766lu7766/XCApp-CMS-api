# 節點 api Response

> 取得節點地圖

```
{
    "data": [
        {
            "id": 1,
            "enable": "Y", // 啟用/停用
            "display": "Y", // 要不要呈現
            "display_name": "網站管理", // 名稱
            "code": "WEB_MG", // unique code
            "route_uri": "no_function_WEB_MG", // URI
            "parent_id": null, // 父節點
            "created_at": "2018-09-18 14:06:52",
            "updated_at": "2018-09-18 14:06:52",
            "permission": [
                {
                    "permission": 15, // 權限值,對應http method => GET =1 POST =2 PUT =4 DELETE=8
                    "node_id": 1
                }
            ]
        },
        {
            "id": 2,
            "enable": "Y",
            "display": "Y",
            "display_name": "帳號設定",
            "code": "ACC_ST",
            "route_uri": "account/maintain",
            "parent_id": 1,
            "created_at": "2018-09-18 14:06:52",
            "updated_at": "2018-09-18 14:06:52",
            "permission": [
                {
                    "permission": 15,
                    "node_id": 2
                }
            ]
        },
        {
            "id": 3,
            "enable": "Y",
            "display": "N",
            "display_name": "密碼重設",
            "code": "PW_RESET",
            "route_uri": "account/password/reset",
            "parent_id": 1,
            "created_at": "2018-09-18 14:06:52",
            "updated_at": "2018-09-18 14:06:52",
            "permission": [
                {
                    "permission": 15,
                    "node_id": 3
                }
            ]
        }
    ],
    "code": 200,
}
```

> 儲存排序

```
{
   "data": {
           "id": 1,
           "account_id": 5,
            "sort": [
                       "1",
                       "2"
                   ],
           "created_at": "2018-10-18 14:33:48",
           "updated_at": "2018-10-18 14:58:18"
       },
       "code": 200
}
```

> 取得節點排序

```
{
     "data": {
            "sort": [
                        "1",
                        "2"
                    ]
        },
        "code": 200
}
```
