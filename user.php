<?php 

require_once './vendor/autoload.php';
$loader = new Twig_Loader_Filesystem('./templates');
$twig = new Twig_Environment($loader);

// $arr=array();
session_start();
echo $twig->render(
	'Assign16.twig', 
	array(
		'id'=>$_SESSION['id'],
		'interests'=>$_SESSION['interests'],
		'N'=>$_SESSION['interests'][0]
	)
);

// session_start();
// echo 'user page<br>';
// echo "Hello".$_SESSION['email'].'<br>';
// if(!$_SESSION['interests'][0]){
// 	// 
// echo "You don't have interests.";
// }else{
// print_r($_SESSION['interests']);
// }
// $Arr=array('shopping','cooking');
// print_r($Arr);
 ?>

