<?php

function securevar($var)
{
	$var = htmlspecialchars($var);
	$var = stripslashes($var);
	$var = htmlentities($var);
	//$var = mysqli_real_escape_string($var);
	$var = str_replace("#","", $var);
	$var = str_replace("--","",$var);
	
	return $var;
}


function verifMail ($email)
{
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $email))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function verifType($type)
{
	global $card_types;
	if(in_array($type, $card_types))
	{
		return true;
	}
	else
	{
		return false;
	}
}

function verifCard ($card)
{
    if(preg_match('`^[0-9]$`', $_POST['card']))
    {
        return true;
    }
    else
    {
        return false;
    }
}

function verifValue ($value)
{
    switch($value) {
		case 5:
			return true;
			break;
		case 10:
			return true;
			break;
		case 25:
			return true;
			break;
		case 50:
			return true;
			break;
		case 100:
			return true;
			break;
		default:
			return false;
	}
	
}

function orderEmail($email,$order)
{

	$mail = $email; // Déclaration de l'adresse de destination.
	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
	{
		$passage_ligne = "\r\n";
	}
	else
	{
		$passage_ligne = "\n";
	}
	//=====Déclaration des messages au format texte et au format HTML.
	$message_txt = "Your order exchange-currency.pw (see html for details)";
	$message_html = "<html><head></head><body><b>Customer</b>, Your order is registered. <br />$order</body></html>";
	//==========
	 
	//=====Création de la boundary
	$boundary = "-----=".md5(rand());
	//==========
	 
	//=====Définition du sujet.
	$sujet = "Your order on exchange-currency.pw";
	//=========
	 
	//=====Création du header de l'e-mail.
	$header = "From: \"Exchange-Currency\"<contact@exchange-currency.pw>".$passage_ligne;
	$header.= "Reply-to: \"Exchange-Currency\" <contact@exchange-currency.pw>".$passage_ligne;
	$header.= "MIME-Version: 1.0".$passage_ligne;
	$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
	//==========
	 
	//=====Création du message.
	$message = $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format texte.
	$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_txt.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary.$passage_ligne;
	//=====Ajout du message au format HTML
	$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
	$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
	$message.= $passage_ligne.$message_html.$passage_ligne;
	//==========
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
	//==========
 
	//=====Envoi de l'e-mail.
	mail($mail,$sujet,$message,$header);
	//==========




}

function generateOrderid( $length = 8 ) 
{
	$chars = "AZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
	//$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$password = substr( str_shuffle( $chars ), 0, $length );
	return $password;
}

function generateString( $length = 8 ) 
{
	$chars = "azertyuiopqsdfghjklmwxcvbn-AZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
	//$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
	$password = substr( str_shuffle( $chars ), 0, $length );
	return $password;
}



?>