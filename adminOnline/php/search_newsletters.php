<?php

require_once 'data_to_html.php';


ini_set('display_errors', 1);

$s = $_GET['search'];

require_once 'db_connection.php';

$req = $bdd->prepare('SELECT id, topic, subject, body FROM newsletter WHERE topic LIKE ?');

$req->execute([
    '%' . $s . '%' 
]);

$newsletters = $req->fetchAll(PDO::FETCH_ASSOC);

newsletter_to_html($newsletters);
