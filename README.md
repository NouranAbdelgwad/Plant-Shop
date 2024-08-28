# 🌿 Plant Shop

Welcome to the Plant Shop project! This application allows users to browse and purchase a variety of plants online. Below are the details regarding the technologies used, installation instructions, and key functionalities.

## 🛠️ Used Technologies

### Front-end
- **HTML** 🌐
- **CSS** 🎨
- **JavaScript** 📜
- **Bootstrap** 🚀

### Back-end
- **MySQL Database** 🗄️
- **Laravel Framework** ⚙️

### Version Control
- **GitHub** 📊

## 📥 Installation and Usage Instructions

### Prerequisites
- **XAMPP**: Ensure XAMPP is installed and running on your machine. 🖥️
- **Composer**: Make sure you have Composer installed to manage Laravel dependencies. 📦
- **Git**: Install Git to clone the repository. 🧑‍💻

### Steps to Install the Laravel Project

1. **Clone the Repository**  
   Open your terminal or command prompt and run:
   ```bash
   git clone https://github.com/NouranAbdelgwad/Plant-Shop.git
Navigate to the Project Directory

    ```bash
cd Plant-Shop
Install Dependencies

Run the following command to install the required PHP packages:

    ```bash
composer install
Set Up the Environment File

    ```bash the .env.example file to create your .env file:

    ```bash
cp .env.example .env
Configure the Database

Open the .env file in your code editor and update the following lines to match your XAMPP database configuration:

    ```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=green_store
DB_USERNAME=root
DB_PASSWORD=
Create the Database

Open phpMyAdmin by navigating to http://localhost/phpmyadmin in your web browser. 🌍
Create a new database with the name you specified in the .env file. 🗂️
Import the Database

In phpMyAdmin, select the newly created database.
Click on the "Import" tab.
Choose the database export file (usually a .sql file) located in your project folder and click "Go" to import it. 📤
Run Migrations

If needed, run the following command:

    ```bash
php artisan migrate --path="/database/migrations/2024_08_19_191407_create_users_table.php"
🔑 Key Functionalities
Responsive Design 📱:

Ensures that the application is usable on various devices (desktops, tablets, smartphones) by adapting the layout and elements accordingly.

Authentication 🔒:

Allows users to register, log in, and securely manage their accounts. This includes features like password recovery and email verification.

Authorization ✅:

Manages user permissions and roles, ensuring that users can only access resources and functionalities they are authorized to use (e.g., admin vs. regular user).

Admin Dashboard 🖥️:

Provides administrators with a user-friendly interface to manage the application, including user management, content moderation, and analytics.

Shopping Cart 🛒:

Allows users to add products to a cart, view their selected items, modify quantities, and proceed to checkout.

Feel free to explore and contribute to the Plant Shop project! 🌱
