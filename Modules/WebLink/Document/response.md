# 網站管理Response

#### 分類列表
```html
{
     "data": [
             {
                 "id": 11,
                 "name": "test123",
                 "status": "enable",
                 "created_at": "2018-10-02 18:02:46",
                 "updated_at": "2018-10-02 18:02:46",
                 "deleted_at": null
             },
             {
                 "id": 9,
                 "name": "test123",
                 "status": "enable",
                 "created_at": "2018-10-02 12:45:00",
                 "updated_at": "2018-10-02 12:45:00",
                 "deleted_at": null
             },
             {
                 "id": 8,
                 "name": "test123",
                 "status": "enable",
                 "created_at": "2018-10-02 12:44:58",
                 "updated_at": "2018-10-02 12:44:58",
                 "deleted_at": null
             },
             {
                 "id": 7,
                 "name": "test123",
                 "status": "disable",
                 "created_at": "2018-10-02 12:44:14",
                 "updated_at": "2018-10-02 12:44:14",
                 "deleted_at": null
             },
             {
                 "id": 6,
                 "name": "test123",
                 "status": "disable",
                 "created_at": "2018-10-02 12:40:21",
                 "updated_at": "2018-10-02 12:40:21",
                 "deleted_at": null
             }
         ],
         "code": 200
}
```

#### 新增分類
```html
{
    "data": {
            "name": "test123",
            "status": "enable",
            "updated_at": "2018-11-01 14:17:49",
            "created_at": "2018-11-01 14:17:49",
            "id": 2,
            "used": []
        },
        "code": 201
}
```

#### 修改分類
```html
{
  "data": {
          "id": 2,
          "name": "test1234",
          "status": "enable",
          "created_at": "2018-11-01 14:17:49",
          "updated_at": "2018-11-01 14:20:05",
          "deleted_at": null,
          "used": [
              {
                  "id": 6,
                  "files_status": "off",
                  "files_url": [
                      "/storage/uploads/2018/11/01/02e6220cc706a767dccadd4775f45199.jpg",
                      "/storage/uploads/2018/11/01/300_02e6220cc706a767dccadd4775f45199.jpg",
                      "/storage/uploads/2018/11/01/100_02e6220cc706a767dccadd4775f45199.jpg",
                      "/storage/uploads/2018/11/01/50_02e6220cc706a767dccadd4775f45199.jpg"
                  ],
                  "files_name": "02e6220cc706a767dccadd4775f45199.jpg",
                  "files_mime": "jpg",
                  "files_path": "public/uploads/2018/11/01/",
                  "files_storage_path": [
                      "public/uploads/2018/11/01/02e6220cc706a767dccadd4775f45199.jpg",
                      "public/uploads/2018/11/01/300_02e6220cc706a767dccadd4775f45199.jpg",
                      "public/uploads/2018/11/01/100_02e6220cc706a767dccadd4775f45199.jpg",
                      "public/uploads/2018/11/01/50_02e6220cc706a767dccadd4775f45199.jpg"
                  ],
                  "files_source_name": "412s916.jpg",
                  "created_at": "2018-11-01 14:11:11",
                  "updated_at": "2018-11-01 14:20:05",
                  "pivot": {
                      "file_used_model_id": 2,
                      "files_id": 6,
                      "file_used_model_type": "Modules\\WebLink\\Entities\\CategoryOrm"
                  }
              }
          ]
      },
      "code": 200
}
```

#### 刪除分類
```html
{
     "data": "0",
     "code": 200
}
```

#### 分類總筆數
```html
{
   "data": "6",
   "code": 200
}
```

