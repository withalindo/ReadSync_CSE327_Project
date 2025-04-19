-- Create Database
CREATE DATABASE libraryManagementSystemDB;
USE libraryManagementSystemDB;

-- Table: Admins
CREATE TABLE admins (
	  admin_id INT AUTO_INCREMENT PRIMARY KEY,
	  admin_name VARCHAR(250) NOT NULL,
	  admin_email VARCHAR(100) NOT NULL UNIQUE,
	  admin_password VARCHAR(250) NOT NULL,
	  admin_mobile VARCHAR(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO admins (admin_name, admin_email, admin_password, admin_mobile) 
VALUES ('Alindau', 'alindau201@gmail.com', 'admin@1234', '1148458757');




-- Table: Authors
CREATE TABLE authors (
	  author_id INT AUTO_INCREMENT PRIMARY KEY,
	  author_name VARCHAR(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO authors (author_id, author_name) VALUES
(1, 'Harper Lee'),
(2, 'George Orwell'),
(3, 'Jane Austen'),
(4, 'Yuval Noah Harari'),
(5, 'F. Scott Fitzgerald'),
(6, 'J.K. Rowling'); 



-- Table: Categories
CREATE TABLE categories (
	  category_id INT AUTO_INCREMENT PRIMARY KEY,
	  category_name VARCHAR(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO categories (category_id, category_name) VALUES
(1, 'Novel'),
(2, 'Non-Fiction'),
(3, 'Fantasy');




-- Table: Books
CREATE TABLE books (
	  book_id INT AUTO_INCREMENT PRIMARY KEY,
	  book_name VARCHAR(250) NOT NULL,
	  book_isbn VARCHAR(20) NOT NULL UNIQUE,
	  author_id INT NOT NULL,
	  category_id INT NOT NULL,
	  number_of_copies INT NOT NULL CHECK (number_of_copies >= 0),
	  book_price DECIMAL(10,2) NOT NULL CHECK (book_price >= 0),
	  FOREIGN KEY (author_id) REFERENCES authors(author_id) ON DELETE CASCADE,
	  FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert Books
INSERT INTO books (book_name, book_isbn, author_id, category_id, number_of_copies, book_price)
VALUES
('To Kill a Mockingbird', '978-0-06-112008-4', 1, 1, 5, 1520.00),
('1984', '978-0-452-28423-4', 2, 1, 8, 1230.50),
('Pride and Prejudice', '978-1-85326-000-1', 3, 1, 10, 1140.75),
('Sapiens: A Brief History of Humankind', '978-0-06-231609-7', 4, 2, 15, 1870.00),
('The Great Gatsby', '978-0-7432-7356-5', 5, 1, 7, 1050.00),
('Harry Potter and the Half-Blood Prince', '978-0-7475-8108-6', 6, 3, 12, 1350.00);


CREATE TABLE issued_books (
    serial_no INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT NOT NULL,
    user_id INT NOT NULL,
    status TINYINT(1) NOT NULL DEFAULT 0, -- 0 = Issued, 1 = Returned
    issue_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;





-- Table: Users
CREATE TABLE users (
	  user_id INT AUTO_INCREMENT PRIMARY KEY,
	  user_name VARCHAR(250) NOT NULL,
	  user_email VARCHAR(100) NOT NULL UNIQUE,
	  DOB DATE DEFAULT NULL,
	  user_mobile VARCHAR(15) NOT NULL,
	  password VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE book_requests (
	  request_id INT AUTO_INCREMENT PRIMARY KEY,
	  book_id INT NOT NULL,
	  user_id INT NOT NULL,
	  status ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending',
	  request_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	  FOREIGN KEY (book_id) REFERENCES books(book_id) ON DELETE CASCADE,
	  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- DELETE FROM issued_books; 
