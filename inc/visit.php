<?php
    
	$ip = $_SERVER['REMOTE_ADDR'];
	
	try
	{
		$bdd = new PDO('mysql:host='.$db_address.';dbname='.$db_base.'', $db_user, $db_password);
	}
	
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	$query = $bdd->prepare("SELECT ip FROM visitors WHERE ip = ? ");
	$query->bindValue(1,$ip);
	$query->execute();
    // On cherche si l'ip s'est déjà co au site.

    
    // Si l'ip a deja visité le site on s'en squette
	if($query->rowCount() > 0)
	{
        
	}
	else
	{
        
        // Si l'ip n'a pas encore visité le site on la rajoute a la bdd.

		$query = $bdd->prepare('INSERT INTO visitors VALUES("", ? , ? )');
		$query->bindValue(1,$ip);
        $query->bindValue(2,time());
		$query->execute();

        
	}

?>