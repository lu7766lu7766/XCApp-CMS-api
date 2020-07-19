# APP管理

### 帳號管理
> 查詢帳號

預設回傳所有帳號列表資訊,也可透過帶入相關參數查詢單一會員資訊

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/list |POST|id|帳號id| N | int | - |
|                     |   |account|帳號| N |string| - |
|                     |   |role_id|角色id| N |int| - |
|                     |   |page|頁數| N |int| - |
|                     |   |per_page|每頁資料筆數| N |int| - |

> 查詢帳號總筆數

回傳符合查詢條件帳號總筆數

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/list/total |POST|id|帳號id| N | int | - |
|                     |   |account|帳號| N |string| - |
|                     |   |role_id|角色id| N |int| - |

> 新增帳號

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/maintain |POST|account|帳號|Y|string| 限英數4~32字|
|                     |   |password|密碼|Y|string| 限英數4~32字|
|                     |   |confirm_password|密碼確認|Y|string| 需與密碼相同 |
|                     |   |display_name|暱稱|Y|string| - |
|                     |   |role_id|角色id|Y|array|-|
|                     |   |status|狀態|N|string| enable:開啟/disable:關閉|


> 編輯帳號

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/maintain |PUT|id|帳號id|Y|int| - |
|                     |   |password|新密碼|N|string| 限英數4~32字|
|                     |   |confirm_password|新密碼確認|N|string| 需與密碼相同 |
|                     |   |display_name|暱稱|Y|string| - |
|                     |   |role_id|角色id|Y|array|-|
|                     |   |status|狀態|Y|string| enable:開啟/disable:關閉|
> 刪除帳號

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/maintain |DELETE|id|帳號id|Y|array| - |

> 查詢帳號(個人用)

預設回傳系統登入者的帳號資訊

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/self |GET|-|-| - | - | - |

> 編輯帳號(個人用)

更新帳號資訊用,更新時需輸入舊密碼進行驗證

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|{domain}/account/self |POST|old_password|舊帳號|N|string| - |
|                     |   |password|新密碼|N|string| 限英數4~32字|
|                     |   |confirm_password|新密碼確認|N|string| 需與新密碼相同 |
|                     |   |display_name|暱稱|Y|string| - |
|                     |   |image|頭像圖片|N|file| - |

### 會員
> 註冊會員帳號

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|account/member/sign_up |POST|account|帳號|Y|string| 限英數4~32字 |
|                     |   |password|新密碼|Y|string| 限英數4~32字|
|                     |   |confirm_password|密碼確認|Y|string| - |
|                     |   |display_name|暱稱|Y|string| - |

### 會員註冊(驗證碼)

> 獲取驗證碼

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|account/otp/apply |POST|phone|手機門號|Y|string| 限數字7~12字,無須加區碼 |
|                     |   |app_name|app軟體名稱|Y|string| -|

> 驗證驗證碼

|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|account/otp/verify |POST|id|帳號id|Y|int| - |
|                     |   |otp_code|驗證碼|Y|string| -|
|                     |   |password|登入密碼|N|string| -|
