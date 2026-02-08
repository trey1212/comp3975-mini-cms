# COMP3975 Server-Side Web Scripting

## Full-Stack Content Management System
**Objective:** Develop a PHP-based backend with a MySQL database and a React.js frontend that consumes a custom JSON API

### Assignment 1 Requirements:
**Application Layer (Backend - PHP)**
- REST API Gateway: Serves as the entry point for all frontend requests.
- Data Access Layer: PHP's PDO or MySQL classes that execute queries against the database.
- Admin Site
  - Rich Text Editor: Quill or TinyMCE
  - Authentication & Views for Admins
- Data Layer (Storage - MySQL)
  - Local File Database: MySQL database server running is Docker container that stores the persistent article data, including HTML/Markdown content and timestamps.
  - Seed the database with this author account: Username/Email Password -> a@a.a/P@$$w0rd
