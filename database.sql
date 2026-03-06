-- Create database
CREATE DATABASE IF NOT EXISTS task_manager;
USE task_manager;

-- Create tasks table
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    status VARCHAR(50) NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data (optional)
INSERT INTO tasks (title, description, status) VALUES
('Complete project documentation', 'Write comprehensive documentation for the task management system', 'in progress'),
('Test all features', 'Perform thorough testing of CRUD operations', 'pending'),
('Deploy to production', 'Deploy the application to the production server', 'pending');
