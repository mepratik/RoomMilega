<?php
			include_once('config.php');
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$uname = $_POST['uname'];
			$pass1 = $_POST['pass1'];
			$pass2 = $_POST['pass2'];
			
			if($pass1 !== $pass2)
				die("The passwords don't match. Try again...");
			
			$age = $_POST['age'];
			$mobile = $_POST['mobile'];
			
			if(strlen($mobile) < 10)
				die("The mobile number isn't correct.");
	
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$caddress = $_POST['caddress'];
			$paddress = $_POST['paddress'];
			$occupation = $_POST['occupation'];
			$con=new configure();
			
			try
			{
				$dbh = new PDO("mysql:dbname=$con->dbname;host=$con->host","$con->uname","$con->pass");
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			
			$stmt = $dbh->prepare("INSERT INTO users (f_name,l_name,uname,password,age,email,gender,c_address,p_address,mobile_no,occupation) VALUES(:fname,:lname,:uname,:pass,:age,:email,:gender,:caddress,:paddress,:mobile,:occupation)");
			
			$stmt->bindParam(':fname',$fname);
			$stmt->bindParam(':lname',$lname);
			$stmt->bindParam(':uname',$uname);
			$stmt->bindParam(':pass',$pass1);
			$stmt->bindParam(':age',$age);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':caddress',$caddress);
			$stmt->bindParam(':paddress',$paddress);
			$stmt->bindParam(':mobile',$mobile);
			$stmt->bindParam(':occupation',$occupation);
			$res = $stmt->execute();
			if($res)
			{
				echo "Registeration was successful An activation mail has been sent to $email, kindly check and activate your account.";
			}
			else
			{
				echo "Sorry, registration failed! Please check all the fields and try again.";
			}
?>          