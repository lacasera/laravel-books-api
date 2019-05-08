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
METHOD: POST
URI: '/books'
JSON: 
|   |  required |  description |  
|---|---|---|
|  name | yes  |  title of book  |  
|  isbn | yes  |  isbn of book  | 
|  authors | yes  |  authors of book seperated by comma (,). eg 'Jan Doe', 'John Doe' | 
|  publisher |  yes |  publisher of book  |  
|  number_of_pages | yes  | number of pages the book contains  |  
|  country | yes  |  country of origin | 
|  released_date | yes  | date released  |   



