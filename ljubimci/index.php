<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Petshop</h1>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Pocetna</a></li>
            <li><a href="onama.html">O nama</a></li>
            <li><a href="ponude.html">Ponude</a></li>
            <li><a href="kontakt.html">Kontakt</a></li>
            <li><a href="search.php">Pretraga korisnika</a></li>
        </ul>
    </nav>

    <main>
        <h3>Ko smo mi</h3>
        <p>Vaš ljubimac zaslužuje najbolje, a mi smo tu da vam pomognemo da mu to i obezbedite. U našem Petshop-u, možete pronaći sve što vam je potrebno za zdrav i srećan život vašeg ljubimca. Od hrane i igračaka do veterinarskih usluga, kod nas ćete naći sve na jednom mestu. Posetite nas i uverite se u našu raznovrsnu ponudu!</p>
    </main>

    

    <img src="slike/dog.gif">

 <div class="marquee">
        <marquee behavior="scroll" direction="left">
            <?php
            $marquee_tekst = "Dobrodošli u naš Petshop! Ovdje pronađite sve za svoje ljubimce.";
            echo $marquee_tekst;
            ?>
        </marquee>
    </div>




    
    <main class="glavni">
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';

        switch ($page) {
            case 'home':
                echo '<section id="home">';
                echo '<h1>Dobrodošli u naš Petshop!</h1>';
                echo '<img src="slike/pet shop1.jpg" alt="Pet Shop" width="600" height="400">';
                echo '<p>Dobrodošli u naš Petshop, gde možete pronaći sve što vam je potrebno za vaše ljubimce.</p>';
                echo '</section>';
                break;

            default:
                echo '<section id="home">';
                echo '<h1>Dobrodošli u naš Petshop!</h1>';
                echo '<img src="slike/pet shop1.jpg" alt="Pet Shop" width="600" height="400">';
                echo '<p>Dobrodošli u naš Petshop, gde možete pronaći sve što vam je potrebno za vaše ljubimce.</p>';
                echo '</section>';
                break;
        }
        ?>
        <iframe width="420" height="345" src="https://www.youtube.com/embed/JrwAhWDexRM?si=AIyITl4tPPRor8-K" frameborder="0" allowfullscreen></iframe>
    </main>

    <footer class="podnozje">
        <p>&copy; 2024 Petshop</p>
        <?php echo "<p id='datum'>Trenutni datum: " . date("d.m.Y.") . "</p>"; ?>
        <?php
        $brojac_datoteke = 'brojac.txt';

        $broj_poseta = 0;
        if (file_exists($brojac_datoteke)) {
            $broj_poseta = intval(file_get_contents($brojac_datoteke));
        }

        $broj_poseta++;
        file_put_contents($brojac_datoteke, $broj_poseta);
        echo "Broj poseta: " . $broj_poseta;
        ?>
    </footer>

</body>
</html>



<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "petshop2";

 
$conn = mysqli_connect($servername, $username, $password, $dbname);

 
if (!$conn) {
  die("Neuspešna konekcija: " . mysqli_connect_error());
}

 
$sql = "SELECT * FROM pets";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Podaci o ljubimcima</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

  <h2>Podaci o ljubimcima</h2>

  <table>
    <tr>
      <th>ID</th>
      <th>Ime</th>
      <th>Vrsta</th>
      <th>Starost</th>
    </tr>
    <?php
    if ($result) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["type"] . "</td>";
        echo "<td>" . $row["age"] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='4'>Nema podataka o ljubimcima.</td></tr>";
    }
    ?>
  </table>

</body>
</html>

<label?php
 
mysqli_close($conn);
?>


 
 
    <title>Formular za popunjavanje</title>
    <link rel="stylesheet" href="style.css">  
</head>
<body>
    <form action="obrada.php" method="POST">
        <label for="name">Ime:</label>
        <input type="text" id="name" name="ime" required>
        <br>

        <label for="prezime">Prezime:</label>
        <input type="text" id="prezime" name="prezime" required>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>

        <button type="submit">Pošalji</button>

       
    </form>

 

</body>
</html>
 
 
<?php
 
 
error_reporting(E_ALL);
ini_set('display_errors', 1);

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
        echo "Poslato!";
    } else {
        echo "Greška u SQL upitu: " . $sql . "<br>";
        echo "Greška: " . mysqli_error($conn);
    }
}


mysqli_close($conn);
 
?>



 