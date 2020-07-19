# 節點 api Response

> 取得角色列表

```
{
    "data": [
        {
            "id": 1,
            "display_name": "超級管理員", // 名稱
            "code": "ADMIN", // 代碼
            "enable": "Y", // 啟用/停用
            "is_assign": "N", // 可否被賦予給帳號
            "can_edit": "N", // 可否被編輯
            "created_at": "2018-09-27 15:44:31",
            "updated_at": "2018-09-27 15:44:31"
        },
        {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-09-27 15:44:31",
            "updated_at": "2018-09-27 15:44:31"
        }
    ],
    "code": 200  
}
```

> 取得角色總筆數

```
{
    "data": "2",
    "code": 200  
}
```

> 取得角色資訊

```
{
    "data": {
        "id": 1,
        "display_name": "超級管理員", // 名稱
        "code": "ADMIN", // 代碼
        "enable": "Y", // 啟用/停用
        "is_assign": "N", // 可否被賦予給帳號
        "can_edit": "N", // 可否被編輯
        "created_at": "2018-09-27 15:44:31",
        "updated_at": "2018-09-27 15:44:31"
    },
    "code": 200    
}
```

> 編輯角色

```
{
    "data": {
        "display_name": "上帝1",
        "code": "CUSTOM",
        "is_assign": "Y",
        "can_edit": "Y",
        "enable": "Y",
        "updated_at": "2018-09-27 19:19:38",
        "created_at": "2018-09-27 19:19:38",
        "id": 7
    },
    "code": 200    
}
```

> 刪除角色

```
{
    "data": "1", // 刪除的筆數 , 1表示有1筆資料被刪除
    "code": 200    
}
```

> 角色設定-角色權限讀取
```
{
    "data": [
        {
            "id": 1, // 節點id
            "enable": "Y", // 啟用/停用
            "display": "Y", // 顯示/不顯示
            "display_name": "系统设置", // 名稱
            "code": "WEB_MG", // code
            "route_uri": "no_function_WEB_MG", // route_uri, no_funtion開頭表示開節點無功能
            "parent_id": null, // 父節點
            "created_at": "2018-09-28 19:09:41",
            "updated_at": "2018-09-28 19:09:42",
            "permission": [ 
                {
                    "permission": 15,// 權限值
                    "node_id": 1 // 節點id
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
            "created_at": "2018-09-28 19:09:41",
            "updated_at": "2018-09-28 19:09:41",
            "permission": [] // 表示無權限
        },
        {
            "id": 3,
            "enable": "Y",
            "display": "N",
            "display_name": "密碼重設",
            "code": "PW_RESET",
            "route_uri": "account/password/reset",
            "parent_id": 1,
            "created_at": "2018-09-28 19:09:41",
            "updated_at": "2018-09-28 19:09:41",
            "permission": [
                {
                    "permission": 15,
                    "node_id": 3
                }
            ]
        },
        {
            "id": 4,
            "enable": "Y",
            "display": "Y",
            "display_name": "APP管理",
            "code": "APP_MG",
            "route_uri": "app_management/data_manipulation",
            "parent_id": null,
            "created_at": "2018-09-28 19:09:42",
            "updated_at": "2018-09-28 19:09:42",
            "permission": [
                {
                    "permission": 15,
                    "node_id": 4
                }
            ]
        },
        {
            "id": 5,
            "enable": "Y",
            "display": "Y",
            "display_name": "讯息推播",
            "code": "PSH_NOTI",
            "route_uri": "no_function_PSH_NOTI",
            "parent_id": null,
            "created_at": "2018-09-28 19:09:42",
            "updated_at": "2018-09-28 19:09:42",
            "permission": [
                {
                    "permission": 15,
                    "node_id": 5
                }
            ]
        },
        {
            "id": 6,
            "enable": "Y",
            "display": "N",
            "display_name": "PushNotification CRUD",
            "code": "NOTI_MAIN",
            "route_uri": "pushnotification/message/maintain",
            "parent_id": 5,
            "created_at": "2018-09-28 19:09:42",
            "updated_at": "2018-09-28 19:09:42",
            "permission": [
                {
                    "permission": 15,
                    "node_id": 6
                }
            ]
        },
        {
            "id": 8,
            "enable": "Y",
            "display": "Y",
            "display_name": "角色设定",
            "code": "ROLE_SETTING",
            "route_uri": "role/maintain",
            "parent_id": 1,
            "created_at": "2018-10-01 11:05:34",
            "updated_at": "2018-10-01 11:06:28",
            "permission": [
            ]
        }
    ],
    "code": 200
}
```

> 角色綁定節點
```
{
    "data": {
        "attached": [ // 新綁定
            3 // 節點id
        ],
        "detached": { // 解綁
            "1": 2 // 節點id
        },
        "updated": [ // 更新綁定
            1 // 節點id
        ]
    },
    "code": 200
}
```
