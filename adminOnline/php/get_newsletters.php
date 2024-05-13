<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../includes/db_connection.php';
require_once 'data_to_html.php';

$req = $bdd->prepare('SELECT id, topic, subject, body FROM newsletter');
$res = $req->execute();


$newsletters = $req->fetchAll(PDO::FETCH_ASSOC);

newsletter_to_html($newsletters);
