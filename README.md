# Hospital Management System

The *Hospital Management System* is built with the Laravel framework. It provides features for user engagement, appointment booking, and appointment management.


## Features

### Guest Features
- *Home Page*: Interactive baner, doctor profiles, and announcements.
- *Doctors Page*: View detailed doctor profiles.
- *Services Page*: Overview of hospital services.
- *Contact Page*: Communicate with hospital staff; includes Google Maps for location.

### User Features
- *User Registration/Login*: Sign up and log in to access personalized features.
- *Book Appointments*: Request appointments with preferred doctors.
- *Notifications*: Receive updates on appointment approvals or rejections.
- *Appointment management*: Manage and cancel upcoming appointments.

### Admin Features
- *Admin Dashboard*: Overview of hospital activities.
- *Manage Doctors*: Add, update, and delete doctor profiles.
- *Manage Services*: Add, update, and delete hospital services.
- *Pending Admin Approvals*: Approve or reject new admin requests.
- *Appointment Management*: Approve or reject user appointments.
- *All Users Page*: View all registered users.



## Built with
- *Framework*: Laravel
- *Frontend*: HTML, CSS, Bootstrap
- *Database*: MySQL



## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/hospital-management-system.git
   
2. Navigate to the project directory:
   ```bash
   cd hospital-management-system
   
3. Install dependencies:
   ```bash
   composer install
   npm install
   
4. Set up the environment::
   ```bash
   cp .env.example .env
   php artisan key:generate
   
5. Configure the database in the .env file.

6. Run migrations:
   ```bash
   php artisan migrate
   
7. Seed the database:
   ```bash
   php artisan db:seed
   
8. Start the server
   ```bash
   php artisan serve

### Login credentials
- *User*:
  - Email: user@gmail.com
  - password: 12345678
  
- *Admin*: 
  - Email: admin@gmail.com
  - password: 12345678
