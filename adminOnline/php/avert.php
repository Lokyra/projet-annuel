<?php

include 'email.php';

$servername = "localhost";
$username = "root";
$password = "tictactoe";
$dbname = "tictactoe";


try {
  $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$req = $bdd->prepare("SELECT pseudo, email FROM user");
$req->execute();


$logFile = 'newsletter.log.txt';

while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
    $result = sendNewsEmail($row['email']);
    $password = date('Y-m-d H:i:s') . ' - ' . ($result ? 'Email sent successfully to ' : 'Failed to send email to ') . $row['email'] . PHP_EOL;
    file_put_contents($logFile, $password, FILE_APPEND);
    header('location: admin.php?message=Newsletter envoyée avec succès !');
}
