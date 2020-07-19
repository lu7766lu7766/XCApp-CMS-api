# GuestBook App Api

## 新增留言管理
```
{
    "data": {
        "title": "123456",
        "content": "77777",
        "account_id": 1,
        "updated_at": "2018-11-06 18:47:03",
        "created_at": "2018-11-06 18:47:03",
        "id": 2
    },
    "code": 201
}
```

## 新增留言回復訊息
```
{
    "data": {
        "id": 2,
        "title": "123456",
        "content": "77777",
        "account_id": 1,
        "created_at": "2018-11-07 19:07:38",
        "updated_at": "2018-11-07 19:07:38"
    },
    "code": 200
}
```

## 新增留言讚數
```
{
    "data": {
        "id": 2,
        "title": "123456",
        "content": "77777",
        "account_id": 1,
        "created_at": "2018-11-07 19:07:38",
        "updated_at": "2018-11-07 19:07:38"
    },
    "code": 200
}
```

## 新增留言反對數量
```
{
    "data": {
        "id": 2,
        "title": "123456",
        "content": "77777",
        "account_id": 1,
        "created_at": "2018-11-07 19:07:38",
        "updated_at": "2018-11-07 19:07:38"
    },
    "code": 200
}
```

## 更新留言管理
```
{
    "data": {
        "success": true
    },
    "code": 200
}
```
## 獲取留言管理清單|閱讀留言清單
```
{
    "data": [
        {
            "id": 4,
            "title": "123456",
            "content": "77777",
            "account_id": 1,
            "created_at": "2018-11-20 19:16:23",
            "updated_at": "2018-11-20 19:16:23",
            "comment_count": 0,
            "counter": {
                "id": 21,
                "record": 1,
                "relative_id": 4,
                "relative_type": "Modules\\GuestBook\\Entities\\GuestBook"
            },
            "author": {
                "id": 1,
                "account": "admin",
                "display_name": "最高權限者"
            }
        },
        {
            "id": 3,
            "title": "12345677777",
            "content": "77777",
            "account_id": 1,
            "created_at": "2018-11-20 15:43:31",
            "updated_at": "2018-11-20 15:44:50",
            "comment_count": 0,
            "counter": {
                "id": 20,
                "record": 1,
                "relative_id": 3,
                "relative_type": "Modules\\GuestBook\\Entities\\GuestBook"
            },
            "author": {
                "id": 1,
                "account": "admin",
                "display_name": "最高權限者"
            }
        },
        {
            "id": 2,
            "title": "123456",
            "content": "77777",
            "account_id": 1,
            "created_at": "2018-11-07 19:07:38",
            "updated_at": "2018-11-07 19:07:38",
            "comment_count": 2,
            "counter": {
                "id": 19,
                "record": 9,
                "relative_id": 2,
                "relative_type": "Modules\\GuestBook\\Entities\\GuestBook"
            },
            "author": {
                "id": 1,
                "account": "admin",
                "display_name": "最高權限者"
            }
        }
    ],
    "code": 200
}
```

## 編輯留言管理|閱讀留言
```
{
    "data": {
        "id": 2,
        "title": "123456",
        "content": "77777",
        "account_id": 1,
        "created_at": "2018-11-07 19:07:38",
        "updated_at": "2018-11-07 19:07:38",
        "comment_count": 2,
        "counter": {
            "id": 19,
            "record": 11,
            "relative_id": 2,
            "relative_type": "Modules\\GuestBook\\Entities\\GuestBook"
        },
        "author": {
            "id": 1,
            "account": "admin",
            "display_name": "最高權限者"
        },
        "comment": [
            {
                "account": "water",
                "display_name": "系统管理员",
                "id": 1,
                "theme_id": 2,
                "account_id": 10,
                "message": "fuck",
                "comment_type": "Modules\\GuestBook\\Entities\\GuestBook",
                "created_at": "2018-11-20 18:22:47",
                "updated_at": "2018-11-20 18:22:47",
                "pivot": {
                    "theme_id": 2,
                    "account_id": 10,
                    "comment_type": "Modules\\GuestBook\\Entities\\GuestBook"
                }
            },
            {
                "account": "water",
                "display_name": "系统管理员",
                "id": 2,
                "theme_id": 2,
                "account_id": 10,
                "message": "fuck",
                "comment_type": "Modules\\GuestBook\\Entities\\GuestBook",
                "created_at": "2018-11-20 18:54:10",
                "updated_at": "2018-11-20 18:54:10",
                "pivot": {
                    "theme_id": 2,
                    "account_id": 10,
                    "comment_type": "Modules\\GuestBook\\Entities\\GuestBook"
                }
            }
        ],
        "morph_counter": [
            {
                "id": 1,
                "morph_counter_target_id": 2,
                "morph_counter_type": "Modules\\GuestBook\\Entities\\GuestBook",
                "morph_counter_kind": 1,
                "morph_counter": 3
            }
        ],
        "account_reaction": [
            {
                "account": "water",
                "display_name": "系统管理员",
                "id": 1,
                "account_reaction_kind": 1,
                "account_reaction_target_id": 2,
                "account_id": 10,
                "account_reaction_type": "Modules\\GuestBook\\Entities\\GuestBook",
                "pivot": {
                    "account_reaction_target_id": 2,
                    "account_id": 10,
                    "account_reaction_type": "Modules\\GuestBook\\Entities\\GuestBook"
                }
            }
        ]
    },
    "code": 200
}
```
## 獲取留言筆數
```
{
    "data": {
        "total": 0
    },
    "code": 200
}
```
## 刪除留言管理
```
{
    "data": {
        "count": 1
    },
    "code": 200
}
```


#### 舉報留言
```html
{
    "data": "1",
    "code": 200
}
```
