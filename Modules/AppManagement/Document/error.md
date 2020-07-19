# Push Notification Api Error

## Push Notification (40000~50000)
> Return error code list

| 代碼   | 說明 | 備註 |
| ------ | -------------------------------- | ------ |
| 0     | OK| - |
| -1    | ERROR| - |
| -2    | MODEL_NOT_FOUND| - |
| 1000  | ID 必填| - |
| 1001  | ID 必需為 int| - |
| 1007  | PAGE 必需為int| - |
| 1008  | PERPAGE 必需為int| - |
| 30000 | MOBILE_DEVICE 必填| - |
| 30001 | CODE 必填| - |
| 30002 | NAME 必填| - |
| 30003 | CATEGORY 必填| - |
| 30004 | REDIRECT_SWITCH 必填| - |
| 30006 | UPDATE_SWITCH 必填| - |
| 30007 | MOBILE_DEVICE 必需為 string| - |
| 30008 | CODE 必需為 string| - |
| 30009 | NAME 必需為 string| - |
| 30010 | CATEGORY 必需為 string| - |
| 30011 | REDIRECT_SWITCH 必需為 string| - |
| 30012 | UPDATE_SWITCH 必需為 string| - |
| 30013 | UPDATE_URL 必需為 string| - |
| 30014 | UPDATE_CONTENT 必需為 string| - |
| 30015 | QQ_ID 必需為 string| - |
| 30016 | WECHAT_ID 必需為 string| - |
| 30017 | CUSTOMER_SERVICE 必需為 string| - |
| 30018 | MOBILE_DEVICE 不支援| - |
| 30019 | CODE 字數最多為20| - |
| 30020 | NAME 字數最多為20| - |
| 30021 | CATEGORY 不支援| - |
| 30022 | REDIRECT_SWITCH 不支援| - |
| 30023 | REDIRECT_URL 必需為array| - |
| 30024 | UPDATE_SWITCH 不支援| - |
| 30025 | UPDATE_URL 不是url| - |
| 30026 | QQ_ID 字數最多為30| - |
| 30027 | WECHAT 字數最多為30| - |
| 30028 | CUSTOMER_SERVICE 字數最多為30| - |
| 30029 | STATUS 必填| - |
| 30030 | STATUS 不支援| - |
| 30031 | REDIRECT_URL 不是url| - |
| 30032 | TOPIC_ID 必需為 string| - |
| 30033 | ID 必需為陣列 | - |
| 30034 | 代碼重複 | - |
| 30035 | push_path必填 | - |
| 30036 | push_path不支援 | - |
| 30037 | topic_id值必需為string | - |
| 30038 | app_key值必需為string | - |
| 30039 | secret值必需為string | - |
| 30040 | 當push_path為aws時,topic_id欄為key值topic,且為為必填 | - |
| 30041 | 當push_path為aurora時,topic_id欄為key值app_key,secret,且為為必填 | - |
| 30042 | 當push_path為aurora時,topic_id欄為key值app_key,secret,且為為必填 | - |
| 30043 | 當app_key存在時secret必填 | - |
| 30044 | 當secret存在時app_key必填 | - |
| 30045 | app_version需為string | - |
| 30046 | app_url需為string | - |
| 30047 | app_url 不是url | - |
| 30048 | app_version長度為10 | - |
| 30049 | app_secret值必需為string | - |
| 30050 | package_name值必需為string | - |
| 30051 | 當push_path為小米時,topic_id欄為key值app_secret,且為為必填  | - |
| 30052 | 當push_path為小米時,topic_id欄為key值package_name,且為為必填  | - |
| 30053 | 當package_name存在時app_secret必填  | - |
| 30054 | 當app_secret存在時package_name必填  | - |
| 30055 | 當選擇友盟推播時 app_key必填  | - |
| 30056 | 當選擇友盟推播時 app_secret必填  | - |
| 30057 | app_secret需為string   | - |
| 30058 | 推播設定尚未填寫,請參照串接文檔中topic_id欄位必填格式   | - |
| 30059 | app_code 是必填欄位   | - |
| 30060 | app_code 需為string   | - |
| 30061 | identify 是必填欄位    | - |
| 30062 | identify 需為string    | - |

### 通用錯誤碼列表
* [傳送門](https://github.com/3rdpay/AppCMS-API/blob/master/Modules/Base/Document/error.md)
