# Task Management System

A simple PHP/MySQL task management application with full CRUD operations.

## Features

- View all tasks
- Add new tasks
- Edit existing tasks
- Delete tasks
- Task status tracking (Pending, In Progress, Completed)

## Installation

1. **Database Setup**
   - Open phpMyAdmin
   - Import the `database.sql` file to create the database and table
   - Or run the SQL commands manually

2. **Configuration**
   - Edit `config/db.php` if needed to update database credentials:
     - DB_HOST (default: localhost)
     - DB_USER (default: root)
     - DB_PASS (default: empty)
     - DB_NAME (default: task_manager)

3. **Deploy**
   - Copy the `task-manager` folder to your web server (e.g., htdocs for XAMPP)
   - Access via browser: `http://localhost/task-manager/`

## Folder Structure

```
task-manager/
├── config/
│   └── db.php              # Database connection
├── includes/
│   ├── header.php          # Common header
│   └── footer.php          # Common footer
├── tasks/
│   ├── add.php             # Add new task
│   ├── edit.php            # Edit task
│   └── delete.php          # Delete task
├── index.php               # Main task list
├── style.css               # Styles
├── database.sql            # Database schema
└── README.md               # This file
```

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher / MariaDB 10.3 or higher
- Web server (Apache/Nginx)

## Security Features

- Prepared statements for SQL injection prevention
- HTML escaping for XSS prevention
- Input validation
- Error logging

## Usage

1. **View Tasks**: Open `index.php` to see all tasks
2. **Add Task**: Click "Add Task" button, fill the form, and submit
3. **Edit Task**: Click "Edit" button on any task, modify, and save
4. **Delete Task**: Click "Delete" button on any task (with confirmation)

## License

Free to use for learning and personal projects.
