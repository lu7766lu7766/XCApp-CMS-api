# Push Notification 

### 後台API


> 取得Push Notification 列表

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | page    | 非必填(integer)     |         1     | 頁數          |
|                           | perpage   | 非必填(integer)           |   20     | 一頁數量            |

> 取得TopicList列表

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message/topic       |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |

>推播讯息總筆數 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message      |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |

> 新增Push Notification 推播內容資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message/maintain       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | content    | 必填(string)     |              | 推播內容          |
|                           | topic_id   | 非必填(Array)           |       |            |
|                           | schedule_date   | 非必填(string)           |       |    時間(yyyy-mm-dd H:i:s)        |

>編輯Push Notification 資訊
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message/maintain/{id}       |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(integer)     |              | Push Notification id          |

>更新Push Notification 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message/maintain      |              |              |                      |
| <b>方法</b>               | PUT          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(integer)     |              | Push Notification id          |
|                           | content    | 必填(string)     |              | 推播內容          |
|                           | topic_id   | 非必填(Array)           |       |            |
|                           | schedule_date   | 非必填(string)           |       |    時間(yyyy-mm-dd H:i:s)        |

>刪除Push Notification 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message/maintain/      |              |              |                      |
| <b>方法</b>               | delete          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(integer)     |              | Push Notification id          |

>推播Push Notification 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/pushnotification/message/push/      |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(integer)     |              | Push Notification id          |




