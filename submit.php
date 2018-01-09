<?php
/*
 * Send the form to an email address
 */

$recipient = 'pejril@graphico.cz';
$sender = 'test@pivovarferdinand.cz';

header("Access-Control-Allow-Origin: *");

try
{
//	if ( ! isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'))
//	{
//		throw new ErrorException('Forbidden', 403);
//	}

	if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
	{
		throw new ErrorException('Method Not Allowed (please use POST)', 405);
	}

	$data = unserialize(base64_decode($_POST['_data']));
	$_POST = unserialize(base64_decode($_POST['_post']));

	ob_start();
	
	$cislo_objednavky = 1 + (int) 
	file_get_contents('cpo/cpo.txt');

	require 'tabulka.php';

	$body = ob_get_contents();
	ob_end_clean();

	require 'phpmailer/class.phpmailer.php';

	$mail = new PHPMailer(TRUE);

	$mail->CharSet = 'utf-8';

	$mail->AddAddress($recipient);
	$mail->SetFrom($sender, 'Ferda domů');
	$mail->AddReplyTo($sender);
	$mail->AddCC($_POST['email']);
	$mail->AddCC('ferdadomu@gmail.com');

$mail->Subject = ('Přijetí objednávky Ferda domů č.'.$cislo_objednavky);
	$mail->MsgHTML('<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style type="text/css">th {background-color: #060;color: #FFF;font-size:18px;} table, td, th {border: 1px solid #CCC;border-collapse:collapse;} #vysledek {font-weight:bold;background-color:#CCC;display:block;color:#FFFFFF;}</style></head><h2>'.'POTVRZENÍ OBJEDNÁVKY'.'</h2>'.'<p>'.'Vážený zákazníku,<br /><br />'.'FERDA DOMŮ tímto potvrzuje přijetí Vaší objednávky č.'.$cislo_objednavky.'.<br /><br />'.'Přehled objednaného zboží a Vámi zadané doručovací údaje jsou uvedeny níže.<br /><br />'.'V případě, že v tomto přehledu naleznete nesrovnalosti, stačí odpovědět na tento e-mail.'.$body.'</p>');

	$mail->Send();
	file_put_contents('cpo/cpo.txt', $cislo_objednavky);
}
catch (Exception $e)
{
	header('HTTP/1.0 '.$e->getCode().' '.$e->getMessage());

	echo '<h1>'.($e->getMessage().' (#'.$e->getCode().')').'</h1>';

	exit;
}
