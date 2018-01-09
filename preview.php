<?php
/*
 * Parse submitted form and fill the template with previewed data
 */

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

	$data = array();

	foreach ($_POST as $key => $value)
	{
		if (stripos($key, 'count') === FALSE)
		{
			continue;
		}

		$number = substr($key, strripos($key, '_') + 1);

		$data[$number] = array(
			'name' => $_POST['name_'.$number],
			'count' => (int) $_POST['count_'.$number],
			'total' => (int) $_POST['vysledek_'.$number], // in CZK
		);

if(isset($_POST['mixik1']))
{
    $m41 = $_POST['mixik1'] .' <br /> ';
}

if(isset($_POST['mixik2']))
{
    $m42 = $_POST['mixik2'] .' <br /> ';
}
if(isset($_POST['mixik3']))
{
    $m43 = $_POST['mixik3'] .' <br /> ';
}
if(isset($_POST['mixik4']))
{
    $m44 = $_POST['mixik4'] .' <br /> ';
}
if(isset($_POST['mixik5']))
{
    $m45 = $_POST['mixik5'] .' <br /> ';
}
		// Basa MIX 20x 0,5l, user's choice for Mix 4
		if ($number == 11)
		{
			$data[$number]['name'] .= ' (10x 12° sv.) '.' + '.' <br /> '.$m41.$m42.$m43.$m44.$m45;
		}
	}

	require 'sumarizace.php';
}
catch (Exception $e)
{
	header('HTTP/1.0 '.$e->getCode().' '.$e->getMessage());

	echo '<h1>'.($e->getMessage().' (#'.$e->getCode().')').'</h1>';

	exit;
}
