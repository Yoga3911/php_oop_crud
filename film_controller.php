<?php

class Film
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "sakila", "3306");
    }

    public function getAll()
    {
        $query = "SELECT * FROM film ORDER BY film_id DESC LIMIT 10";

        $result = $this->conn->query($query);

        if ($result->num_rows == 0) {
            die("Tabel kosong");
        }

        return $result;
    }

    public function getById($film_id)
    {
        $query = "SELECT * FROM film WHERE film_id = '$film_id'";

        $result = $this->conn->query($query);

        if ($result->num_rows == 0) {
            die("Tabel kosong");
        }

        $this->conn->close();

        return $result;
    }

    public function insert()
    {
        $title = $_POST["title"];
        $language_id = $_POST["language_id"];

        $query = "INSERT INTO film (title, language_id) VALUES ('$title', '$language_id')";

        $this->conn->query($query);

        $this->conn->close();

        header("location: index.php");
    }

    public function update()
    {
        $film_id = $_POST["film_id"];
        $title = $_POST["title"];
        $language_id = $_POST["language_id"];

        $query = "UPDATE film SET title='$title', language_id='$language_id' WHERE film_id='$film_id'";

        $this->conn->query($query);

        $this->conn->close();

        header("location: index.php");
    }

    public function delete()
    {
        $film_id = $_POST["film_id"];

        $query = "DELETE FROM film WHERE film_id = '$film_id'";

        $this->conn->query($query);

        $this->conn->close();

        header("location: index.php");
    }
}
