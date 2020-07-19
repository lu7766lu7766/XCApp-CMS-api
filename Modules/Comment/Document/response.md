# 評論管理Response

#### 新增主題評論
```html
{
   "data": {
          "id": 1,
          "theme_id": "abc12356",
          "created_at": "2018-11-07 13:12:35",
          "updated_at": "2018-11-07 13:12:35"
      },
      "code": 200
}
```

#### 取得主題
```html
{
   "data": {
           "id": 1,
           "theme_id": "abc12356",
           "created_at": "2018-11-13 18:16:01",
           "updated_at": "2018-11-13 18:16:01",
           "views": 2,
           "reaction_count": [
               {
                   "kind": 1,
                   "count": 1
               }
           ]
       },
       "code": 200
}
```

#### 評論總數
```html
{
   "data": "21",
   "code": 200
}
```


#### 點擊反應
```html
 "data": {
        "result": true
    },
    "code": 200
```

#### 取消反應
```html
 "data": {
        "result": true
    },
    "code": 200
```

#### 取得評論列表
```html
{
    "data": [
           {
               "id": 1,
               "message": "@qq ffefeweeeeqqqq",
               "created_at": "2018-11-13 18:16:01",
               "updated_at": "2018-11-13 18:16:01",
               "reaction_count": [
                   {
                       "kind": 1,
                       "count": 1
                   }
               ]
           }
       ],
       "code": 200
}
```

#### 舉報 主題/評論
```html
{
    "data": "1",
    "code": 200
}
```
