# APP管理

### APP自動生成

> 取得列表
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/list       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | READ     |              |             | -         |
| <b>參數</b>               | status        | 非必填(string)   |  |  狀態(pending:未打包/doing:打包中/complete:已打包)      |
|                           | keyword    | 非必填(string)     |              | 名稱關鍵字搜尋          |
|                           | page   | 非必填(integer)           |   1   | 一頁數量            |
|                           | perpage   | 非必填(string)           |  20      | 關鍵字搜尋            |

> 取得列表總筆數
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/total       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | READ     |              |             | -         |
| <b>參數</b>               | status        | 非必填(string)   |  |  狀態(pending:未打包/doing:打包中/complete:已打包)      |
|                           | keyword    | 非必填(string)     |              | 名稱關鍵字搜尋          |

> 單筆明細
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/detail       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | READ     |              |             | -         |
| <b>參數</b>               | id        | 必填(integer)   |  |  id      |

> 檔案上傳
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/upload       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | CREATE     |              |             | -         |
| <b>參數</b>               | upload_file        | 必填(string)   |  |  file      |

> 新增資料
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/maintain       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | CREATE     |              |             | -         |
| <b>參數</b>               | code        | 必填(string)   |  | 代碼      |
|               | name        | 必填(string)   |  | 名稱      |
|               | package_name        | 必填(string)   |  | 包名      |
|                | platform        | 必填(object)   |  | 平台(baidu : 百度 / huawei : 華為 / xiaomi : 小米 / 360 : 360 / qq : 應用寶 / oppo : OPPO)      |
|                | notify        | 必填(string)   |  | 推播(xiaomi : 小米 / aws : aws / aurora : 極光)      |
|              | config[app_id]        | 必填(string)   |  | APP ID(小米)      |
|                | config[app_key]        | 必填(string)   |  | APP KEY(小米.aws.極光)      |
|                | config[secret]        | 必填(string)   |  | APP KEY(極光)      |
|                | upload_id        | 必填(integer)   |  | upload file id      |

> 更新資料
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/maintain       |              |              |                      |
| <b>方法</b>               | PUT          |              |              |          |
| <b>權限</b>               | UPDATE     |              |             | -         |
| <b>參數</b>               | id        | 必填(integer)   |  | id      |
|                | code        | 必填(string)   |  | 代碼      |
|                | name        | 必填(string)   |  | 名稱      |
|               | package_name        | 必填(string)   |  | 包名      |
|                | platform        | 必填(object)   |  | 平台(baidu : 百度 / huawei : 華為 / xiaomi : 小米 / 360 : 360 / qq : 應用寶 / oppo : OPPO)      |
|              | notify        | 必填(string)   |  | 推播(xiaomi : 小米 / aws : aws / aurora : 極光)      |
|                | config[app_id]        | 必填(string)   |  | APP ID(小米)      |
|                | config[app_key]        | 必填(string)   |  | APP KEY(小米.aws.極光)      |
|                | config[secret]        | 必填(string)   |  | APP KEY(極光)      |
|                | upload_id        | 必填(integer)   |  | upload file id      |

> 刪除資料
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/maintain       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | DELETE     |              |             | -         |
| <b>參數</b>               | id        | 必填(array)   |  |  id      |

> 打包
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/package       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | CREATE     |              |             | -         |
| <b>參數</b>               | id        | 必填(integer)   |  |  id      |

> APK完成回調(免登入,僅供內部呼叫用)
                    
| 項目                        | 內容                              | 類型         | 預設         | 說明        |
|-------------------|------------------------|--------------|--------------|-----------------------------|
| <b>路徑</b>         |{host}/app_automation/callback       |              |              |                      |
| <b>方法</b>               | POST          |              |              |          |
| <b>權限</b>               | UPDATE     |              |             | -         |
| <b>參數</b>               | uuid        | 必填(string)   |  |  uuid      |
|                | result        | 必填(array)   |  |  各個平台執行結果      |
