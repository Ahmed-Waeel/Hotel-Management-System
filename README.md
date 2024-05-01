# Hotel Management System Assessment

This project is a Hotel Management System developed as part of an assessment. It aims to provide a solution for managing hotel operations efficiently.

### Getting Started

To get this project up and running on your local machine, follow these steps:

1. Clone the Repository:
```bash
git clone https://github.com/your_username/hotel-management-system.git
cd hotel-management-system
```

2. Install Dependencies:
```bash
composer install
```

3. Set Up Environment:
```bash
copy .env.example .env
```

4. Generate Application Key:
```bash
php artisan key:generate
```

5. Run Migrations and Seed Database:
```bash
php artisan migrate --seed
```

6. Access Dashboard:
   Once the project is running, you can access the dashboard at `http://localhost:8000/dashboard`.

### Default Admin Credentials

- Email: admin@email.com
- Password: password

### Features

- Dashboard: Provides an overview of hotel operations.
- Room Management: Allows adding, editing, and deleting rooms.
- Reservation Management: Enables managing reservations, including booking and canceling.
- Customer Management: Tracks information about customers.
- Invoice Generation: Automatically generates invoices for reservations.

### Technologies Used

- Laravel 11
- MySQL
- HTML/CSS
- JavaScript

### Support

If you encounter any issues or have questions regarding this project, please feel free to contact Ahmed Wael at Ahmed.wael7822@gmail.com.

Thank you for reviewing this assessment!
