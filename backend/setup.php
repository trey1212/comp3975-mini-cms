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

if ($conn->query($user) === TRUE) {
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
$create_article_table = "CREATE TABLE IF NOT EXISTS articles (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(100) NOT NULL,
        content TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    )";

if ($conn->query($create_article_table) === TRUE) {
    echo "Table 'articles' created.<br>";
} else {
    die("Error creating articles table: " . $conn->error);
}

//Check if articles exist before inserting (to avoid duplicates every refresh)
$check_articles = $conn->query("SELECT count(*) as count FROM articles");
$row = $check_articles->fetch_assoc();

if ($row['count'] == 0) {
    $insert_articles = "INSERT INTO articles (title, content) VALUES
        ('Test Article 1', 'Does this work'),
        ('Test Article 2', 'I hope it does'),
        ('Test Article 3', 'Please work')";

    if ($conn->query($insert_articles) === TRUE) {
        echo "Articles seeded.<br>";
    } else {
        die("Error seeding articles: " . $conn->error);
    }
}