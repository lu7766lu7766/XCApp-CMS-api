package Models

type Device struct {
    Models
    Identify string `json:"identify"`
    AppId    uint   `gorm:"column:app_id"`
}

func (Device) TableName() string {
    return "device"
}
