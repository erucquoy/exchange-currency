<?php
error_reporting(E_ALL);
ini_set('display_errors', 'Off');
ini_set('log_errors', 'On');
$db_address = "localhost"; // host de la base de donnée
$db_user = "root"; // utilisateur de la base de donnée
$db_password = ""; // mot de passe de la base de donnée
$db_base = "pcgameso_test1"; // nom de la base de donnée

$pages = array('dashboard','helpd','activity','support','sell','pricing','sold','help-sell','work'); // Page neutre (on les affiches qu'on soit connecté ou non)
//$ano_pages = array('login','register');
$ano_pages = array(); // page où il faut obligatoirement être non connecté.
//$co_pages = array('messages','settings','stats');
$co_pages = array(); // page où il faut obligatoirement être connecté

$card_types = array('paysafecard','ukash'); // Type de carte acceptée, (verification dans la fonction verifType


$money_name = "ExCredit"; // Non des crédits

$starpass_gain = 1; // multiplicateur de gain starpass

/* Gain starpass
Type - Palier - Gain - Cout_Client - Ratio(gain par cout)

== Belgique ==
SMS - Bronze - 0.42 - 1.50 - 0.28
SMS - Silver - 0.60 - 2.00 - 0.30
SMS - Gold A - 1.02 - 3.00 - 0.34
SMS - Gold B - 1.35 - 4.00 - 0.3375
SMS - Plus - 2.50 - 6.00 - 0.4166   // PLUS INTERESSANT
Audiotel - Gold - 0.84 - 1.07 - 0.7850   // PLUS INTERESSANT
Audiotel - Plus A - 1.75 - 2.57 - 0.6809
Audiotel - Plus B - 2.05 - 3.50 - 0.5857
Audiotel - Super A - 3.30 - 6.00 - 0.5500
Audiotel - Super B - 4.60 - 8.50 - 0.5411

== France ==
SMS - Silver A - 0.65 - 1.50 - 0.4333
SMS - Silver B - 0.90 - 2.00 - 0.4500   // PLUS INTERESSANT
SMS - Gold A - 1.30 - 3.00 - 0.4333
SMS - Plus A - 2 - 4.50 - 0.4444
Audiotel - Bronze B - 0.27 - 0.56 - 0.4821
Audiotel - Ultra Speed - 0.82 - 1.36 - 0.6029
Audiotel - Bronze C - 0.87 - 1.45 - 0.6000
Audiotel - Silver A - 0.94 - 1.53 - 0.6143
Audiotel - Silver B - 1.02 - 1.62 - 0.6296
Audiotel - Gold - 1.15 - 1.79 - 0.6424   // PLUS INTERESSANT
Audiotel - Plus - 1.21 - 1.96 - 0.6173
Audiotel - Double Appel - 1.69 - 2.87 - 0.5888


*/

?>