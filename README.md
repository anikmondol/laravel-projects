# Oredoo: Simple Blogs Website

## Overview

Oredoo is a Blogs Website built with [Laravel](https://laravel.com/), designed to streamline Blog tracking from creation to completion. The system allows admins and Users to manage create with role-based permissions, ensuring efficient Blog delegation and execution. With real-time updates and built-in search functionality, Oredoo helps users stay on top of their Blog inventory with ease.

## Features

- **Blog Creation & Assignment**: Admins can create, assign, edit, and delete Blogs.
- **Role-Based Access Control**: Managed using Laravel's Gate system. Admins have full control, while Users and Bloggers or Manger have specific permissions based on their role.
- **Task Permissions**:
  -  Users and Bloggers or Manger with Blog creation permissions can create Blogs.
  -  Users and Bloggers or Manger with assignment permissions can assign Blogs but cannot create them.
  - Only admins can edit or delete Blogs.
  - Blogs cannot be assigned if their status is "Pending."
- **Search Functionality**: Built-in search for better Blog management and organization.
- **Blog Inventory**:  Users and Bloggers or Manger can view their assigned Blogs and mark them as "Complete" when done.

## Installation

To set up and run Oredoo locally, follow these steps:

1. Clone the repository:
    ```bash
    git clone https://github.com/anikmondol/laravel-projects
    ```

2. Navigate to the project directory:
    ```bash
    cd laravel-projects
    ```

3. Install PHP dependencies:
    ```bash
    composer install
    ```

4. Install JavaScript dependencies:
    ```bash
    npm install
    ```

5. Set up environment variables:
    - Copy `.env.example` to `.env`
    - Configure your database settings in the `.env` file

6. Run database migrations and seed the admin user:
    ```bash
    php artisan migrate
    php artisan db:seed --class=AdminSeeder
    ```

7. The seeded admin account credentials are:
    - **Email**: admin@dev.com
    - **Password**: Pa$$w0rd!

8. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage

Once the server is running, you can access Oredoo via [http://localhost:8000](http://localhost:8000).

### Admin:
- Create, assign, edit, and delete Blogs.
- Manage  Users and Bloggers or Manger roles and permissions.
- Control the flow of Blogs by updating their statuses.
- Only admins can change Blog statuses, and Blogs cannot be assigned unless they are marked as "Pending."

###  Users and Bloggers or Manger:
- Can create or assign Blogs depending on their role and permissions.
- View assigned Blogs and mark them as "Complete" when finished.

## Technologies Used

- **[Laravel](https://laravel.com/)**: Backend framework for robust Blog management and routing.
- **[Boostrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/)**: Utility-first CSS framework for responsive and clean UI design.

## Contributing

Contributions to Oredoo are welcome! To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and submit a pull request.
4. For major changes, please open an issue first to discuss the changes.
