<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="15">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MONITORAMENTO</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php

	$servidores = [
		"SITE" => "dominos.com.br",
		"MODEM" => "192.168.1.254",
		"CALLCENTER-01" => "192.168.1.3",
		"CALLCENTER-02" => "192.168.1.4",
		"CALLCENTER-03" => "192.168.1.5",
		
		
	];

?>
<div class="center">
	<h1>MONITORAMENTO</h1>

	<div class="cards">

	<?php
	foreach($servidores as $servidor => $ip)
	{
		// $retorno = shell_exec("C:\Windows\system32\ping -n 1 $ip"); - Este codigo não funciona em servidor compartilhado por questões de segurança.
		$retorno = @fsockopen($ip,80,$errCode,$errStr,2);
		
		// if (preg_match("/tempo</", $retorno) || preg_match("/tempo=/", $retorno))  - Este codigo não funciona em servidor compartilhado por questões de segurança.
		if ($retorno)
		{
			$status = "online";
		} else {
			$status = "offline";
		}
	?>
		<div class="card <?=$status?>">
			<div class="servidor"><?=$servidor?></div>
			<div class="ip"><?=$ip?></div>
			<div class="status"><?=$status?></div>
		</div>

	<?php
	}
	?>

	</div>

</div>
</body>
</html>
