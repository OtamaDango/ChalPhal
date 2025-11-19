# ChalPhal – Community Posting & Discussion Platform

ChalPhal is a web application built with **Laravel**, **PHP**, **Bootstrap**, and **MySQL**. It allows users to create posts, comment on other users' posts, and interact in a simple, clean, and responsive environment.

---

## Features

- **User Authentication:** Registration, login, and logout functionality.
- **User Roles:** Authenticated users can post and comment; guests can browse posts.
- **Post Management:** Create, view, and delete posts.
- **Comment System:** Users can comment on posts and delete their own comments.
- **Responsive UI:** Built with Bootstrap, works on both desktop and mobile.
- **Clean Design:** Dark-themed UI for a modern look.

---

## Screenshots

### Home
![Home Page](assets/home.png)

### Dashboard
![Dashboard Page](assets/dashboard.png)

### Create-Post
![Crearte-Post Page](assets/create-post.png)

### Comments
![Comment Page](assets/comments.png)

### Login
![Login Page](assets/login.png)

### Register
![Register Page](assets/register.png)

---

## Technologies Used

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Database:** MySQL
- **Version Control:** Git & GitHub

---

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/OtamaDango/ChalPhal.git
   cd chalphal
2. **Install dependencies**
   ```bash
    composer install
    npm install
    npm run dev
3. **Set up environment**
Copy the .env.example file to .env:
   ```bash
   cp .env.example .env
   
4. **Open .env and configure your database:**
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=chalphal_db
    DB_USERNAME=root
    DB_PASSWORD=your_password
        
4. **Generate application key**
    ```bash
    php artisan key:generate
    Run migrations
    php artisan migrate
8. **Start the development server**
    ```bash
    php artisan serve
   
## Usage

- Register a new account or login using an existing account.
- Navigate the dashboard to create, view, or delete posts.
- Comment on other users’ posts.
- Access About and Contact pages from the navbar.
- Logout when finished.

## Future Enhancements

- Add profile pictures for users.
- Allow editing posts and comments.
- Add likes/upvotes for posts and comments.
- Implement search and filter for posts.
- Mobile-first optimizations for better responsive design.


