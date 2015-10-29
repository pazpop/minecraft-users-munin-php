#!/usr/bin/php
<?php
// Munin plugin for monitoring number of players connected to Minecraft
// Written by pazpop and grobux for http://demineurs.fr/
//
// Prerequisite : MinecraftServerStatus.class.php (https://github.com/NoxNebula/Minecraft-Server-Status)
// Compatible and tested with : Minecraft Spigot 1.8.3
//
// First release : (v0.1) 2015-10-29
// Last release :

// Configuration
$ip_host = '127.0.0.1';
$mc_port = '25565';
$path_class = '/usr/share/munin/plugins/MinecraftServerStatus.class.php';

// Main script
if(count($argv) == 2 && $argv[1] == 'config')
	{
		echo "graph_title Minecraft Users\n";
		echo "graph_vlabel Users\n";
		echo "users.label Users\n";
		echo "users.type GAUGE\n";
		echo "graph_category Minecraft\n";
		echo "graph_info Number of players connected to Minecraft\n";
		exit();
	}

	require_once($path_class);
	$mc = new MinecraftServerStatus($ip_host, $mc_port);
	echo "users.value ";
	echo $mc->Get('numplayers')."\n";
	exit;

?>
