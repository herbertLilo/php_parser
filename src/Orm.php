<?php

class Orm {
    private $pdo;

    public function __construct($host, $dbname, $user, $pass) {
        try {
            // Update the DSN to use localhost
            $this->pdo = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function insert($table, $data) {
        $keys = implode(",", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->pdo->prepare("INSERT INTO $table ($keys) VALUES ($placeholders)");
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function update($table, $data, $condition) {
        $set = "";
        foreach ($data as $key => $value) {
            $set .= "$key = :$key, ";
        }
        $set = rtrim($set, ", ");
        $stmt = $this->pdo->prepare("UPDATE $table SET $set WHERE $condition");
        return $stmt->execute($data);
    }

    public function delete($table, $condition) {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE $condition");
        return $stmt->execute();
    }
}
