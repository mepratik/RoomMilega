<?php
	session_start();
	include_once('config.php');
	$con=new configure();
			try
			{
				$dbh = new PDO("mysql:dbname=$con->dbname;host=$con->host","$con->uname","$con->pass");
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			$stmt = $dbh->prepare("SELECT * FROM users WHERE uname = :user");
			$stmt->bindParam(":user",$_SESSION['uname']) or die("Cant bind". mysql_error());
			$stmt->execute() or die("Cant execute". mysql_error());;
			$row=$stmt->fetch() or die("Cant fetch". mysql_error());
			echo $row['uid'] or die("Cant echo". mysql_error());
			?>