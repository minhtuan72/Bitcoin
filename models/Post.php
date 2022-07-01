<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'user';

    // Post Properties
    public $id;
    public $username;
    public $password;
    public $phone;
    public $email;
    

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'select * from `user`';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    
  }