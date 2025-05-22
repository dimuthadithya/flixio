CREATE TABLE users (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    role ENUM('user', 'admin') DEFAULT 'user',
    remember_token VARCHAR(100),
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);



CREATE TABLE movies (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    tmdb_id INT UNIQUE, -- TMDB movie ID
    title VARCHAR(255),
    overview TEXT,
    poster_path VARCHAR(255),
    backdrop_path VARCHAR(255),
    release_date DATE,
    runtime INT,
    vote_average DECIMAL(4,2),
    genre VARCHAR(255),
    download_link VARCHAR(500), -- If storing download link
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);



CREATE TABLE watchlists (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT,
    movie_id BIGINT,
    watched BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE CASCADE
);



CREATE TABLE feedback (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT,
    movie_id BIGINT NULL, -- optional: NULL for general feedback
    message TEXT,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (movie_id) REFERENCES movies(id) ON DELETE SET NULL
);
