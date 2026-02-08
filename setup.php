<?php
require_once "db_connect.php";

//user table
$user = "
    CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(40) NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(20) NOT NULL,
        PRIMARY KEY (id)
    );
";

if ($conn->query($sql_users) === TRUE) {
    echo "Table 'users' created.<br>";
} else {
    die("Error creating users: " . $conn->error);
}

//Seed admin user and check if it already exists
$check = $conn->query("SELECT id FROM users WHERE email = 'a@a.a'");
if ($check->num_rows == 0) {
    $hashed_pass = password_hash('P@$$w0rd', PASSWORD_DEFAULT);
    
    $sql_seed = "INSERT INTO users (email, password, role) 
                 VALUES ('a@a.a', '$hashed_pass', 'admin')";
    
    if ($conn->query($sql_seed) === TRUE) {
        echo "Admin seeded.<br>";
    } else {
        echo "Error seeding admin: " . $conn->error;
    }
}

//article table
$article = "
    CREATE TABLE IF NOT EXISTS articles (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(40) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    );

    INSERT INTO articles
        (title, content)
    VALUES
        ('Test Article 1', 'Does this work'),
        ('Test Article 2', 'I hope it does'),
        ('Test Article 3', 'Please work');
";

if ($conn->query($sql_articles) === TRUE) {
    echo "Table 'articles' created.<br>";
} else {
    die("Error creating articles: " . $conn->error);
}