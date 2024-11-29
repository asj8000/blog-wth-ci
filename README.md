# Simple Blog with CodeIgniter 4

## Tech Specs

### Backend
- PHP 8.1+
- CodeIgniter 4
- MySQL 5.7+

### Frontend 
- Bootstrap 5.1.3
- HTML5
- Vanilla JavaScript

### Features
- User authentication (login/logout)
- Blog post CRUD
- Comments on posts
- Admin account seeding

### Default Admin Account
- Username: admin
- Password: admin123

### Requirements
- PHP 8.1 or higher
- MySQL/MariaDB
- Composer

## Setup

### Using Docker (Recommended)

1. Start MySQL container
```bash
docker-compose up -d
```

2. Install dependencies
```bash
composer install
```

3. Configure environment
```bash
cp env .env
```

The default database configuration for Docker is:
```
database.default.hostname = localhost
database.default.database = ci4_blog
database.default.username = ci4user
database.default.password = ci4pass
```

4. Run migrations
```bash
php spark migrate
```

5. Seed admin account
```bash
php spark db:seed AdminSeeder
```

6. Run server
```bash
php spark serve
```

### Manual Setup

1. Clone the repository

```bash
git clone <repository-url>
cd <project-directory>
```

2. Install dependencies
```bash
composer install
```

3. Copy env file
```bash
cp env .env
```

Edit .env file with your database settings
```
database.default.hostname = localhost
database.default.database = ci4_blog
database.default.username = your_username
database.default.password = your_password
```

4. Create database
```sql
CREATE DATABASE ci4_blog CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

5. Run migrations

```bash
php spark migrate
```

6. Seed admin account

```bash
php spark db:seed AdminSeeder
```

7. Run server

```bash
php spark serve
```
