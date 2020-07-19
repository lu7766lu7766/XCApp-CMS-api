package main

import (
    "flag"
    "log"
    "push/Service"
)

func main() {
    var message string
    appId := flag.Uint("appId", 0, "Please put app unsigned id")
    flag.StringVar(&message, "pushMessage", "", "Please put push message")
    flag.Parse()
    if *appId > 0 {
        service := Service.NewPushService()
        service.Push(*appId, message)
    } else {
        log.Fatalln("app Id not found ")
        
    }
}
