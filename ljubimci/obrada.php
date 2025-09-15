<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop2";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die("Neuspešna konekcija: " . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $ime = mysqli_real_escape_string($conn, $_POST['ime']);
    $prezime = mysqli_real_escape_string($conn, $_POST['prezime']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    
    $sql = "INSERT INTO klijenti (ime, prezime, email) VALUES ('$ime', '$prezime', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "Podaci su uspešno upisani!";
    } else {
        echo "Greška: " . $sql . "<br>" . mysqli_error($conn);
    }
}


mysqli_close($conn);
 
