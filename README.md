# Laravel Project Setup

## Requirements

- PHP >= ^8.2


## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/HassanElshazlyEida/Arib-php-assessment
   cd arib-php-assessment
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

4. Generate the application key:

   ```bash
   php artisan key:generate
   ```

5. Set up your database in the `.env` file:

   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=<your-database-name>
   DB_USERNAME=<your-username>
   DB_PASSWORD=<your-password>
   ```

## Running the Application

1. Start the local development server:

   ```bash
   php artisan serve
   ```

   The application will be available at `http://127.0.0.1:8000`.

## Database Migrations

1. To run the migrations and seed the database, use:

   ```bash
   php artisan migrate:fresh --seed
   ```

   This command will drop all tables, run all migrations, and then seed the database with the defined seeders.

## Login Credentials

There are two managers you can use for login:

- **First Manager**
  - Email: `first_manager@test.com`
  - Password: `1234567890`
  - Password: `fJEIBzwnKOPQRfyXgRPQ10jg`

- **Second Manager**
  - Email: `second_manager@test.com`
  - Password: `0987654321`
  - Password: `fJEIBzwnKOPQRfyXgRPQ10jg`

Additionally, there is one employee you can use to login:

- **Employee**
  - Email: `employee@test.com`
  - Password: `1234567890`
  - Password: `fJEIBzwnKOPQRfyXgRPQ10jg`
