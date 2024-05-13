<?php

include '../includes/debug.php';

require_once '../includes/db_connection.php';
require_once 'data_to_html.php';

$req = $bdd->prepare('SELECT id, type, title, body FROM ticket');
$req->execute();

$tickets = $req->fetchAll(PDO::FETCH_ASSOC);

ticket_to_html($tickets);
