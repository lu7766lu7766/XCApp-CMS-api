# News Management 新聞管理

### 後台API

> 取得 新聞分類 清單

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/       |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |

> 獲取管理清單總數

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/total       |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|              |     search  |      非必填(string)        |              |      關鍵字搜尋  |
|              |     category_id  |      非必填(string)        |           |   新聞分類ID     |



> 獲取管理清單 

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | page    | 非必填(integer)     |         1     | 頁數          |
|                           | perpage   | 非必填(integer)           |   20     | 一頁數量            |
|                           | search   | 非必填(string)           |        | 關鍵字搜尋            |
|                           | category_id   | 非必填(integer)           |        | 新聞分類ID            |

> 新增 新聞管理 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/maintain       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | name    | 必填(string)     |              | 新聞分類名稱          |
|                           | category_id   | 必填(integer)           |        | 新聞分類ID            |
|                           | publish_time   | 必填(date)           |        | (Y/m/d H:i:s)            |
|                           | content   | 必填(string)           |        | 內容            |
|                           | status   | 必填(boolean)           |       |  0->開啟 1->關閉      |
|                           | topic_id   | 非必填(array)           |       |  所屬發布APP對象      |
|                           | cover_image_id   | 必填(integer)           |       |  封面圖片ID      |
|                           | upload_id   | 非必填(array)           |       |  總上傳圖片ID(包含內容上傳圖片ID)(上傳最多50張)      |
|                           | polling   | 必填(boolean)             |       |   0->開啟 1->關閉      |


>編輯 新聞分類 資訊
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/maintain/{id}       |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(integer)     |              | 新聞分類 id          |

>更新 新聞分類 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/maintain      |              |              |                      |
| <b>方法</b>               | PUT          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(integer)     |              | 新聞分類 id          |
|                           | name    | 必填(string)     |              | 新聞分類名稱          |
|                           | category_id   | 必填(integer)           |        | 新聞分類ID            |
|                           | publish_time   | 必填(date)           |        | (Y/m/d H:i:s)            |
|                           | content   | 必填(string)           |        | 內容            |
|                           | status   | 必填(boolean)           |       |  0->開啟 1->關閉      |
|                           | topic_id   | 非必填(array)           |       |  所屬發布APP對象      |
|                           | cover_image_id   | 必填(integer)           |       |  封面圖片ID      |
|                           | upload_id   | 飛必填(array)           |       |  總上傳圖片ID(包含內容上傳圖片ID)(上傳最多50張)      |
|                           | polling   | 必填(boolean)             |       |   0->開啟 1->關閉      |

>刪除 新聞分類 資訊

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/maintain     |              |              |                      |
| <b>方法</b>               | delete          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | id    | 必填(array)     |              | 新聞管理 id           |


>上傳檔案(圖片、影片等)

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/upload      |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |
|                           | upload_file    | 必填(file)     |              |           |

>獲取發佈APP list

| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |domain/news/management/topic      |              |              |                      |
| <b>方法</b>               | GET          |              |              |          |
| <b>權限</b>               | -     |              |             | -         |
| <b>參數</b>               |                                    |              |              |        |




