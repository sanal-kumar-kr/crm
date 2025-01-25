# crm

Requirements:-
    Make sure you have the following installed on your system:
    PHP (>=8.1)
    Composer
    MySQL (or any other compatible database)
    A web server like Apache or Nginx
    Laravel CLI


Steps to Set Up the Project Locally:-

    Follow these steps to set up the project on your local machine:
    Extract the ZIP file:
        Extract the project files from the provided ZIP file.

    Navigate to the project directory:
       cd your-project-folder

    Install PHP dependencies:Run the following command to install all the PHP dependencies:
        composer install
    
    Open the .env file and update the following fields:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=your_database_name
        DB_USERNAME=your_database_username
        DB_PASSWORD=your_database_password

    Generate the application key:
        php artisan key:generate

    Run migrations and seed the database:
        php artisan migrate --seed

    Start the development server:
        php artisan serve

    Access the application:
        http://127.0.0.1:8000




# Customer Management System API Documentation

## Base URL
The base URL for the API is the root of the Laravel application: http://127.0.0.1:8000/api/


## Endpoints

### 1. Get All Customers
- **Endpoint**: `/customers`
- **Method**: `GET`
- **Description**: Retrieve all customers.



#### Response:
```json
[
    {
        "id": 1,
        "name": "John Doe",
        "email": "johndoe@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "group": "VIP",
        "created_by": "Admin"
    }
]


### 1. Add a Customer
- **Endpoint**: `/customers`
- **Method**: `POST`
- **Description**: Add a new customer..



#### Request:
```json
[
    {
        "name": "John Doe",
        "email": "johndoe@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "group": "VIP",
    }
]

#### Response:
```json
[
    {
        "id": 1,
        "name": "John Doe",
        "email": "johndoe@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "group": "VIP",
        "created_by": "Admin"
    }
]



### 1. Update a Customer
- **Endpoint**: `/customers/{id}`
- **Method**: `PUT`
- **Description**: Update an existing customer's details.
#### Response:
```json
{
    "name": "John Doe123",
    "email": "johndoe@example.com",
    "phone": "1234567890",
    "address": "123 Main St",
    "group": "VIP",
}

#### Response:
```json
[
    {
        "id": 1,
        "name": "John Doe123",
        "email": "johndoe@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "group": "VIP",
        "created_by": "Admin"
    }
]



### 1. Get a Customer
- **Endpoint**: `/customers/{id}`
- **Method**: `GET`
- **Description**:Get a customer..

#### Response:
```json
[
    {
        "id": 1,
        "name": "John Doe",
        "email": "johndoe@example.com",
        "phone": "1234567890",
        "address": "123 Main St",
        "group": "VIP",
        "created_by": "Admin"
    }
]


### 1.Delete a Customer
- **Endpoint**: `/customers/{id}`
- **Method**: `DELETE`
- **Description**:Delete a customer.

#### Response:
```json
{
    "message": "Customer deleted"
}

### 1.grouped by status
- **Endpoint**: `/groups`
- **Method**: `GET`
- **Description**:endpoint to retrieve customers grouped by status.
#### Response:
```json
{ 
"Individual": 1, 
"Company": 0, 
"VIP": 0
}