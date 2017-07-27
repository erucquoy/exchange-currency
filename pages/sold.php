<?php
require_once('inc/recaptchalib.php');
  $privatekey = "6Lfs7vcSAAAAAMUWOjHDZ3ER40WPHjyf8Fx3rO0j";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The CAPTCHA wasn't entered correctly. Go back and try it again.");
         //"(CAPTCHA said: " . $resp->error . ")");
  } else {



if($connected && isset($_POST['card']) && isset($_POST['value']) && isset($_POST['type']) && isset($_POST['hidden']))
{
	//var_dump($_POST);
	
    if(verifCard($_POST['card']) && verifValue($_POST['value']) && verifType($_POST['type']))
    {
		$date = time();
        $card = securevar($_POST['card']);
		$value = securevar($_POST['value']);
		$type = strtolower(securevar($_POST['type']));
		$hidden = ($_POST['hidden'] == "on") ? 0 : 1;
    
        $email = "";
        $paypalemail = "";
    
        try
        {
            $bdd = new PDO('mysql:host='.$db_address.';dbname='.$db_base.'', $db_user, $db_password);
        }
	
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    
        $query = $bdd->prepare('SELECT * FROM clients WHERE name = ?');
        $query->bindValue(1,$pseudo);
        $query->execute();
    
        while($data = $query->fetch())
        {
            $email = $data['email'];
            $paypalemail = $data['paypalemail'];
			$client_id = $data['client_id'];
        }
		
		$query = $bdd->prepare('SELECT * FROM pricing WHERE type = ? , basevalue = ?');
		$query->bindValue(1,$type);
		$query->execute();
		
		while ($data = $query->fetch())
		{
			$final_value = (($value) * ($data['ratio']));
			$abr = $data['abr'];
		}
		
		$orderid = generateOrderid(10);
		
		
		
		$query = $bdd->prepare('INSERT INTO orders VALUES("",?,?,?,?,?,?,?,?,?,?,?)'); // client_id, client_name, email, paypal, date, ip
		$query->bindValue(1,$client_id);
		$query->bindValue(2,$pseudo);
		$query->bindValue(3,$email);
		$query->bindValue(4,$paypalemail);
		$query->bindValue(5,$date);
		$query->bindValue(6,$_SERVER['REMOTE_ADDR']);
		$query->bindValue(7,$value);
		$query->bindValue(8,$final_value);
		$query->bindValue(9,$type);
		$query->bindValue(10,$orderid);
		$query->bindValue(11,$card);
		$query->execute();
		
		
		$query = $bdd->prepare('INSERT INTO activity VALUES("",?,?,?,?,?,?,?,?,?)'); // abr, card, client_id, base_value, client_name, final_value, statut, date, hidden
		$query->bindValue(1,$abr);
		$query->bindValue(2,$type);
		$query->bindValue(3,$client_id);
		$query->bindValue(4,$value);
		$query->bindValue(5,$pseudo);
		$query->bindValue(6,$final_value);
		$query->bindValue(7,1);
		$query->bindValue(8,$date);
		$query->bindValue(9,$hidden);
		$query->execute();
		
		$order = '<b style="color:green">Your order is successfuly registered in our database, you will be contacted as soon as possible (max 24h).</b><br /><br />
		<b>Order ID : </b>'.$orderid.'<br />
		<b>Card : </b>'.$type. ' ' .$value.' EUR<br />
		<b>Code : </b>'.$card.'<br />
		<b>Paypal value : </b>'.$final_value.'<br />';
		
		
    }
    else
    {
        echo 'Votre code ou la valeur n\'est pas valide, redirection.<br /><a href="index.php?p=sell">Retour</a>';
        /*
        <script language="javascript">
            document.location.href="index.php?p=sell&err=1"
        </script>
        */
    }


}
elseif((!$connected) && isset($_POST['card']) && isset($_POST['email']) && isset($_POST['paypalemail'])  && isset($_POST['value']) && isset($_POST['type']) && isset($_POST['hidden']))
{
	/*var_dump($_POST);
	var_dump(verifMail($_POST['email']));
	var_dump(is_numeric($_POST['card']));
	var_dump(verifValue($_POST['value']));
	var_dump(verifType($_POST['type']));*/

    if(verifMail($_POST['email']) && verifMail($_POST['paypalemail']) && is_numeric($_POST['card']) && verifValue($_POST['value']) && verifType($_POST['type']))
    {
        $card = securevar($_POST['card']);
		$value = securevar($_POST['value']);
		$type = strtolower(securevar($_POST['type']));
		$hidden = ($_POST['hidden'] == "on") ? 0 : 1;
    
        $email = securevar($_POST['email']);
        $paypalemail = securevar($_POST['paypalemail']);
		
		$client_id = 0;
		$pseudo = 'Anonymous';
    
        try
        {
            $bdd = new PDO('mysql:host='.$db_address.';dbname='.$db_base.'', $db_user, $db_password);
        }
	
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    
		
		$query = $bdd->prepare('SELECT * FROM pricing WHERE type = ? and basevalue = ?');
		$query->bindValue(1,$type);
		$query->bindValue(2,$value);
		$query->execute();
		
		while ($data = $query->fetch())
		{
			$final_value = (($value) * ($data['ratio']));
			$abr = $data['abr'];
		}
		
		$orderid = generateOrderid(10);
		
		$date = time();
		
		$query = $bdd->prepare('INSERT INTO orders VALUES("",?,?,?,?,?,?,?,?,?,?,?)'); // client_id, client_name, email, paypal, date, ip
		$query->bindValue(1,$client_id);
		$query->bindValue(2,$pseudo);
		$query->bindValue(3,$email);
		$query->bindValue(4,$paypalemail);
		$query->bindValue(5,$date);
		$query->bindValue(6,$_SERVER['REMOTE_ADDR']);
		$query->bindValue(7,$value);
		$query->bindValue(8,$final_value);
		$query->bindValue(9,$type);
		$query->bindValue(10,$orderid);
		$query->bindValue(11,$card);
		$query->execute();
		
		
		$query = $bdd->prepare('INSERT INTO activity VALUES("",?,?,?,?,?,?,?,?,?)'); // abr, card, client_id, base_value, client_name, final_value, statut, date, hidden
		$query->bindValue(1,$abr);
		$query->bindValue(2,$type);
		$query->bindValue(3,$client_id);
		$query->bindValue(4,$value);
		$query->bindValue(5,$pseudo);
		$query->bindValue(6,$final_value);
		$query->bindValue(7,1);
		$query->bindValue(8,$date);
		$query->bindValue(9,$hidden);
		$query->execute();
		
		$order = '<b style="color:green">Your order is successfuly registered in our database, you will be contacted as soon as possible (max 24h).</b><br /><br />
		<b>Order ID : </b>'.$orderid.'<br />
		<b>Card : </b>'.$type. ' ' .$value.' EUR <br />
		<b>Code : </b>'.$card.'<br />
		<b>Paypal value : </b>'.$final_value.'<br />';
		
		orderEmail("leclanextazia@gmail.com",$order);
		orderEmail($email,$order);
		
		?>
		<div class="span9">
					<h1>
						Your card has been sent.
					</h1>
					
						<?php echo $order; ?>
					
				</div>
		
		
		
		<?php
	
    }
	
    else
    {
        echo '<div align="center">Invalid informations. Redirect to sell page.<br /><a href="index.php?p=sell">Retour</a></div>';
        /*
        <script language="javascript">
            document.location.href="index.php?p=sell&err=1"
        </script>
        */
    }
}
else
{
        echo '<div align="center">Invalid informations. Redirect to sell page.<br /><a href="index.php?p=sell">Retour</a></div>';
        /*
        <script language="javascript">
            document.location.href="index.php?p=sell&err=1"
        </script>
        */
    
}
}
?>
				
			