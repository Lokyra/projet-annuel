<?php
$servername = "localhost";
$username = "root";
$body = "tictactoe";
$dbname = "tictactoe";


try {
  $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $body);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}