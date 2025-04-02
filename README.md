# Bila-Bila Mart E-Commerce Website

![Bila Bila Mart](https://github.com/user-attachments/assets/e91192c3-d052-4453-bacd-79e7bbcb6e3c)



## 📌 Project Overview
This project involves the development of an e-commerce website for **Bila-Bila Mart**, a Malaysian convenience grocer that modernizes the traditional **Kedai Runcit** concept with a fresh and contemporary style. The store takes pride in supporting local brands and has grown rapidly, with over **25 branches** across the Klang Valley since its launch in **March 2020**.

With its rapid expansion, Bila-Bila Mart wanted to enhance customer experience by introducing an **online shopping platform** that enables customers to **purchase groceries conveniently and have them delivered to their doorstep**. The platform also includes a **membership system** to attract and retain customers.

## 🚀 Features
- **User Authentication**: Secure login and registration system for customers.
- **Product Catalog**: Browse and search for groceries across multiple categories.
- **Shopping Cart & Checkout**: Easy cart management and secure checkout process.
- **Payment Integration**: Multiple payment options for seamless transactions.
- **Order Tracking**: Customers can track their orders in real-time.
- **Membership System**: Exclusive discounts, loyalty points, and benefits for registered members.
- **Admin Panel**: Manage products, orders, and customer data efficiently.
- **Multi-Branch Support**: Customers can order from their nearest Bila-Bila Mart location.

## 🛠️ Tech Stack
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL
- **Server**: XAMPP (Apache, MySQL, PHP, Perl)

## 📂 Installation & Setup
### Prerequisites
Ensure you have the following installed:
- XAMPP (Apache, MySQL, PHP)
- Git

### Clone the Repository
```bash
git clone https://github.com/yourusername/bila-bila-mart.git
cd bila-bila-mart
```

### Setup Database
1. Open **XAMPP Control Panel** and start **Apache** and **MySQL**.
2. Open **phpMyAdmin** in your browser (http://localhost/phpmyadmin).
3. Create a new database named `bilabila_mart`.
4. Import the provided SQL file (`database.sql`) into the database.

### Configure Backend
1. Open the `config.php` file in the project.
2. Update database credentials:
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bilabila_mart";
```

### Running the Application
1. Move the project folder to `htdocs` in your XAMPP installation directory.
2. Open the browser and go to:
```
http://localhost/bila-bila-mart/
```

## 📜 License
This project is licensed under the **MIT License**.

## 🤝 Contributing
We welcome contributions! To contribute:
1. Fork the repository
2. Create a new branch (`git checkout -b feature-branch`)
3. Commit your changes (`git commit -m "Added new feature"`)
4. Push to the branch (`git push origin feature-branch`)
5. Open a **Pull Request**



