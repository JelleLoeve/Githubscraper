<?php

// includes
require 'inc/bladeconfigure.php';
require 'inc/functions.php';
require 'inc/connection.php';

try {
	if ( isset ($_POST['submit']))	{

	$naam = $_POST["naam"];
	$diagramlink = $_POST["diagramlink"];
	$error = false;

	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$diagramlink)) 
	{
  		echo "<script type= 'text/javascript'>alert('Voeg een geldige githublink!');</script>";
  		$error = true;
	}

	if ( empty($naam) && !empty($diagramlink) )
	{
		echo "<script type= 'text/javascript'>alert('Voeg een naam toe!');</script>";
		$error = true;
	}
	if ( empty($diagramlink) && !empty($naam) )
	{
		echo "<script type= 'text/javascript'>alert('Voeg een diagramlink toe!');</script>";
		$error = true;
	}

	if ( empty($diagramlink) && empty($naam) )
	{
		echo "<script type= 'text/javascript'>alert('Voeg een naam en een diagramlink toe!');</script>";
		$error = true;
	}


		if ( $error == false )
		{
			$sql = "INSERT INTO githubaccounts (naam, diagramlink)
			VALUES ('".$_POST["naam"]."','".$_POST["diagramlink"]."')";
			if ($db->query($sql)) 
			{
				echo "<script type= 'text/javascript'>alert('Account toegevoegd!');</script>";
			}
			else
			{
				echo "<script type= 'text/javascript'>alert('Error: data niet ingevult!.');</script>";
			}
		}
	}
	$db = null;
}

	catch(PDOException $e)
	{
		echo $e->getMessage();
	}


echo $blade->view()->make('addaccounts')->with('html')->render();

?>