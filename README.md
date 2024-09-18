
# Project Setup Guide

This document provides instructions for setting up and running both the backend and frontend components of the project.

## Backend Setup

To set up the backend, follow these steps:

1. **Install Dependencies**

   Use Composer to install the necessary PHP dependencies:
   ```bash
   composer install

**Run Migrations**
Apply the database migrations to create the necessary tables and schema:

php artisan migrate

**Start the Laravel Development Server**

Launch the Laravel development server to run the backend:

**php artisan serve**
The server will be accessible at http://127.0.0.1:8000.



**Frontend Setup**
To run the frontend:

Open the Frontend

Open index.html in your preferred web browser.

**Configuration**

The default backend URL is set to http://127.0.0.1:8000/api.

Customizing the Backend URL

If you need to change the backend URL, update the backend_url variable in the script.js file.
