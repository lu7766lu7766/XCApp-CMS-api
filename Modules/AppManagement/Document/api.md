# APP管理

### 後台API

取得APP列表
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management |POST|category|類別||string|READ|
|                     |    |mobile_device|行動裝置||string||
|                     |    |name|名稱||string||
|                     |    |status|狀態||string|unpublished(未上架), verifying(審核中), published(已上架), removed(已下架), 預設為unpublished(未上架)|
|                     |    |page|當前頁數||int||
|                     |    |perpage|每頁幾筆||int||
新增APP資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management/data_manipulation |POST|mobile_device|行動裝置|V|string|帶入值:ios,android,預設為ios|CREATE|
|                     |   |code|代碼|V|string||
|                     |   |name|名稱|V|string||
|                     |   |category|類別|V|string||
|                     |   |redirect_switch|跳轉開關|V|string|帶入值:on,off,預設為off|
|                     |   |redirect_url|跳轉網址||array||
|                     |   |update_switch|更新開關|V|string|帶入值:on,off,預設為off|
|                     |   |update_url|更新網址||string||
|                     |   |update_content|更新文字||string||
|                     |   |qq_id|QQ id||string||
|                     |   |wechat_id|wechat id||string||
|                     |   |customer_service|線上客服||string||
|                     |   |status|狀態|V|string|帶入值: unpublished(未上架), verifying(審核中), published(已上架), removed(已下架), 預設為unpublished(未上架)|
|                     |   |topic_id|推播用的id||array|範例:通道為aws時請送:topic_id[topic],為aurora時請送 topic_id[app_key],topic_id[secret],為xiao mi時請送 topic_id[app_secret],topic_id[package_name],為友盟支付時請發送 topic_id[app_key],topic_id[app_secret]|
|                     |   |push_path|推播通道|V|string|帶入值:aws,aurora,xiaomi|
|                     |   |app_version|app版本||string||
|                     |   |app_url|app網址||string||


編輯APP資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management/data_manipulation |PUT|id|app id|V|int|UPDATE|
|                     |   |mobile_device|行動裝置|V|string|帶入值:ios,android|
|                     |   |code|代碼|V|string||
|                     |   |name|名稱|V|string||
|                     |   |category|類別|V|string||
|                     |   |redirect_switch|跳轉開關|V|string|帶入值:on,off|
|                     |   |redirect_url|跳轉網址||array||
|                     |   |update_switch|更新開關|V|string|帶入值:on,off|
|                     |   |update_url|更新網址||string||
|                     |   |update_content|更新文字||string||
|                     |   |qq_id|QQ id||string||
|                     |   |wechat_id|wechat id||string||
|                     |   |customer_service|線上客服||string||
|                     |   |status|狀態|V|string|帶入值: unpublished(未上架), verifying(審核中), published(已上架), removed(已下架)|
|                     |   |topic_id|推播用的id||array|範例:通道為aws時請送:topic_id[topic],為aurora時請送 topic_id[app_key],topic_id[secret],為xiao mi時請送 topic_id[app_secret],topic_id[package_name],為友盟支付時請發送 topic_id[app_key],topic_id[app_secret]|
|                     |   |push_path|推播通道|V|string|帶入值:aws,aurora,xiaomi|
|                     |   |app_version|app版本||string||
|                     |   |app_url|app網址||string||

刪除APP資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management/data_manipulation |DELETE|id|app id|V|array,int|DELETE|


取得總筆數
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management/total |POST|category|類別||string|READ|
|                     |   |mobile_device|行動裝置||string||
|                     |   |name|名稱||string||
|                     |   |status|狀態||string|unpublished(未上架), verifying(審核中), published(已上架), removed(已下架), 預設為unpublished(未上架)|

取得搜尋選項
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management/options |GET||||||


### 後台API(個人)

取得APP列表
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting |POST|category|類別||string|READ|
|                     |    |mobile_device|行動裝置||string||
|                     |    |name|名稱||string||
|                     |    |status|狀態||string|unpublished(未上架), verifying(審核中), published(已上架), removed(已下架), 預設為unpublished(未上架)|
|                     |    |page|當前頁數||int||
|                     |    |perpage|每頁幾筆||int||
新增APP資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting/data_manipulation |POST|mobile_device|行動裝置|V|string|帶入值:ios,android,預設為ios|CREATE|
|                     |   |code|代碼|V|string||
|                     |   |name|名稱|V|string||
|                     |   |category|類別|V|string||
|                     |   |redirect_switch|跳轉開關|V|string|帶入值:on,off,預設為off|
|                     |   |redirect_url|跳轉網址||array||
|                     |   |update_switch|更新開關|V|string|帶入值:on,off,預設為off|
|                     |   |update_url|更新網址||string||
|                     |   |update_content|更新文字||string||
|                     |   |qq_id|QQ id||string||
|                     |   |wechat_id|wechat id||string||
|                     |   |customer_service|線上客服||string||
|                     |   |status|狀態|V|string|帶入值: unpublished(未上架), verifying(審核中), published(已上架), removed(已下架), 預設為unpublished(未上架)|
|                     |   |topic_id|推播用的id||array|範例:通道為aws時請送:topic_id[topic],為aurora時請送 topic_id[app_key],topic_id[secret],為xiao mi時請送 topic_id[app_secret],topic_id[package_name],為友盟支付時請發送 topic_id[app_key],topic_id[app_secret]|
|                     |   |push_path|推播通道|V|string|帶入值:aws,aurora|
|                     |   |app_version|app版本||string||
|                     |   |app_url|app網址||string||


編輯APP資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting/data_manipulation |PUT|id|app id|V|int|UPDATE|
|                     |   |mobile_device|行動裝置|V|string|帶入值:ios,android|
|                     |   |code|代碼|V|string||
|                     |   |name|名稱|V|string||
|                     |   |category|類別|V|string||
|                     |   |redirect_switch|跳轉開關|V|string|帶入值:on,off|
|                     |   |redirect_url|跳轉網址||array||
|                     |   |update_switch|更新開關|V|string|帶入值:on,off|
|                     |   |update_url|更新網址||string||
|                     |   |update_content|更新文字||string||
|                     |   |qq_id|QQ id||string||
|                     |   |wechat_id|wechat id||string||
|                     |   |customer_service|線上客服||string||
|                     |   |status|狀態|V|string|帶入值: unpublished(未上架), verifying(審核中), published(已上架), removed(已下架)|
|                     |   |topic_id|推播用的id||array|範例:通道為aws時請送:topic_id[topic],為aurora時請送 topic_id[app_key],topic_id[secret],為xiao mi時請送 topic_id[app_secret],topic_id[package_name],為友盟支付時請發送 topic_id[app_key],topic_id[app_secret]|
|                     |   |push_path|推播通道|V|string|帶入值:aws,aurora|
|                     |   |app_version|app版本||string||
|                     |   |app_url|app網址||string||

刪除APP資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting/data_manipulation |DELETE|id|app id|V|array,int|DELETE|


取得總筆數
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting/total |POST|category|類別||string|READ|
|                     |   |mobile_device|行動裝置||string||
|                     |   |name|名稱||string||
|                     |   |status|狀態||string|unpublished(未上架), verifying(審核中), published(已上架), removed(已下架), 預設為unpublished(未上架)|

取得搜尋選項
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_management/options |GET||||||


新增Device資料
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting/attach/device |POST|app_code|app 代碼||string|CREATE|
|                     |   |identify|裝置識別碼||string||


### APP裝置使用之API

提供app裝置取得後台app管理資訊
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|app_setting/front/{code} |GET|code|代碼|V|string|READ|
