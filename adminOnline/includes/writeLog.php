<?php

function writeSendLog($success, $email)
{
  
    $log = fopen('../log.txt', 'a+');

    
    $line = date('Y/m/d - H:i:s') . " - Tentative d'envoie de mail " . ($success ? 'réussie' : 'échouée') . ' à : ' . $email . "\r";

   
    fputs($log, $line);


    fclose($log);
}