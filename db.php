<?php 

// function loginCheck($email,$pwd){
//  $pdo=new PDO('mysql:host=localhost;dbname=login;charset=utf8mb4','root','root');
//  $sql='SELECT * FROM user WHERE email="'.$email.'"AND pwd='.$pwd;
//  $stmt=$pdo->query($sql); 
//  var_dump($stmt);
//  return $stmt->fetch(PDO::FETCH_ASSOC);//equal with fetch(2);
// }

function loginCheck2($email,$pwd){
	$servername='localhost';
	$dbname='login';
	$username='root';
	$password='root';
    $pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
 // $sql='SELECT * FROM user WHERE email="'.$email.'"AND pwd='.$pwd;
		try{
		 $stmt=$pdo->prepare("SELECT * FROM user WHERE email= :email AND pwd= :pwd");
		 $stmt->execute(
			array(
				':email'=>$email,
				':pwd'=>md5($pwd)
		    )
		 );
		 return $stmt->fetch(PDO::FETCH_ASSOC);//equal with fetch(2);
		}
	 	catch(PDOexception $e){
		echo "Connection failed: ".$e->getMessage();
		$conn->rollback();

	}

}

// var_dump(loginCheck2('1@gmail.com',1));
//  if(loginCheck('1@gmail.com',1)){
//  	echo 'you';
//  }else{
//  	echo 'meiyou';
//  }

function loginCheck1($id){
	$servername='localhost';
	$dbname='login';
	$username='root';
	$password='root';
    $pdo=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
 // $sql='SELECT * FROM user WHERE email="'.$email.'"AND pwd='.$pwd;
		try{
		 $stmt=$pdo->prepare("SELECT * FROM userInterests WHERE userId= :id");
		 $stmt->execute(
			array(
				':id'=>$id
		    )
		 );
		 return $stmt->fetchAll(PDO::FETCH_ASSOC);//equal with fetch(2);
		}
	 	catch(PDOexception $e){
		echo "Connection failed: ".$e->getMessage();
		$conn->rollback();

	}

}
// print_r(loginCheck1(2));
 ?>