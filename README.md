# ChalPhal – Community Posting & Discussion Platform

ChalPhal is a web application built with **Laravel**, **PHP**, **Bootstrap**, and **SQLite**. It allows users to create posts, comment on other users' posts, and interact in a simple, clean, and responsive environment.

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

![Home Page](path-to-screenshot/home.png)  
![Post Detail](path-to-screenshot/post-detail.png)  
*Add screenshots as needed.*

---

## Technologies Used

- **Backend:** PHP, Laravel
- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Database:** SQLite
- **Version Control:** Git & GitHub

---

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/chalphal.git
   cd chalphal
Install dependencies:

bash
Copy code
composer install
Copy .env.example to .env and set up your environment:

bash
Copy code
cp .env.example .env
php artisan key:generate
Run migrations:

bash
Copy code
php artisan migrate
Serve the application:

bash
Copy code
php artisan serve
Visit http://127.0.0.1:8000 in your browser.

Usage
Register a new account or log in.

Create posts and view posts by other users.

Comment on posts to interact with the community.

Delete your own posts or comments if needed.

Folder Structure
app/ – Contains controllers and models.

resources/views/ – Blade templates for UI.

routes/web.php – Application routes.

database/migrations/ – Database schema.

Future Improvements
Add user profiles with avatars.

Implement post categories and search functionality.

Add notifications for comments on posts.

Mobile-first UI improvements.

License
This project is open source and free to use.

