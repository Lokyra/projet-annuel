<?php

require '../vendor/autoload.php';

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\ApiException;
use Infobip\Model\SmsAdvancedTextualRequest;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;


if (isset($_POST['message']) && !empty($_POST['message'])) {

    $configuration = new Configuration(
        host: 'https://1v88nx.api.infobip.com',
        apiKey: '04aa013e2f502ed68fb8aab5feb7e414-abe513d9-da79-4df8-8c13-86b44c3077a8'
    );

    $api = new SmsApi(config: $configuration);

    $number = '+33782318705';

    $message = $_POST['message'];

    $destination = new SmsDestination(to: $number);

    $sentMessage = new SmsTextualMessage(
        destinations: [$destination],
        text: $message,
        from: "Admin Help"
    );

    $request = new SmsAdvancedTextualRequest([$sentMessage]);

    $response = $api->sendSmsMessage($request);
    header("location: ticketing.php?message=Envoie de l'alerte avec succès !&type=success");
} else {
    header("location: ticketing.php?message=Champ non remplie!!&type=danger");
}