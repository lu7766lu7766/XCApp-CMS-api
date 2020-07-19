package Repository

import (
    "github.com/jinzhu/gorm"
    "push/Models"
)

type AppManageRepo struct {
    orm *gorm.DB
}
type appManage struct {
}

func NewAppManageRepo() *AppManageRepo {
    return &AppManageRepo{
        orm: Models.InitGOrm(),
    }
}

func (this *AppManageRepo) FindWithDeviceInfo(id uint) (*Models.AppManage, error) {
    app := Models.AppManage{}
    defer this.orm.Close()
    err := this.orm.Preload("DeviceInfo").First(&app, id).Error
    if err != nil {
        return &app, err
    }

    return &app, err
}
