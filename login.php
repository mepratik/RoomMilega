<?php
session_start();
include_once('config.php');
$user = $_POST['user'];
$pass = $_POST['pass'];
$con=new configure();
echo $configure->user;
			try
			{
				$dbh = new PDO("mysql:dbname=$con->dbname;host=$con->host","$con->uname","$con->pass");
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			
			$stmt = $dbh->prepare("SELECT * FROM users WHERE uname = :user AND password = :pass");
			
			$stmt->bindParam(":user",$user);
			$stmt->bindParam(":pass",$pass);
			$stmt->execute();
			
			if($stmt->rowCount() == 1)
			{
				$r=$stmt->fetch();
				$_SESSION['login']=1;
				$_SESSION['uname']=$user;
				$_SESSION['uid']=$r['uid'];
				echo "Login successful. Please wait...";
			}
			else
			{
				echo "Authentication failure. Username or Password doesn't match.";
				session_destroy();
			}
?>