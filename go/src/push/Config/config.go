package Config

import (
    "fmt"
    "github.com/joho/godotenv"
    "log"
)

var myEnv map[string]string

func init() {
    var err error
    myEnv, err = godotenv.Read(".env")
    if err != nil {
        log.Fatalln(err)
    } else {
        fmt.Println("read env success")
    }
}

func Get(key string) (string) {

    return myEnv[key]

}
