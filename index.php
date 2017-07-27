<?php //session_start();
include('inc/config.php');
include('inc/init.php');



if(isset($_SESSION['pseudo']) && $_SESSION['pseudo'] != "Anonymous")
{
	$connected = true;
	$pseudo = $_SESSION['pseudo'];
	if(in_array($pseudo,$admins))
	{
		$_SESSION['admin'] = true;
	}
	else
	{
		$_SESSION['admin'] = false;
	}
}
else
{
	$connected = false;
	$_SESSION['pseudo'] = "Anonymous";
	$pseudo = "Anonymous";
	$_SESSION['admin'] = false;
}

$page = 'dashboard';
if(isset($_GET['p'])) {
    $p = securevar($_GET['p']);
    if($connected && in_array($p, $co_pages)) {
        $page = $p;
    }
    elseif(!$connected && in_array($p, $ano_pages)) {
        $page = $p;
    }
	elseif($_SESSION['admin'] == true && in_array($p, $admin_pages))
	{
		$page = $p;
	}
    elseif(in_array($p, $pages)) {
        $page = $p;
    }
}
?>
<?php
include('inc/head.php');
include('inc/haut.php');
include('inc/visit.php');
?>

<?php
if(file_exists('pages/'.$page.'.php'))
{   
    include('pages/'.$page.'.php');
}
else
{
    echo ' <h1> &nbsp;&nbsp;&nbsp;&nbsp;404 Error</h1>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This page doesn\'t exist.';
}


?>
				
				
				
				
<?php
include('inc/footer.php');
/*
echo $page;
echo '<br />';
echo $p;*/
?>