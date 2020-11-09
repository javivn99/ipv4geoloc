<?php

require_once 'vendor/autoload.php';
use Foolz\Inet\Inet;
use ipinfo\ipinfo\IPinfo;

$client = new IPinfo();


echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Conversor de IP</title>
</head>
<body>
    <form action='index.php'>
        <input type='text' name='num' placeholder='Introduce un nº de diez cifras' required size=30><br><br>
        <button type='name' name='calcular'>Calcular</button>
    </form>";

    if (isset($_REQUEST['calcular'])) {
        $decimal_ip=htmlspecialchars($_REQUEST['num']);
        $ip = Inet::dtop($decimal_ip);
        $details = $client->getDetails($ip);
        echo"
            <ul>
                <li>Ip: ".$details->ip."</li>
                <li>Ciudad: ".$details->city."</li>
                <li>Region: ".$details->region."</li>
                <li>Pais: ".$details->country."</li>
                <li>Loc: ".$details->loc."</li>
                <li>Postal: ".$details->postal."</li>
                <li>Timezone: ".$details->timezone."</li>
            </ul>

        ";
    };
echo "
</body>
</html>
";