#### 網站連結列表
```html
{
    "data": [
           {
               "id": 3,
               "name": "test1234",
               "category_id": 3,
               "url_link": "https://laravel.tw/docs/5.2/eloquent-relationships#has-many-through",
               "status": "enable",
               "created_at": "2018-11-01 14:33:40",
               "updated_at": "2018-11-01 14:33:40",
               "deleted_at": null,
               "category": {
                   "id": 3,
                   "name": "test123",
                   "status": "enable",
                   "created_at": "2018-11-01 14:19:12",
                   "updated_at": "2018-11-01 14:19:12",
                   "deleted_at": null
               },
               "app_management": [
                   {
                       "id": 1,
                       "code": "test123QQ123",
                       "name": "waterGO",
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
                           "app_key": "123abc",
                           "app_secretkey": "qqq"
                       },
                       "created_at": "2018-10-12 15:24:18",
                       "updated_at": "2018-10-19 16:00:13",
                       "deleted_at": null,
                       "account_id": 5,
                       "push_path": "aurora",
                       "app_version": null,
                       "app_url": null,
                       "pivot": {
                           "relation_id": 3,
                           "app_id": 1,
                           "relation_type": "Modules\\WebLink\\Entities\\WebLinkOrm"
                       }
                   }
               ],
               "used": [
                   {
                       "id": 4,
                       "files_status": "off",
                       "files_url": [
                           "/storage/uploads/2018/11/01/d89e72a745cf1a56583b12ee4a15c92a.jpg",
                           "/storage/uploads/2018/11/01/300_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                           "/storage/uploads/2018/11/01/100_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                           "/storage/uploads/2018/11/01/50_d89e72a745cf1a56583b12ee4a15c92a.jpg"
                       ],
                       "files_name": "d89e72a745cf1a56583b12ee4a15c92a.jpg",
                       "files_mime": "jpg",
                       "files_path": "public/uploads/2018/11/01/",
                       "files_storage_path": [
                           "public/uploads/2018/11/01/d89e72a745cf1a56583b12ee4a15c92a.jpg",
                           "public/uploads/2018/11/01/300_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                           "public/uploads/2018/11/01/100_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                           "public/uploads/2018/11/01/50_d89e72a745cf1a56583b12ee4a15c92a.jpg"
                       ],
                       "files_source_name": "412s916.jpg",
                       "created_at": "2018-11-01 14:08:00",
                       "updated_at": "2018-11-01 14:33:40",
                       "pivot": {
                           "file_used_model_id": 3,
                           "files_id": 4,
                           "file_used_model_type": "Modules\\WebLink\\Entities\\WebLinkOrm"
                       }
                   }
               ]
           }
       ],
       "code": 200
}
```

#### 新增網站連結
```html
{
  "data": {
         "name": "test1234",
         "category_id": "3",
         "url_link": "https://laravel.tw/docs/5.2/eloquent-relationships#has-many-through",
         "status": "enable",
         "updated_at": "2018-11-01 14:33:40",
         "created_at": "2018-11-01 14:33:40",
         "id": 3,
         "used": []
     },
     "code": 201
}
```
#### 編輯網站連結
```html
{
  "data": {
         "id": 3,
         "name": "test12345",
         "category_id": "3",
         "url_link": "https://laravel.tw/docs/5.2/eloquent-relationships#has-many-through",
         "status": "enable",
         "created_at": "2018-11-01 14:33:40",
         "updated_at": "2018-11-01 14:36:20",
         "deleted_at": null,
         "used": [
             {
                 "id": 4,
                 "files_status": "off",
                 "files_url": [
                     "/storage/uploads/2018/11/01/d89e72a745cf1a56583b12ee4a15c92a.jpg",
                     "/storage/uploads/2018/11/01/300_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                     "/storage/uploads/2018/11/01/100_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                     "/storage/uploads/2018/11/01/50_d89e72a745cf1a56583b12ee4a15c92a.jpg"
                 ],
                 "files_name": "d89e72a745cf1a56583b12ee4a15c92a.jpg",
                 "files_mime": "jpg",
                 "files_path": "public/uploads/2018/11/01/",
                 "files_storage_path": [
                     "public/uploads/2018/11/01/d89e72a745cf1a56583b12ee4a15c92a.jpg",
                     "public/uploads/2018/11/01/300_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                     "public/uploads/2018/11/01/100_d89e72a745cf1a56583b12ee4a15c92a.jpg",
                     "public/uploads/2018/11/01/50_d89e72a745cf1a56583b12ee4a15c92a.jpg"
                 ],
                 "files_source_name": "412s916.jpg",
                 "created_at": "2018-11-01 14:08:00",
                 "updated_at": "2018-11-01 14:36:20",
                 "pivot": {
                     "file_used_model_id": 3,
                     "files_id": 4,
                     "file_used_model_type": "Modules\\WebLink\\Entities\\WebLinkOrm"
                 }
             }
         ]
     },
     "code": 200
}
```
#### 刪除網站連結
```html
{
 "data": "0",
 "code": 200
}
```

#### 網站連結總數
```html
{
 "data": "2",
 "code": 200
}
```

