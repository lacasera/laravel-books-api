#### Setup

1. Clone project
2. install packages by running `composer install`
3. create a `.env` file by running `cp .env.example .env`
4. create database and update `.env` with database details
5. run migrations `php artisan migrate`
6. serve project on default port 8000 by running `php artisan serve`
7. Run tests by runnning 'composer test

#### Endpoints
```
BASE URL = https://localhost:8000/api (if running on default port)
```
1. query the Ice And Fire API for books

```
GET: '/external-books'
```

2. Search the Ice And Fire API for a book by name

```
GET: '/external-books?name=A Game of Thrones'
```

3. Create a book

```
POST: '/v1/books'
```

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
4. List all books

```
GET: '/v1/books'
```

- RESPONSE
```
{
    "status_code": 200,
    "status": "success",
    "data": []
    
}
```

5. Show a book

```
GET: '/v1/books/{bookId}'
```
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

6. Update a book

```
PATCH: '/v1/books/{bookId}'
```

DATA

```
{
    "name": "New Awesome Book"
}
```

- RESPONSE
```
{
    "status_code": 200,
    "status": "success",
    "message": "The book New Awesome Book has been updated successfully"
    "data": []
    
}
```

7. Delete a book
```
DELETE: '/v1/books/{bookId}'
```
- RESPONSE
```
{
    "status_code": 200,
    "status": "success",
    "message": "The book New Awesome Book has been deleted successfully"
    "data": []
    
}
```

8. Search for a book
```
Search a book by name, country , publisher and release date (year).
```

```
GET: '/v1/books/search?query=New Awesome Boook'
```

- RESPONSE
```
{
    "status_code": 200,
    "status": "success",
    "data": []    
}
```
