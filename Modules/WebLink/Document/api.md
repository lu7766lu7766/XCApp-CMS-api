# 網站連結

### 分類

取得分類列表
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/category    |POST|name|名稱||string|READ|
|                     |    |page|當前頁數||int||
|                     |    |perpage|每頁幾筆||int||

新增分類
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/category/store |POST|name|名稱|V|string||CREATE|
|                     |    |status|狀態|V|string|狀態:enable:啟用,disable:關閉|
|                     |    |image_id|圖片id||int||


修改分類
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/category    |PUT|id|app id|V|int|UPDATE|
|                     |   |name|名稱|V|string||
|                     |   |status|狀態|V|string|狀態:enable:啟用,disable:關閉|
|                     |    |image_id|圖片id||int||

刪除分類
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/category |DELETE|id||V|array|DELETE|

分類總筆數
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/category/total |POST|name|名稱||string|READ|


### 網站連結

網站連結列表
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link |POST|name|名稱||string|READ|
|          |   |category_id|分類ID||int||

新增網站連結
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/store |POST|name|名稱|V|string||CREATE|
|               |    |status|狀態|V|string|狀態:enable:啟用,disable:關閉|
|               |    |category_id|分類ID|V|int||
|               |    |url_link|網址|V|string||
|               |    |app_id|app id||array|不填視為不推送任何app|
|               |    |image_id|圖片id||int||

修改網站連結
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link   |PUT|name|名稱|V|string||UPDATE|
|           |    |status|狀態|V|string|狀態:enable:啟用,disable:關閉|
|           |    |category_id|分類ID|V|int||
|           |    |url_link|網址|V|string||
|           |    |app_id|app id||array|不填視為不推送任何app|
|           |    |image_id|圖片id||int||


刪除網站連結
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link |DELETE|id||V|array|DELETE|

網站連結總筆數
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/total |POST|name|名稱||string|READ|
|               |   |category_id|分類ID||int||

網站連結選項
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/options |GET||||||

上傳圖片
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/upload |POST|upload_file||V||CREATE|

### for 前台

取得分類列表
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/front/category  |GET|||||READ|


網站連結列表
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/front/web_link |POST|category_id|分類ID|V|int|READ|
|              |   |app_id|app ID|V|int||
|              |   |page|||int||
|              |   |perpage|||int||


網站連結總筆數
                    
|URL|請求方法|參數|參數名稱|必填|型態|備註|權限|
|------------- | -------------|--------|-------|------|-----|-----|-----|
|web_link/front/total |POST|category_id|分類ID|V|int|READ|
|                        |   |app_id|app ID|V|int||
