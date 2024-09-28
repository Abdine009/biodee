Overview
Biodee is a web application built with the Laravel framework, designed to manage and display a collection of biological data or products (e.g., plant species, animals, agricultural products). The application integrates with a PostgreSQL database and can be maintained on Supabase, a powerful open-source backend service that offers database hosting and additional features like authentication and file storage.

Features
CRUD (Create, Read, Update, Delete) operations for biological entities
Search and filter functionalities to find specific items in the catalog
Responsive design for an optimized user experience across devices
User authentication and roles management (admin and regular users)
Database migrations and seeding for easy setup
PostgreSQL as the database engine for high performance and scalability
Can be maintained and hosted using Supabase for additional backend services (authentication, file storage, real-time data)


Technologies Used
Laravel (PHP framework)
PostgreSQL (Database)
Supabase (Optional backend hosting with PostgreSQL, real-time subscriptions, and file storage)
TailwindCSS (Frontend framework for responsive design)
Blade (Laravel's templating engine)
Composer (Dependency manager for PHP)
NPM (Node package manager for frontend assets)


Requirements
To run this project, ensure you have the following dependencies installed:

PHP >= 8.0
Composer >= 2.x
Node.js >= 14.x
NPM >= 6.x
PostgreSQL >= 12
Laravel >= 9.x
Supabase CLI (Optional, for managing the project on Supabase)


Deployment
The database is hosted on Supabase, so the deployment process is simplified. Follow these steps to deploy the project:

Clone the repository:
git clone https://github.com/yourusername/bio-catalog.git
cd bio-catalog

Install dependencies:

Install PHP dependencies via Composer:
composer install

Install frontend dependencies via NPM:
npm install

run the migrations and seeders to initialize the database:


php artisan migrate --seed
Run the project:

Start the Laravel development server:
php artisan serve

Once these steps are complete, your application should be up and running, with the database already hosted and maintained on Supabase.
