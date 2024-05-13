<?php

require_once 'data_to_html.php';


ini_set('display_errors', 1);

$s = $_GET['search'];

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

$req = $bdd->prepare('SELECT id, pseudo, email FROM user WHERE pseudo LIKE ?');

$req->execute([
    '%' . $s . '%' 
]);

$users = $req->fetchAll(PDO::FETCH_ASSOC);

users_to_html($users);
