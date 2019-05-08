#### Setup

1. Clone project
2. install packages byn runnig `composer install`
3. create a `.env` file by running `cp .env.example .env`
4. create database and update `.env` with database details
5. run migrations `php artisan migrate`
6. serve project on default port 8000 by running `php artisan serve`


#### Endpoints

BASE URL = https://localhost:8000/api/v1 (if you are serving on the default port)

1. Create Book 
- METHOD: POST
- URI: '/books'
- DATA

|   |  required |  description | data type |
|---|---|---|---|
|  name | yes  |  title of book  | String |
|  isbn | yes  |  isbn of book  | String |
|  authors | yes  |  authors of book seperated by comma (,). eg 'Jan Doe', 'John Doe' | String |
|  publisher |  yes |  publisher of book  | String |
|  number_of_pages | yes  | number of pages the book contains  | Integer |
|  country | yes  |  country of origin | String |
|  released_date | yes  | date released  |  date |

- RESPONSE
```
{
    "status_code": 201,
    "status": "success",
    "data": {
        "book": {
            "name": "Harry Potter",
            "isbn": "23234",
            "authors": [
                "J.K Rowlling"
            ],
            "publisher": "Hogwarts",
            "country": "England",
            "release_date": "1991-05-04",
            "number_of_pages": 900,
            "id": 1
        }
    }
}
```




