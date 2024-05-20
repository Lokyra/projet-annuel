<?php
function users_to_html($users) {

    foreach($users as $user) {
        echo "
        <tr>
        <td class='table-cell'>" . $user["id"] . "</td>
        <td class='table-cell'>" . $user["pseudo"] . "</td>
        <td class='table-cell'>Win: 10, Loss: 5</td>
        <td class='table-cell'>" . $user["email"] . "</td>
       
        <td class='table-cell'>" . $user["is_sub"] . "</td>
        <td class='table-cell'>" . $user["last_connection"] . "</td>
        <td>
        <a href='up_user.php?id=" . $user["id"] . "' class='btn btn-primary btn-sm'>Modifier</a>
        ";

        if ($user['is_ban'] == 0) {
            echo "
                <a href='add_ban.php?id=" . $user["id"] . "' class='btn btn-warning btn-sm'>Bannir</a>
            ";
        } else {
            echo "
                <a href='revoke_ban.php?id=" . $user["id"] . "' class='btn btn-info btn-sm'>Révoquer</a>
            ";
        }
        echo "
            <a href='del_user.php?id=" . $user["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a>
            </td>
        </tr>
        ";
    }
}

function captchas_to_html($captchas) {
    foreach($captchas as $captcha) {
        echo "
        <tr>
        <td class='table-cell'>" . $captcha["id"] . "</td>
        <td class='table-cell'>" . $captcha["question"] . "</td>
        <td class='table-cell'>" . $captcha["answer"] . "</td>
        <td>
        <a href='up_captcha.php?id=" . $captcha['id'] . "' class='btn btn-primary btn-sm'>Modifier</a>
        <a href='del_captcha.php?id=" . $captcha['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a>
        </td>
        
    </tr>";
    }
}


function newsletter_to_html($newsletters) {
    foreach($newsletters as $newsletter) {
        echo "
        <tr>
            <td class='table-cell'>" . $newsletter["id"] . "</td>
            <td class='table-cell'>" . $newsletter["topic"] . "</td>
            <td class='table-cell'>" . $newsletter["subject"] . "</td>
            <td class='table-cell'>" . $newsletter["body"] . "</td>
            <td>
                <a href='send_newsletter.php?id=" . $newsletter["id"] . "' class='btn btn-primary btn-sm'>Envoyer</a>
                <a href='up_newsletter.php?id=" . $newsletter["id"] . "' class='btn btn-primary btn-sm'>Modifier</a>
                <a href='see_newsletter.php?id=" . $newsletter["id"] . "' class='btn btn-primary btn-sm'>Voir contenu</a>
                <a href='del_newsletter.php?id=" . $newsletter['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a>
            </td>
        </tr>";
        
    }
}

function ticket_to_html($tickets) {
    
    foreach ($tickets as $ticket) {

        if ($ticket['type'] == "info") {
            $description = "Information";
        } elseif ($ticket['type'] == "warning") {
            $description = "Incident";
        } else {
            $description = "Problème";
        }

        echo "
        <div class='card text-white bg-" . $ticket["type"] . " mb-3 ms-3' style='max-width: 18rem;'>
            <div class='card-header'>" . $description . "</div>
            <div class='card-body'>
                <h5 class='card-title'>" . $ticket["title"] . "</h5>
                <p class='card-text'>" . $ticket["body"] . "</p>
            </div>
            <div class='d-flex'>
                <a href='del_ticket.php?id=" . $ticket["id"] . "' class='btn btn-danger btn-sm me-auto w-50'>Supprimer</a>
                <a href='up_ticket.php?id=" . $ticket["id"] . "' class='btn btn-primary btn-sm w-50'>Modifier</a>
            </div>
        </div>
        ";
    }
}
        