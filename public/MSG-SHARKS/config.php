<?php

class Database {
    private $pdo;
    
    // Constructor: Initializes the database connection
    public function __construct($host='localhost', $dbname='cointra_sharks', $username='cointra_techwiz', $password='msg-nextdevs@', $charset = 'utf8') {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Method to execute a query (INSERT, UPDATE, DELETE, etc.)
    public function execute($sql) {
        try {
            return $this->pdo->exec($sql); // Using exec for non-select queries
        } catch (PDOException $e) {
            die("Execution failed: " . $e->getMessage());
        }
    }

    // Method to fetch a single record (SELECT query)
    public function fetchSingle($sql) {
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetch(); // Fetch a single row
        } catch (PDOException $e) {
            die("Fetching single record failed: " . $e->getMessage());
        }
    }

    // Method to fetch all records (SELECT query)
    public function fetchAll($sql) {
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(); // Fetch all results
        } catch (PDOException $e) {
            die("Fetching all records failed: " . $e->getMessage());
        }
    }

    // Method to get the last inserted ID (after INSERT)
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    // Method to get row count (for SELECT or affected rows for UPDATE/DELETE)
    public function rowCount($sql) {
        try {
            $stmt = $this->pdo->query($sql);
            return $stmt->rowCount(); // Get the affected rows
        } catch (PDOException $e) {
            die("Row count failed: " . $e->getMessage());
        }
    }

    // Close the PDO connection
    public function close() {
        $this->pdo = null;
    }
}

// Example Usage
// Initialize Database Connection
// $db = new Database('localhost', 'mydatabase', 'username', 'password');

// // Execute an INSERT query
// $insertQuery = "INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', '" . password_hash('secret', PASSWORD_BCRYPT) . "')";
// $db->execute($insertQuery);
// echo "Last Inserted ID: " . $db->lastInsertId();

// // Fetch a single record
// $userQuery = "SELECT * FROM users WHERE id = 1";
// $user = $db->fetchSingle($userQuery);
// print_r($user);

// // Fetch all records
// $allUsersQuery = "SELECT * FROM users";
// $allUsers = $db->fetchAll($allUsersQuery);
// print_r($allUsers);

// // Update a record
// $updateQuery = "UPDATE users SET email = 'newemail@example.com' WHERE id = 1";
// $db->execute($updateQuery);

// // Get row count after an update
// echo "Rows affected: " . $db->rowCount("SELECT * FROM users WHERE id = 1");

// // Close the connection
// $db->close();

