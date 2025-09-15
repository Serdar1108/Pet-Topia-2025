<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body></body>



<?php
 $servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop2";

$conn = mysqli_connect($servername, $username, $password, $dbname);

 
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

 
if(isset($_POST['search'])){
  $search = $_POST['search'];
  $sql = "SELECT * FROM klijenti WHERE ime LIKE '%$search%' OR prezime LIKE '%$search%'";
  $result = mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pretraga klijente</title>
</head>
<body>

  <form method="post">
    <input type="text" name="search" placeholder="Pretrazi klijente po imenu ili prezimenu">
    <button type="submit">Pretrazi</button>
  </form>

  <?php
   
  if(isset($result)){
    while($row = mysqli_fetch_assoc($result)) {
      echo "Ime: " . $row["ime"]. " - Prezime: " . $row["prezime"]. "<br>";
    }
  } else {
    echo "Nema rezultata.";
  }
  ?>

</body>
</html>

<?php
 
$conn->close();
?>





 