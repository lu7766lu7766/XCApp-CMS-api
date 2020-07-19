# News Management Api

## 取得News Management 管理列表
```
{
"data": [
        {
            "id": 19,
            "name": "title2"
        },
        {
            "id": 20,
            "name": "title3"
        },
        {
            "id": 22,
            "name": "title4"
        },
        {
            "id": 23,
            "name": "title5"
        },
        {
            "id": 25,
            "name": "title6"
        },
        {
            "id": 27,
            "name": "title7"
        },
        {
            "id": 117,
            "name": "title9"
        }
    ],
    "code": 200,
    }
```

## 新增News Management 管理列表內容資訊
```
{
    "data": {
        "name": "test",
        "category_id": "2",
        "content": "123456789",
        "publish_time": 1538543166,
        "status": "N",
        "updated_at": "2018-10-16 17:29:09",
        "created_at": "2018-10-16 17:29:09",
        "id": 1,
        "used": [
            {
                "id": 1,
                "files_status": "off",
                "files_url": [
                    "/storage//uploads/2018/10/15//537f306bb864a29afcb41cccc22084a4.gif"
                ],
                "files_name": "537f306bb864a29afcb41cccc22084a4.gif",
                "files_mime": "gif",
                "files_path": "/uploads/2018/10/15/",
                "files_source_name": "pudding圖片4.gif",
                "created_at": "2018-10-15 16:28:40",
                "updated_at": "2018-10-16 17:29:09",
                "pivot": {
                    "file_used_model_id": 1,
                    "files_id": 1,
                    "file_used_model_type": "Modules\\News\\Entities\\NewsManagement"
                }
            },
            {
                "id": 2,
                "files_status": "off",
                "files_url": [
                    "/storage//uploads/2018/10/15//2a0d117f22cbf39eccabd44215109316.gif"
                ],
                "files_name": "2a0d117f22cbf39eccabd44215109316.gif",
                "files_mime": "gif",
                "files_path": "/uploads/2018/10/15/",
                "files_source_name": "pudding圖片4.gif",
                "created_at": "2018-10-15 17:14:01",
                "updated_at": "2018-10-16 17:29:09",
                "pivot": {
                    "file_used_model_id": 1,
                    "files_id": 2,
                    "file_used_model_type": "Modules\\News\\Entities\\NewsManagement"
                }
            },
            {
                "id": 3,
                "files_status": "off",
                "files_url": [
                    "/storage//uploads/2018/10/15//0718981048f199f1a954da4ba8ac28ae.gif"
                ],
                "files_name": "0718981048f199f1a954da4ba8ac28ae.gif",
                "files_mime": "gif",
                "files_path": "/uploads/2018/10/15/",
                "files_source_name": "pudding圖片4.gif",
                "created_at": "2018-10-15 17:14:02",
                "updated_at": "2018-10-16 17:29:09",
                "pivot": {
                    "file_used_model_id": 1,
                    "files_id": 3,
                    "file_used_model_type": "Modules\\News\\Entities\\NewsManagement"
                }
            }
        ]
    },
    "code": 201
}
```
## 編輯News Management 管理列表內容資訊
```
{
    "data": {
        "id": 42,
        "name": "test2",
        "category_id": 2,
        "content": "123456789",
        "publish_time": 1538543166,
        "status": "on",
        "banner_switch": "off",
        "created_at": "2018-10-16 10:50:38",
        "updated_at": "2018-10-16 11:24:48",
        "used": [
            {
                "id": 4,
                "files_status": "off",
                "files_url": [
                    "https://s3-ap-southeast-1.amazonaws.com/rc-app-cms-api/uploads/2018/10/16//0b101965914d6b1e62b761f4c55dac3e.gif"
                ],
                "files_name": "0b101965914d6b1e62b761f4c55dac3e.gif",
                "files_mime": "gif",
                "files_path": "/uploads/2018/10/16/",
                "files_source_name": "pudding圖片4.gif",
                "created_at": "2018-10-16 12:07:54",
                "updated_at": "2018-10-16 12:08:27",
                "pivot": {
                    "file_used_model_id": 42,
                    "files_id": 4,
                    "file_used_model_type": "Modules\\News\\Entities\\NewsManagement"
                }
            }
        ],
        "app_management": []
    },
    "code": 200
}
```
## 更新News Management 管理列表內容資訊
```
{
    "data": {
        "id": 42,
        "name": "test2",
        "category_id": "2",
        "content": "123456789",
        "publish_time": 1538543166,
        "status": "on",
        "banner_switch": "off",
        "created_at": "2018-10-16 10:50:38",
        "updated_at": "2018-10-16 11:24:48"
    },
    "code": 200
}
```
## 刪除News Management 管理列表內容資訊
```
{
        "data": {
            "count": 1
        },
        "code": 200,
}
```
## 上傳檔案
```
{
    "data": {
        "files_name": "d8063106d6e085c05155fbf2b2e4680f.gif",
        "files_path": "uploads/2018/10/16/",
        "files_url": [
            "/storage/uploads/2018/10/16/d8063106d6e085c05155fbf2b2e4680f.gif"
        ],
        "files_mime": "gif",
        "files_source_name": "pudding圖片4.gif",
        "files_status": "off",
        "updated_at": "2018-10-16 12:58:00",
        "created_at": "2018-10-16 12:58:00",
        "id": 7
    },
    "code": 200
}
```

## 獲取管理清單總數
```
{
    "data": {
        "total": 0
    },
    "code": 200
}
```

## 獲取Topic清單
```
{
    "data": [
        {
            "id": 1,
            "topic_id": "21231312",
            "name": "test"
        },
        {
            "id": 2,
            "topic_id": "2121",
            "name": "test"
        }
    ],
    "code": 200,
}
```

