package Models

import (
    "fmt"
    "github.com/jinzhu/gorm"
    _ "github.com/jinzhu/gorm/dialects/mysql"
    "log"
    "push/Config"
    "push/Constants/Env/DB"
)

type Models struct {
    ID        uint   `gorm:"primary_key" json:"id"`
    CreatedAt string `json:"created_at"`
    UpdatedAt string `json:"updated_at"`
}

func InitGOrm() (*gorm.DB) {
    var dbHost, dbPort, dateBase, dbUserName, dbPassword string

    dbHost = Config.Get(DB.HOST_KEY)
    dbPort = Config.Get(DB.PORT_KEY)
    dateBase = Config.Get(DB.DB_DATABASE_KEY)
    dbUserName = Config.Get(DB.USERNAME_KEY)
    dbPassword = Config.Get(DB.PASSWORD_KEY)
    connectInfo := fmt.Sprintf("%s:%s@tcp(%s:%s)/%s?parseTime=true", dbUserName, dbPassword, dbHost, dbPort, dateBase)
    db, err := gorm.Open("mysql", connectInfo)
    if (Config.Get("APP_ENV") == "local") && (Config.Get("APP_DEBUG") == "true") {
        db.LogMode(true)
    }
    if err != nil {
        log.Fatalln("init gOrm error", err)
    }

    return db
}
