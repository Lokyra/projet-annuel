<?php

require_once 'data_to_html.php';
require_once '../includes/db_connection.php';

include '../includes/debug.php';


ini_set('display_errors', 1);

$s = $_GET['search'];



$req = $bdd->prepare('SELECT id, type, title, body FROM ticket WHERE title LIKE ?');

$req->execute([
    '%' . $s . '%' 
]);

$tickets = $req->fetchAll(PDO::FETCH_ASSOC);

ticket_to_html($tickets);
