<?php 
function logincheck($email,$pwd){
	$servername='localhost';
	$dbname='checkuser';
	$username='root';
	$password='root';
	try{
		$conn=new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		$sql2="SELECT * FROM userinfo WHERE email=:email";
		$sql1='SELECT * FROM userinfo WHERE email=:email AND pwd=:pwd';
		$statement=$conn->prepare($sql2);
		// var_dump($statement);
		$statement->execute(
			array(
				':email'=>$email
			)
		);
		$res=$statement->fetchAll();
		if($res){
			$stmt=$conn->prepare($sql1);	
			$stmt->execute(
				array(
					':email'=>$email,
					':pwd'=>$pwd
				)
			);
			$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
			if($result){
				return "Your information are correct -_^";
			}else{
				return "Your information are wrong T_T";
			}

		}else{
			return "Your haven't registered yet @_@";
		}
		
	}

	catch(PDOexception $e){
		echo "Connection failed: ".$e->getMessage();
		$conn->rollback();

	}
}
print_r(logincheck('3@gmail.com',3).'<br>');
print_r(logincheck('1@gmail.com',3).'<br>');
print_r(logincheck('alalla@gmail.com',3).'<br>');

 ?>