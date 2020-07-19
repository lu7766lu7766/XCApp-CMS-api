# 角色

### 後台API

> Password token generate
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|passport/login |POST|grant_type|許可類型|O|string|請填password
| | |client_id|client id|O|string|
| | |client_secret|client secret|O|string|
| | |username|user account|O|string|
| | |password|user password|O|string|

> Personal token generate
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|
|------------- | -------------|--------|-------|------|-----|-----|
|passport/token/personal/generate |POST(LOGIN)|||||
