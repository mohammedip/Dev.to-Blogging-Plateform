
-- Create the database
DROP DATABASE IF EXISTS devblog_db;
CREATE DATABASE devblog_db;

-- Connect to the database
USE devblog_db;

-- Create table for categories
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name TEXT NOT NULL
);

-- Create table for users
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    bio TEXT,
    profile_picture_url VARCHAR(255),
    role ENUM('user', 'auteur', 'admin') NOT NULL DEFAULT 'user'
);

-- Create table for articles

CREATE TABLE articles (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    category_id BIGINT NOT NULL,
    featured_image VARCHAR(255),
    status ENUM('draft', 'published', 'scheduled') NOT NULL DEFAULT 'draft',
    scheduled_date DATETIME NULL,
    author_id BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    views INTEGER DEFAULT 0,
    UNIQUE KEY idx_articles_slug (slug),
    KEY idx_articles_category (category_id),
    KEY idx_articles_author (author_id),
    KEY idx_articles_status_date (status, scheduled_date),
    CONSTRAINT fk_articles_category FOREIGN KEY (category_id) 
        REFERENCES categories (id),
    CONSTRAINT fk_articles_author FOREIGN KEY (author_id) 
        REFERENCES users (id),
    CONSTRAINT chk_scheduled_date CHECK (
        (status != 'scheduled') OR 
        (status = 'scheduled' AND scheduled_date IS NOT NULL)
    )
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- Create table for tags
CREATE TABLE tags (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

-- Create table for article_tags to handle many-to-many relationship
CREATE TABLE article_tags (
    article_id BIGINT,
    tag_id BIGINT,
    PRIMARY KEY (article_id, tag_id),
    FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE
);

-- Insert Categories
-- Insert Categories
INSERT INTO categories (id, name) VALUES
(1, 'Web Development'),
(2, 'Mobile Development'),
(3, 'DevOps'),
(4, 'Data Science'),
(5, 'Artificial Intelligence');

-- Insert Users
INSERT INTO users (id, username, email, password_hash, bio, profile_picture_url) VALUES
(5, 'john_doe', 'john@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Senior Web Developer with 10 years of experience', 'profiles/john.jpg'),
(6, 'jane_smith', 'jane@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Full Stack Developer and AI enthusiast', 'profiles/jane.jpg'),
(7, 'michelle_wilson', 'michelle@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DevOps Engineer and Cloud Architect', 'profiles/mike.jpg');

-- Insert Articles

INSERT INTO articles (title, slug, content, category_id, featured_image, status, scheduled_date, author_id) VALUES
('Introduction to Web Development', 'introduction-to-web-development', 'This article covers the basics of web development...', 1, 'images/web_dev_intro.jpg', 'published', NULL, 5),
('Mobile Development Trends in 2025', 'mobile-development-trends-2025', 'Mobile development is constantly evolving. This article discusses...', 2, 'images/mobile_trends_2025.jpg', 'published', NULL, 6),
('Mastering DevOps Practices', 'mastering-devops-practices', 'DevOps practices are essential for modern development...', 3, 'images/devops_practices.jpg', 'draft', NULL, 7),
('Data Science for Beginners', 'data-science-for-beginners', 'Data science is a field that combines programming and statistics...', 4, 'images/data_science_intro.jpg', 'scheduled', '2025-01-10 10:00:00', 5),
('The Future of Artificial Intelligence', 'future-of-artificial-intelligence', 'AI is shaping the future of technology. In this article, we explore...', 5, 'images/ai_future.jpg', 'published', NULL, 6);

-- Insert Tags
INSERT INTO tags (name) VALUES
('Web Development'),
('Mobile Development'),
('DevOps'),
('Data Science'),
('Artificial Intelligence');

-- Insert Article-Tags Relationships
-- Insert Article-Tags Relationships
INSERT INTO article_tags (article_id, tag_id) VALUES
(2, 1),   -- "Introduction to Web Development" tagged as Web Development
(2, 3),   -- "Introduction to Web Development" tagged as DevOps
(3, 2),   -- "Mobile Development Trends in 2025" tagged as Mobile Development
(3, 5),   -- "Mobile Development Trends in 2025" tagged as Artificial Intelligence
(4, 3),   -- "Mastering DevOps Practices" tagged as DevOps
(5, 4),   -- "Data Science for Beginners" tagged as Data Science
(6, 5);   -- "The Future of Artificial Intelligence" tagged as Artificial Intelligence
          -- "The Future of Artificial Intelligence" tagged as AI