#### 網站連結選項
```html
{
 "data": {
         "data": {
                 "category": [
                     {
                         "id": 12,
                         "name": "test123",
                         "status": "enable",
                         "created_at": "2018-10-02 18:19:19",
                         "updated_at": "2018-10-02 18:19:19",
                         "deleted_at": null
                     },
                     {
                         "id": 11,
                         "name": "test123",
                         "status": "enable",
                         "created_at": "2018-10-02 18:02:46",
                         "updated_at": "2018-10-02 18:02:46",
                         "deleted_at": null
                     },
                     {
                         "id": 9,
                         "name": "test123",
                         "status": "enable",
                         "created_at": "2018-10-02 12:45:00",
                         "updated_at": "2018-10-02 12:45:00",
                         "deleted_at": null
                     },
                     {
                         "id": 8,
                         "name": "test123",
                         "status": "enable",
                         "created_at": "2018-10-02 12:44:58",
                         "updated_at": "2018-10-02 12:44:58",
                         "deleted_at": null
                     },
                     {
                         "id": 7,
                         "name": "test123",
                         "status": "disable",
                         "created_at": "2018-10-02 12:44:14",
                         "updated_at": "2018-10-02 12:44:14",
                         "deleted_at": null
                     },
                     {
                         "id": 6,
                         "name": "test123",
                         "status": "disable",
                         "created_at": "2018-10-02 12:40:21",
                         "updated_at": "2018-10-02 12:40:21",
                         "deleted_at": null
                     },
                     {
                         "id": 5,
                         "name": "test1234",
                         "status": "enable",
                         "created_at": "2018-10-02 12:39:42",
                         "updated_at": "2018-10-02 13:11:04",
                         "deleted_at": null
                     }
                 ],
                 "app_list": [
                     {
                         "id": 5,
                         "code": "test123QQ",
                         "name": "waterGOQQ",
                         "category": "lottery",
                         "mobile_device": "ios",
                         "redirect_switch": "off",
                         "redirect_url": "[\"https:\\/\\/tw.yahoo.com\",\"https:\\/\\/www.google.com.tw\"]",
                         "update_switch": "off",
                         "update_url": "https://tw.yahoo.com",
                         "update_content": "test12345",
                         "qq_id": "qq123",
                         "wechat_id": "ww123",
                         "customer_service": "cc123",
                         "status": "unpublished",
                         "topic_id": "123abc",
                         "created_at": "2018-09-26 19:14:02",
                         "updated_at": "2018-09-26 19:14:02",
                         "deleted_at": null
                     },
                     {
                         "id": 6,
                         "code": "test123QQ",
                         "name": "waterGOQQ",
                         "category": "lottery",
                         "mobile_device": "ios",
                         "redirect_switch": "off",
                         "redirect_url": "[\"https:\\/\\/tw.yahoo.com\",\"https:\\/\\/www.google.com.tw\"]",
                         "update_switch": "off",
                         "update_url": "https://tw.yahoo.com",
                         "update_content": "test12345",
                         "qq_id": "qq123",
                         "wechat_id": "ww123",
                         "customer_service": "cc123",
                         "status": "unpublished",
                         "topic_id": "123abc",
                         "created_at": "2018-09-28 16:39:20",
                         "updated_at": "2018-09-28 16:39:20",
                         "deleted_at": null
                     },
                     {
                         "id": 7,
                         "code": "test123QQ",
                         "name": "waterGOQQ",
                         "category": "lottery",
                         "mobile_device": "ios",
                         "redirect_switch": "off",
                         "redirect_url": "[\"https:\\/\\/tw.yahoo.com\",\"https:\\/\\/www.google.com.tw\"]",
                         "update_switch": "off",
                         "update_url": "https://tw.yahoo.com",
                         "update_content": "test12345",
                         "qq_id": "qq123",
                         "wechat_id": "ww123",
                         "customer_service": "cc123",
                         "status": "unpublished",
                         "topic_id": "123abc",
                         "created_at": "2018-09-28 16:39:41",
                         "updated_at": "2018-09-28 16:39:41",
                         "deleted_at": null
                     },
                     {
                         "id": 8,
                         "code": "test123QQ123",
                         "name": "waterGOQQ",
                         "category": "lottery",
                         "mobile_device": "ios",
                         "redirect_switch": "off",
                         "redirect_url": "[\"https:\\/\\/tw.yahoo.com\",\"https:\\/\\/www.google.com.tw\"]",
                         "update_switch": "off",
                         "update_url": "https://tw.yahoo.com",
                         "update_content": "test12345",
                         "qq_id": "qq123",
                         "wechat_id": "ww123",
                         "customer_service": "cc123",
                         "status": "unpublished",
                         "topic_id": "123abc",
                         "created_at": "2018-09-28 16:45:21",
                         "updated_at": "2018-09-28 16:45:21",
                         "deleted_at": null
                     }
                 ]
             },
             "code": 200
}
```

#### 取得分類列表(前台)
```html
{
 "data": [
         {
             "id": 1,
             "name": "test123",
             "status": "enable",
             "created_at": "2018-11-16 18:38:37",
             "updated_at": "2018-11-16 18:38:37",
             "deleted_at": null,
             "used": []
         }
     ],
     "code": 200
}
```

#### 網站連結列表(前台)
```html
{
   "data": [
         {
             "id": 2,
             "name": "test1234",
             "category_id": 1,
             "url_link": "https://laravel.tw/docs/5.2/eloquent-relationships#has-many-through",
             "status": "enable",
             "created_at": "2018-11-16 18:39:19",
             "updated_at": "2018-11-16 18:39:19",
             "deleted_at": null,
             "used": []
         }
     ],
     "code": 200
}
```


#### 網站連結總筆數(前台)
```html
{
    "data": "1",
    "code": 200
}
```
