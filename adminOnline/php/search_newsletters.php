<?php

require_once 'data_to_html.php';
require_once '../includes/db_connection.php';

include '../includes/debug.php';


ini_set('display_errors', 1);

$s = $_GET['search'];



$req = $bdd->prepare('SELECT id, topic, subject, body FROM newsletter WHERE topic LIKE ?');

$req->execute([
    '%' . $s . '%' 
]);

$newsletters = $req->fetchAll(PDO::FETCH_ASSOC);

newsletter_to_html($newsletters);
