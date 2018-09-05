## City Api

### `POST` City
```
/api/cities
```
Login User
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| username | username | User's Username |
| password | password | User's Password |

#### Response
* _Error_
``` json
{
    "error": "Unauthorised",
    "code": 401
}
```

* _Success_
```json
{
    "result": {
        "id": 1,
        "city": "Đà Nẵng",
        "country": "Việt Nam",
        "created_at": "2018-08-27 08:43:56",
        "updated_at": "2018-08-27 08:43:56",
    },
    "code": 200
}
```
