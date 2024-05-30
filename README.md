# Sandwich School App

### Sandwich Ordering Platform

#### **Overview**

This project is a sandwich ordering platform designed specifically for a school. It allows registered students to place sandwich orders before 10 AM each day. Students can select multiple sandwiches with different types of bread and ingredients.

To use the platform, students must be registered and their accounts must be verified via email.
Students can login by providing their email and password.

A confirmation email is sent to the provided email address.

If a student forgets their password, they can request a new one.
A new password is sent to their email and must be confirmed to become active.

## Screenshots

![App Screenshot](https://via.placeholder.com/468x300?text=App+Screenshot+Here)

#### Features

- **User Registration:** Students must register to use the platform. During registration, a confirmation email is sent to the student's email address. The account becomes valid only after the email is confirmed.
- **Order Placement:** Students can place sandwich orders until 10 AM.
- **Multiple Orders:** Students can select and order multiple sandwiches with various ingredients.
- **Email Confirmation:** Email confirmation is required for both registration and password reset, enhancing security and validity of user accounts.

##### Password Management:

- **Forgot Password:** Students can request a new password if they forget their current one. A new password is sent via email and must be confirmed before it becomes active.
- **Order Sandwiches:** Students can place orders for multiple sandwiches with different types of bread and ingredients. Orders can only be placed until 10 AM each day.

## Setup and Installation

#### Prerequisites

    PHP 7.4 or higher
    MySQL 5.7 or higher
    Web server (e.g., Apache, Nginx)

### Steps

Clone the Repository

```bash
git clone https://github.com/NlcmarquesDev/sandwich-school-app.git sandwish-platform
cd sandwich-platform
composer install
```

##### Set Up the Database
The database file is on the project repository

##### Configure the Application

Update the database configuration in your PHP files to connect to your MySQL database.


Start the Web Server

Start your web server and navigate to the application URL.
Usage
Registration

## Technologies Used

 - **PHP:** Backend logic and server-side processing.
 - **MySQL:** Database management system for storing user and order data.
 - **HTML/CSS:** Frontend layout and styling.
 - **JavaScript:** Frontend interactivity and validation.
 - **Model-View-Controller (MVC):** Architecture for organizing codebase efficiently.
 - **Routing:** Custom route creation for seamless navigation within the platform.
 - **Email Integration:** Sending confirmation emails for registration and password reset.


## Autores

- [@NlcmarquesDev](https://github.com/NlcmarquesDev)

## 🚀 About Me

Hello there! 👋 I'm José Nuno Marques, a passionate and enthusiastic Junior Full Stack Developer with a strong desire to create web applications. I love combining my problem-solving skills with cutting-edge technologies to build robust and user-friendly software solutions. This README file serves as a brief introduction to my background, skills, and projects.

## Licença

This project is licensed under the [MIT](https://choosealicense.com/licenses/mit/) License. See the LICENSE file for details.

This README file provides a comprehensive overview of your project, including the features, database schema, setup instructions, and usage guidelines. You can customize it further as needed.
