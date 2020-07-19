# 帳號管理Response

#### 查詢帳號
```html
{
  "data": {
    "account_list": [
      {
        "id": 2,
        "account": "house",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 2,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 3,
        "account": "aaron",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 3,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 4,
        "account": "jacc",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-06 09:04:12",
        "deleted_at": null,
        "login_ip": "127.0.0.1",
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 4,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 5,
        "account": "funny",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 5,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 6,
        "account": "derek",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 6,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 7,
        "account": "xced",
        "display_name": "happy",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-05 18:24:40",
        "deleted_at": null,
        "login_ip": "192.168.16.1",
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 7,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": [
          {
            "id": 26,
            "files_status": "off",
            "files_url": [
              "/storage/uploads/2018/11/06/24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
              "/storage/uploads/2018/11/06/300_24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
              "/storage/uploads/2018/11/06/100_24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
              "/storage/uploads/2018/11/06/50_24c16e9c8e69c2bd7e6c3fd3b5c733ef.png"
            ],
            "files_name": "24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
            "files_mime": "png",
            "files_path": "public/uploads/2018/11/06/",
            "files_storage_path": [
              "public/uploads/2018/11/06/24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
              "public/uploads/2018/11/06/300_24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
              "public/uploads/2018/11/06/100_24c16e9c8e69c2bd7e6c3fd3b5c733ef.png",
              "public/uploads/2018/11/06/50_24c16e9c8e69c2bd7e6c3fd3b5c733ef.png"
            ],
            "files_source_name": "frog-512.png",
            "created_at": "2018-11-06 09:46:21",
            "updated_at": "2018-11-06 09:46:21",
            "pivot": {
              "file_used_model_id": 7,
              "files_id": 26,
              "file_used_model_type": "Modules\\Account\\Entities\\Account"
            }
          }
        ]
      },
      {
        "id": 8,
        "account": "arxing",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 8,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 9,
        "account": "yanchen",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 9,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 10,
        "account": "water",
        "display_name": "系统管理员",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 2,
            "display_name": "系統管理員",
            "code": "SYSTEM_MG",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "N",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 10,
              "role_id": 2,
              "created_at": "2018-11-02 18:02:51",
              "updated_at": "2018-11-02 18:02:51"
            }
          }
        ],
        "used": []
      },
      {
        "id": 11,
        "account": "happy",
        "display_name": "worm",
        "status": "enable",
        "mail": null,
        "phone": null,
        "created_at": "2018-11-06 10:15:55",
        "updated_at": "2018-11-06 10:17:24",
        "deleted_at": null,
        "login_ip": null,
        "roles": [
          {
            "id": 3,
            "display_name": "會員",
            "code": "CUSTOM",
            "enable": "Y",
            "is_assign": "Y",
            "can_edit": "Y",
            "created_at": "2018-11-02 18:02:51",
            "updated_at": "2018-11-02 18:02:51",
            "pivot": {
              "account_id": 11,
              "role_id": 3,
              "created_at": "2018-11-06 10:15:55",
              "updated_at": "2018-11-06 10:15:55"
            }
          }
        ],
        "used": []
      }
    ],
    "role_menu": {
      "系統管理員": 2,
      "會員": 3
    },
    "status_menu": {
      "開啟": "enable",
      "關閉": "disable"
    }
  },
  "code": 200
}
```
#### 查詢帳號總筆數
```html
{
  "data": {
    "total": 2
  },
  "code": 200,
  "client_request_body": {
    "id": null,
    "account": null,
    "role_id": null
  }
}
```
#### 新增帳號
```html
{
  "data": {
    "account": "happy",
    "display_name": "快樂",
    "status": "enable",
    "updated_at": "2018-11-06 10:15:55",
    "created_at": "2018-11-06 10:15:55",
    "id": 11,
    "used": [],
    "roles": [
      {
        "id": 3,
        "display_name": "會員",
        "code": "CUSTOM",
        "enable": "Y",
        "is_assign": "Y",
        "can_edit": "Y",
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "pivot": {
          "account_id": 11,
          "role_id": 3,
          "created_at": "2018-11-06 10:15:55",
          "updated_at": "2018-11-06 10:15:55"
        }
      }
    ]
  },
  "code": 200,
  "client_request_body": {
    "account": "happy07",
    "password": "aa1234",
    "confirm_password": "aa1234",
    "display_name": "快樂7",
    "role_id": "3",
    "status": "enable"
  }
}
```
#### 編輯帳號
```html
{
  "data": {
    "id": 11,
    "account": "happy",
    "display_name": "worm",
    "status": "enable",
    "mail": null,
    "phone": null,
    "created_at": "2018-11-06 10:15:55",
    "updated_at": "2018-11-06 10:17:24",
    "deleted_at": null,
    "login_ip": null,
    "roles": [
      {
        "id": 3,
        "display_name": "會員",
        "code": "CUSTOM",
        "enable": "Y",
        "is_assign": "Y",
        "can_edit": "Y",
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "pivot": {
          "account_id": 11,
          "role_id": 3,
          "created_at": "2018-11-06 10:15:55",
          "updated_at": "2018-11-06 10:15:55"
        }
      }
    ],
    "used": []
  },
  "code": 200,
  "client_request_body": {
    "id": "8",
    "password": "aa1234",
    "confirm_password": "aa1234",
    "display_name": "beer",
    "status": "enable",
    "role_id": "1"
  }
}
```
#### 刪除帳號
```html
{
  "data": {
    "result": true
  },
  "code": 200,
  "client_request_body": {
    "id": "8,9"
  }
}
```
#### 查詢帳號(個人用)
```html
{
  "data": {
    "account_info": {
      "id": 1,
      "account": "admin",
      "display_name": "最高權限者",
      "status": "enable",
      "mail": "admin@house.cc",
      "phone": "3939889",
      "created_at": "2018-09-22 08:22:31",
      "updated_at": "2018-09-22 08:22:31",
      "deleted_at": null,
      "roles": [
        {
          "id": 1,
          "display_name": "超級管理員",
          "code": "ADMIN",
          "enable": "Y",
          "is_assign": "N",
          "can_edit": "N",
          "created_at": "2018-09-22 08:22:30",
          "updated_at": "2018-09-22 08:22:30",
          "pivot": {
            "account_id": 1,
            "role_id": 1,
            "created_at": "2018-09-22 08:22:31",
            "updated_at": "2018-09-22 08:22:31"
          }
        }
      ],
      "used": [
        {
          "id": 21,
          "files_status": "off",
          "files_url": [
            "/storage/uploads/2018/11/05/097abdbc078eb8731eb7e63fd9d3f133.png",
            "/storage/uploads/2018/11/05/300_097abdbc078eb8731eb7e63fd9d3f133.png",
            "/storage/uploads/2018/11/05/100_097abdbc078eb8731eb7e63fd9d3f133.png",
            "/storage/uploads/2018/11/05/50_097abdbc078eb8731eb7e63fd9d3f133.png"
          ],
          "files_name": "097abdbc078eb8731eb7e63fd9d3f133.png",
          "files_mime": "png",
          "files_path": "public/uploads/2018/11/05/",
          "files_storage_path": [
            "public/uploads/2018/11/05/097abdbc078eb8731eb7e63fd9d3f133.png",
            "public/uploads/2018/11/05/300_097abdbc078eb8731eb7e63fd9d3f133.png",
            "public/uploads/2018/11/05/100_097abdbc078eb8731eb7e63fd9d3f133.png",
            "public/uploads/2018/11/05/50_097abdbc078eb8731eb7e63fd9d3f133.png"
          ],
          "files_source_name": "frog-512.png",
          "created_at": "2018-11-05 17:04:44",
          "updated_at": "2018-11-05 17:04:44",
          "pivot": {
            "file_used_model_id": 7,
            "files_id": 21,
            "file_used_model_type": "Modules\\Account\\Entities\\Account"
          }
        }
      ]
    },
    "status_menu": {
      "開啟": "enable",
      "關閉": "disable"
    }
  },
  "code": 200
}
```
#### 編輯帳號(個人用)
```html
{
  "client_request_body": {
    "display_name": "happy"
  },
  "data": {
    "id": 7,
    "account": "xced",
    "display_name": "happy",
    "status": "enable",
    "mail": null,
    "phone": null,
    "created_at": "2018-11-02 18:02:51",
    "updated_at": "2018-11-05 15:56:18",
    "deleted_at": null,
    "login_ip": "172.28.0.1",
    "roles": [
      {
        "id": 2,
        "display_name": "系統管理員",
        "code": "SYSTEM_MG",
        "enable": "Y",
        "is_assign": "Y",
        "can_edit": "N",
        "created_at": "2018-11-02 18:02:51",
        "updated_at": "2018-11-02 18:02:51",
        "pivot": {
          "account_id": 7,
          "role_id": 2,
          "created_at": "2018-11-02 18:02:51",
          "updated_at": "2018-11-02 18:02:51"
        }
      }
    ],
    "used": [
      {
        "id": 21,
        "files_status": "off",
        "files_url": [
          "/storage/uploads/2018/11/05/097abdbc078eb8731eb7e63fd9d3f133.png",
          "/storage/uploads/2018/11/05/300_097abdbc078eb8731eb7e63fd9d3f133.png",
          "/storage/uploads/2018/11/05/100_097abdbc078eb8731eb7e63fd9d3f133.png",
          "/storage/uploads/2018/11/05/50_097abdbc078eb8731eb7e63fd9d3f133.png"
        ],
        "files_name": "097abdbc078eb8731eb7e63fd9d3f133.png",
        "files_mime": "png",
        "files_path": "public/uploads/2018/11/05/",
        "files_storage_path": [
          "public/uploads/2018/11/05/097abdbc078eb8731eb7e63fd9d3f133.png",
          "public/uploads/2018/11/05/300_097abdbc078eb8731eb7e63fd9d3f133.png",
          "public/uploads/2018/11/05/100_097abdbc078eb8731eb7e63fd9d3f133.png",
          "public/uploads/2018/11/05/50_097abdbc078eb8731eb7e63fd9d3f133.png"
        ],
        "files_source_name": "frog-512.png",
        "created_at": "2018-11-05 17:04:44",
        "updated_at": "2018-11-05 17:04:44",
        "pivot": {
          "file_used_model_id": 7,
          "files_id": 21,
          "file_used_model_type": "Modules\\Account\\Entities\\Account"
        }
      }
    ]
  },
  "code": 200
}
```
#### 註冊會員帳號
```html
{
    "data": {
        "account": "housebomclone",
        "display_name": "2423",
        "updated_at": "2018-11-02 17:19:05",
        "created_at": "2018-11-02 17:19:05",
        "id": 11
    },
    "code": 200
}
```
#### 獲取驗證碼(會員註冊)
```html
{
    "data": {
        "id": 155,
        "account": "13107845138",
        "display_name": "13107845138",
        "status": "enable",
        "mail": null,
        "phone": "13107845138",
        "created_at": "2019-04-02 17:08:38",
        "updated_at": "2019-04-03 11:03:41",
        "deleted_at": null,
        "login_ip": "172.18.0.1",
        "otpAuth": {
            "expires_at": "2019-04-03 11:04:41"
        }
    },
    "code": 200
}
```
#### 驗證驗證碼(會員註冊)
```html
{
    "data": {
            "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjJjZWFhODJiYmJkNmZiNGQ3NTg5NGVjODg3NDc0YzkzY2U1NGYxM2E4OWM1Y2U1Mjk1NzJmNmU3N2Y5OWQ3MWFjYzJmNjI4MTY0ODM2ZjVhIn0.eyJhdWQiOiI4ZTU2ZWMyNC01ZDQzLTQxZWYtOTc2OS05Y2E1NmVhMzAwYzIiLCJqdGkiOiIyY2VhYTgyYmJiZDZmYjRkNzU4OTRlYzg4NzQ3NGM5M2NlNTRmMTNhODljNWNlNTI5NTcyZjZlNzdmOTlkNzFhY2MyZjYyODE2NDgzNmY1YSIsImlhdCI6MTU1NDc3NDkyOCwibmJmIjoxNTU0Nzc0OTI4LCJleHAiOjE1ODYzOTczMjgsInN1YiI6IjE2MCIsInNjb3BlcyI6W119.LJnv8v1nThSDhngh4Sgj79SK-yBnXMLkIVOzELI-DoI8j8_byay33EDgStzVt7Q_w52ka2-UhlesJXVm1PBiLievG1Q0-Rk2EM52xe9aruOgIi13QjXTeJgKHGXBbie0np5Wito59c-vFczT35ogyO9OJdPNTvpTTylrVo4i6oEvqPcRXrlx89kqJ84cazdsWXeq1VmKcXyxf4pd6u-nuVFYFYncGT3pHh7EjoccODaXtSuEhpvnq_0i_2YgpgK6IolieIUBD9Sq4XryNDeu-NV-INE1GEbcbaWOz0vd5TMEtV0ah_yi9Sw-HYMB-bUw5Rf3XFYCusgVlv1mHm4Fqzbl6Y5zr9tdJvQPkIiFqxhpNS8KxQUecmO0RHeIjhGgC4d7zD2lelvgi1C96DFEgZRwR9t7xfICq-2E1XtteGUGvSDw4y3AITCefvGeP7unCmaU9W_s-81SFCaMibENuuebJM_22s06O0Sqqnny_Qh53iGraUFW8ytfZvyT-IPKREkwrm2uZlRuM-wbZW1e-n8u0gaY_oj_8GHYq2Lw-zX-EOu9hGP6MuIQ8RrcXZ5LB8npvYHZxk32zB3yJbDGKrA2XmDi7ARiVx5xeCf3FA3GPyBsOJ6oogSMX1Vu_eCu1A9MZOMgxdB7oCGZPHDuKqKERfPGtlGKgztDB3jYU4k"
    },
    "code": 200
}
```
