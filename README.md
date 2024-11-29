# Simple Blog with CodeIgniter 4

## Tech Specs

### Backend
- PHP 8.1+
- CodeIgniter 4.5.5
- MySQL 8.0

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
- MySQL 8.0
- Composer
- Docker (optional)

## Setup

1. Clone the repository
```bash
git clone <repository-url>
cd <project-directory>
```

2. Install dependencies
```bash
composer install
```

3. Configure environment
```bash
cp env .env
```

4. Setup Database
```bash
docker-compose up -d
```

Then edit .env file with your database settings:
```
# For Docker
database.default.hostname = 127.0.0.1
database.default.database = ci4_blog
database.default.username = ci4user
database.default.password = ci4pass
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

Visit http://localhost:8080 to access the blog.
