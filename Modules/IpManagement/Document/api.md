# APP管理

### IP管理

取得列表
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_management/list | | | |
|方法| POST | | | |
|權限| READ | | | |
|參數| type   |非必填(string)| |類型(blacklist : 黑名單 / whitelist : 白名單)|
|   | device  |非必填(string)| |裝置(android : 安卓 / ios : IOS)|
|   | status  |非必填(string)| |狀態(enable : 開啟 / disable : 關閉)|
|   | keyword  |非必填(string)| |關鍵字|
|   | page  |非必填(integer)|1 |頁數|
|   | perpage  |非必填(integer)|20|每頁筆數|

取得列表總筆數
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_management/total | | | |
|方法| POST | | | |
|權限| READ | | | |
|參數| type   |非必填(string)| |類型(blacklist : 黑名單 / whitelist : 白名單)|
|   | device  |非必填(string)| |裝置(android : 安卓 / ios : IOS)|
|   | status  |非必填(string)| |狀態(enable : 開啟 / disable : 關閉)|
|   | keyword  |非必填(string)| |關鍵字|

單筆明細

|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_management/detail | | | |
|方法| POST | | | |
|權限| READ | | | |
|參數| id   |必填(integer)| |id|

資料新增
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_management/maintain | | | |
|方法| POST | | | |
|權限| CREATE | | | |
|參數| ip   |必填(string)| |ip位址(ipv4),如:192.168.57.36|
|   | type   |必填(string)| |類型(blacklist : 黑名單 / whitelist : 白名單)|
|   | device  |必填(string)| |裝置(android : 安卓 / ios : IOS)|
|   | status  |必填(string)| |狀態(enable : 開啟 / disable : 關閉)|
|   | remark  |非必填(string)| |備註|

資料更新
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_management/maintain | | | |
|方法| PUT | | | |
|權限| UPDATE | | | |
|參數| id   |必填(integer)| |id|
|參數| ip   |必填(string)| |ip位址(ipv4),如:192.168.57.36|
|   | type   |必填(string)| |類型(blacklist : 黑名單 / whitelist : 白名單)|
|   | device  |必填(string)| |裝置(android : 安卓 / ios : IOS)|
|   | status  |必填(string)| |狀態(enable : 開啟 / disable : 關閉)|
|   | remark  |非必填(string)| |備註|

資料刪除
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_management/maintain | | | |
|方法| DELETE | | | |
|權限| DELETE | | | |
|參數| id   |必填(array)| |id|

### IP資訊

取得列表
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_info/list | | | |
|方法| POST | | | |
|權限| READ | | | |
|參數| type   |非必填(string)| |類型(blacklist : 黑名單 / whitelist : 白名單)|
|   | device  |非必填(string)| |裝置(android : 安卓 / ios : IOS)|

資料新增
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_info/maintain | | | |
|方法| POST | | | |
|權限| CREATE | | | |
|參數| ip   |必填(string)| |ip位址(ipv4),如:192.168.57.36|
|   | type   |必填(string)| |類型(blacklist : 黑名單 / whitelist : 白名單)|
|   | device  |必填(string)| |裝置(android : 安卓 / ios : IOS)|
|   | status  |必填(string)| |狀態(enable : 開啟 / disable : 關閉)|
|   | remark  |非必填(string)| |備註|

資料刪除
                    
|項目|內容|型態|預設|說明|
|------------- | -------------|--------|-------|------|
|路徑| {host}/ip_info/maintain | | | |
|方法| DELETE | | | |
|權限| DELETE | | | |
|參數| id   |必填(array)| |id|
