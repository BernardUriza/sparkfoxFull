<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: text/html;charset=utf-8");
use PHPMailer\PHPMailer\PHPMailer;

include 'PHPMailer-master/src/PHPMailer.php';
include 'PHPMailer-master/src/Exception.php';
include 'PHPMailer-master/src/SMTP.php';
echo "a " . test_input("Destinatarios");
$Destinatarios = explode(";", test_input("Destinatarios"));
$Titulo = test_input("Titulo");
$CorreoConfirmacion = test_input("CorreoConfirmacion");
echo "a " . var_dump($Destinatarios);
foreach ($Destinatarios as $key => $Destinatario) {
	echo "$key";
	EnviarCorreo($Destinatario, $Titulo);
}

echo $CorreoConfirmacion . " b";
EnviarCorreoConfirmacion($CorreoConfirmacion, "Confirmation of " . $Titulo . " received.");

function EnviarCorreoConfirmacion($Destinatario, $Titulo) {
	$email = $Destinatario; //'bernarduriza@gmail.com';
	$subject = $Titulo;
	$message = '
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Test Email Sample</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0 " />
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head><body class="em_body" style="margin:0px; padding:0px; color: #000000 background-color: #dddddd;">
<h4>Received mail, confirmation of main data sent:</h4>
<table>
  <tr>
    <th>Field</th>
    <th>Content</th>
  </tr>
';
	$arr = json_decode((string) $_POST["Texto"] . "", true);
	foreach ($arr as $Campo) {
		$message .= "<tr><td>" . $Campo["Dato"] . "</td><td>" . $Campo["Contenido"] . "</td></tr>";
	}
	$message .= '</table>
<h4>Thanks for the message. We will always try and reply to your message within 2 working days. Sparkfox Team</h4>
</body></html>';
	EnviarCorreoAbstracto($email, $subject, $message);
}
function EnviarCorreo($Destinatario, $Titulo) {
	$email = $Destinatario; //'bernarduriza@gmail.com';
	$subject = $Titulo;
	$message = '
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Test Email Sample</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0 " />
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head><body class="em_body" style="margin:0px; padding:0px; color: #000000 background-color: #dddddd;">
<h2>Main data.</h2>

<table>
  <tr>
    <th>Field</th>
    <th>Content</th>
  </tr>
';
	$arr = json_decode((string) $_POST["Texto"] . "", true);
	foreach ($arr as $Campo) {
		$message .= "<tr><td>" . $Campo["Dato"] . "</td><td>" . $Campo["Contenido"] . "</td></tr>";
	}
	$message .= '</table> </body></html>';
	EnviarCorreoAbstracto($email, $subject, $message);
}
function EnviarCorreoAbstracto($email, $subject, $message) {
	$mail = new PHPMailer(true);
	$mail->isSMTP(); // Set mailer to use SMTP
	$mail->Host = 'smtp.dreamhost.com'; // Specify main and backup SMTP servers
	$mail->SMTPAuth = true; // Enable SMTP authentication
	$mail->Username = 'contact@sparkfox.cn'; // SMTP username
	$mail->Password = 'VbGyL^eb'; // SMTP password
	//$mail->SMTPSecure = 'tls'; // Enable TLS encryption, "ssl" also accepted+ç
	$mail->SMTPSecure = false;
	$mail->SMTPAutoTLS = false;
	$mail->Port = 587; // TCP port to connect to

	$mail->setFrom('contact@dragonslay.zone', $subject);
	$mail->addAddress($email);
	$mail->isHTML(true);
	$mail->Subject = ($subject);
	$mail->Body = $message;
	$mail->CharSet = 'UTF-8';
	if ($mail->send()) {
		echo "Mail to $email sent!";
	} else {
		echo "Mail to $email failed!";
	}
}
function test_input($data1) {
	$data = isset($_POST[$data1]) ? $_POST[$data1] : (isset($_GET[$data1]) ? $_GET[$data1] : "");
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>