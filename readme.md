
# 🚀 PHP Tutorial Using Docker

- **Reference:** Youtube Playlist Link: https://www.youtube.com/playlist?list=PLr3d3QYzkw2xabQRUpcZ_IBk9W50M9pe-

# **Topics Covered**
- Functions - Variable functions, Anonymous functions, Arrow function ✔️
- Declare Statements ✔️
- PHP Configuration ✔️
- Error Handling E_ALL, E_WARNING ✔️
- Apache Configuration ✔️
- Working with FileSystem ✔️
- OOP - Typed Properties ✔️
- Constructor Property Promotion ✔️
- Namespace ✔️
- PSR-4, Autoloading, PHP-FIG ✔️
- OOP - Class Constants ✔️
- OOP - Static Properties ✔️
- OOP - Encapsulation & Abstraction ✔️
- OOP - Interface & Polymorphism ✔️
- OOP - Error Handling
- OOP - Magic Methods
- OOP - Traits
- OOP - Anonymous Classes
- Date Objects
- Object Serialization
- Model-View-Controller Architecture
- HTTP Headers and Output Buffering
- MySQL and PDO
- Testing with PHPUnit

## 🛠️ Tech Stack
- **Programming Language**: PHP 8.3
- **Frameworks & Libraries**: Composer, PHPUnit, Ramsey/Uuid, vlucas/phpdotenv
- **Web Server**: Nginx
- **Database**: MySQL
- **Containerization**: Docker

## 📦 Installation

### Prerequisites
- Docker
- Docker Compose
- PHP 8.3

### Quick Start
```bash
# Clone the repository
git clone https://github.com/yourusername/docker-php.git

# Navigate to the project directory
cd docker-php

# Copy the .env.example file to .env
cp src/.env.example src/.env

# Install dependencies
composer install

# Start the Docker containers
docker-compose up -d

# Access the application
open http://localhost
```

### Alternative Installation Methods
- **Docker Compose**: Use the provided `docker-compose.yml` file to set up the application.
- **Development Setup**: Follow the instructions in the `README.md` file for a local development environment.

## 🎯 Usage

### Basic Usage
```php
// Example usage of the Transaction class
require __DIR__.'/../vendor/autoload.php';
use App\Transaction;

$transaction = new Transaction(100, 'Transaction 1');
$transaction->addTax(20)->addDiscount(10);

var_dump($transaction->amount);
```

### Advanced Usage
- **Configuration**: Customize the application by modifying the `.env` file.
- **Database**: Connect to the MySQL database using the provided credentials.
- **API**: Use the provided API endpoints to interact with the application.

## 📁 Project Structure
```
docker-php/
├── .gitignore
├── docker-compose.yml
├── Dockerfile
├── src/
│   ├── .env.example
│   ├── composer.json
│   ├── public/
│   │   ├── 36demo-index.php
│   │   ├── 54demo-exceptions.php
│   │   ├── 55demo-datetime.php
│   │   ├── 56demo-iterators.php
│   │   ├── demo-anonymous-class.php
│   │   ├── demo-autoload.php
│   │   ├── demo-class-constants.php
│   │   ├── demo-class-static.php
│   │   ├── demo-composer-autoload.php
│   │   ├── demo-composer.php
│   │   ├── demo-inheritance.php
│   │   ├── demo-magic-methods.php
│   │   ├── demo-namespace.php
│   │   ├── demo-null-safe.php
│   │   ├── demo-object-cloning.php
│   │   ├── demo-property-promotion.php
│   │   ├── demo-serialize.php
│   │   ├── functions.php
│   │   ├── hello.php
│   │   ├── looping.php
│   ├── Tests/
│   │   ├── Unit/
│   │   │   ├── RouterTest.php
│   ├── Views/
│   │   ├── errors/
│   │   │   ├── 404.php
│   │   ├── invoices/
│   │   │   ├── create.php
│   │   ├── index.php
├── .env
├── mysqldump.txt
├── phpunit.xml
└── README.md
```

## 🔧 Configuration
- **Environment Variables**: Configure the application by modifying the `.env` file.
- **Database Configuration**: Update the database credentials in the `.env` file.


## 📝 License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Authors & Contributors
- **Maintainers**: [Your Name]
- **Contributors**: [List of contributors]


## Docker Configuration Instructions/Issues:
- Check the index.php, Controller and View properly, otherwise Nginx will throw 404 error.
- Error dated: 03.08.25: HomeController was testing PDO transactions. However, there was no table inside app_db database, Hence Nginx threw 404 error.

