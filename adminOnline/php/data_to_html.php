<?php
function users_to_html($users) {

    foreach($users as $user) {
        echo "
        <tr>
        <td class='table-cell'>" . $user["id"] . "</td>
        <td class='table-cell'>" . $user["pseudo"] . "</td>
        <td class='table-cell'>Win: 10, Loss: 5</td>
        <td class='table-cell'>" . $user["email"] . "</td>
        <td class='table-cell'>2024-02-25 08:00 AM</td>
        <td>
        <a href='up_user.php?id=" . $user["id"] . "' class='btn btn-primary btn-sm'>Modifier</a>
        <a href='avert.php?id=" . $user["id"] . "' class='btn btn-warning btn-sm'>Avertir</a>
        <a href='del_user.php?id=" . $user["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a>
        </td>
        </tr>";
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
                <a href='del_newsletter.php?id=" . $newsletter["id"] . "' class='btn btn-danger btn-sm mt-1'>Supprimer</a>
            </td>
        </tr>";
        
    }
}