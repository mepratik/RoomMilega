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
			
			$fname = $_POST['f_name'];
			$lname = $_POST['l_name'];
			$uname = $_POST['uname'];
			$pass = $_POST['password'];
			$age = $_POST['age'];
			$mobile = $_POST['mobile_no'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$caddress = $_POST['c_address'];
			$paddress = $_POST['p_address'];
			$occupation = $_POST['occupation'];
			
			$stmt = $dbh->prepare("UPDATE users SET f_name= :fname, l_name= :lname, c_address= :caddress, mobile_no= :mobile, occupation= :occ, uname= :uname, password= :pass, age= :age, eamil= :email, p_address= :paddress, gender= :gender");
			
			$stmt->bindParam(':fname',$fname);
			$stmt->bindParam(':lname',$lname);
			$stmt->bindParam(':uname',$uname);
			$stmt->bindParam(':pass',$pass);
			$stmt->bindParam(':age',$age);
			$stmt->bindParam(':email',$email);
			$stmt->bindParam(':gender',$gender);
			$stmt->bindParam(':caddress',$caddress);
			$stmt->bindParam(':paddress',$paddress);
			$stmt->bindParam(':mobile',$mobile);
			$stmt->bindParam(':occ',$occupation);
			$res = $stmt->execute();
			
			if($res)
			{
				echo "Details have been successfully updated!";
			}
			else
			{
				echo "Sorry, problem updating details. Please check the details you have entered!";
		    }
			
?>