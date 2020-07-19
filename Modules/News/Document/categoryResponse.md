# News Category Api

## 取得News Category 分類列表
```
{
"data": [
        {
            "id": 19,
            "status": "off",
            "name": "title2",
            "created_at": "2018-10-02 13:05:24",
            "updated_at": "2018-10-02 13:05:24"
        },
        {
            "id": 20,
            "status": "off",
            "name": "title3",
            "created_at": "2018-10-02 13:06:54",
            "updated_at": "2018-10-02 13:06:54"
        },
        {
            "id": 22,
            "status": "off",
            "name": "title4",
            "created_at": "2018-10-02 13:43:38",
            "updated_at": "2018-10-02 13:43:38"
        },
        {
            "id": 23,
            "status": "off",
            "name": "title5",
            "created_at": "2018-10-02 13:43:57",
            "updated_at": "2018-10-02 13:43:57"
        },
        {
            "id": 25,
            "status": "off",
            "name": "title6",
            "created_at": "2018-10-02 13:44:54",
            "updated_at": "2018-10-02 13:44:54"
        },
        {
            "id": 27,
            "status": "off",
            "name": "title7",
            "created_at": "2018-10-02 14:10:50",
            "updated_at": "2018-10-02 14:10:50"
        },
        {
            "id": 117,
            "status": "off",
            "name": "title9",
            "created_at": "2018-10-02 17:34:29",
            "updated_at": "2018-10-02 17:34:29"
        }
    ],
    "code": 200,
    }
```

## 新增News Category 分類列表內容資訊
```
{
    "data": {
        "name": "title10",
        "status": "off",
        "updated_at": "2018-10-03 18:53:00",
        "created_at": "2018-10-03 18:53:00",
        "id": 119
    },
    "code": 200,
}
```
## 編輯News Category 分類列表內容資訊
```
{
        "data": {
        "id": 117,
        "status": "off",
        "name": "title9",
        "created_at": "2018-10-02 17:34:29",
        "updated_at": "2018-10-02 17:34:29",
        "files": []
    },
    "code": 200
}
```
## 更新News Category 分類列表內容資訊
```
{
     "data": {
        "id": 119,
        "status": "on",
        "name": "try",
        "created_at": "2018-10-03 18:53:00",
        "updated_at": "2018-10-03 18:58:54"
    },
    "code": 200,
}
```
## 刪除News Category 分類列表內容資訊
```
{
        "data": {
            "count": 1
        },
        "code": 200,
}
```
## 上傳News Category圖片
```
{
        "data": {
            "files_name": "a31c16461bc72c2234f11e963fef5f08.hihi.jpg",
            "files_path": "/uploads/2018/10/08/",
            "files_url": "[\"https:\\/\\/s3-ap-southeast-1.amazonaws.com\\/app-cms-upload-images\\/uploads\\/2018\\/10\\/08\\/a31c16461bc72c2234f11e963fef5f08.hihi.jpg\",\"https:\\/\\/s3-ap-southeast-1.amazonaws.com\\/app-cms-upload-images\\/uploads\\/2018\\/10\\/08\\/300_a31c16461bc72c2234f11e963fef5f08.hihi.jpg\",\"https:\\/\\/s3-ap-southeast-1.amazonaws.com\\/app-cms-upload-images\\/uploads\\/2018\\/10\\/08\\/100_a31c16461bc72c2234f11e963fef5f08.hihi.jpg\",\"https:\\/\\/s3-ap-southeast-1.amazonaws.com\\/app-cms-upload-images\\/uploads\\/2018\\/10\\/08\\/50_a31c16461bc72c2234f11e963fef5f08.hihi.jpg\"]",
            "files_mime": "jpg",
            "files_source_name": "hihi.jpg",
            "files_status": "off",
            "updated_at": "2018-10-08 15:24:44",
            "created_at": "2018-10-08 15:24:44",
            "id": 70
        },
        "code": 200,
}
```

## 獲取News Category分類清單頁數
```
{
        "data": {
            "total": 7
        },
        "code": 200,
}
```

