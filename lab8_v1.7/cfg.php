<?php
function dbConnect(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "moja_strona";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
    }

    return $conn;
}
