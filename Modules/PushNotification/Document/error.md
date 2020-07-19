# Push Notification Api Error

## Push Notification (40000~49999)
> Return error code list

| 代碼   | 說明 | 備註 |
| ------ | -------------------------------- | ------ |
| 40000 | content 為必填欄位 | - |
| 40001 | content 必須為字串 | - |
| 40002 | topic 參數型態必須為陣列(Array)| - |
| 40003 | topic 傳遞參數value必須為數字(integer)型態| - |
| 40004 | 推播失敗| - |
| 40005 | 沒有推播對象| - |
| 40006 | id 參數型態必須為陣列(Array)| - |
| 40007 | id 參數內容數量不足或超過上限| - |
| 40008 | schedule_date 參數格式必須為日期格式(Y-m-d H:i:s)| - |
| 40009 | schedule_date 必須比當下設定時間晚| - |

### 通用錯誤碼列表
* [傳送門](https://github.com/3rdpay/AppCMS-API/blob/master/Modules/Base/Document/error.md)
