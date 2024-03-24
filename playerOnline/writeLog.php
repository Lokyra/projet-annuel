<?php

function writeLogLine($success, $email)
{
  
    $log = fopen('log.txt', 'a+');

    
    $line = date('Y/m/d - H:i:s') . ' - Tentative de connexion ' . ($success ? 'réussie' : 'échouée') . ' de : ' . $email . "\r";

   
    fputs($log, $line);

   
    fclose($log);
}