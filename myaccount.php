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
			
			$stmt->bindParam(":user",$_SESSION['uname']);
			
			$stmt->execute();
	
			$row=$stmt->fetch();
			
			$fname = $row['f_name'];
			$lname = $row['l_name'];
			$uname = $row['uname'];
			$pass = $row['password'];
			$age = $row['age'];
			$mobile = $row['mobile_no'];
			$email = $row['email'];
			$gender = $row['gender'];
			$caddress = $row['c_address'];
			$paddress = $row['p_address'];
			$occupation = $row['occupation'];
			
			print <<<END
			
			<div id="myaccountbox">
			<h2 style="text-align:right">My Account</h2> <br/>
			<form>
			<table>
				<tr><td>Name : </td><td><input type="text" name="fname lname" value="$fname $lname" /></td></tr>
				<tr><td>Username : </td><td><input type="text" name="uname" value="$uname" /</td></tr>
				<tr><td>Password : </td><td><input type="password" name="pass" value="$pass" /</td></tr>
				<tr><td>Age : </td><td><input type="number" name="age" value="$age" /</td></tr>
				<tr><td>Mobile : </td><td><input type="text" name="mobile" value="$mobile" /</td></tr>
				<tr><td>Email : </td><td><input type="email" name="email" value="$email" /</td></tr>
				<tr><td>Gender : </td><td><input type="text" name="gender" value="$gender" /</td></tr>
				<tr><td>Current Address : </td><td><input type="text" name="caddress" value="$caddress" /</td></tr>
				<tr><td>Permanent Address : </td><td><input type="text" name="paddress" value="$paddress" /</td></tr>
				<tr><td>occupation : </td><td><input type="text" name="occupation" value="$occupation" /</td></tr>
			</table>
			<input type="button" value="Save Changes" id="savechange" class="button" style="width:100px;margin-top:30px;position:relative;left:200px;"/>
			</form>
			</div>
END;
?>