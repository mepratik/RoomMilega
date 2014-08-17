<?php
include_once('config.php');
$con= new configure();
			try
			{
				$dbh = new PDO("mysql:dbname=$con->dbname;host=$con->host","$con->uname","$con->pass");
			}
			catch(PDOException $e)
			{
				echo $e->getMessage();
			}
			


	
		$stmt1 = $dbh->prepare("SELECT rid, uid, location, state, city, accomodation_type, rent, available_for FROM room_details WHERE uid = :userid");
			$stmt1->bindParam(":userid",$_SESSION['uid']);
			$stmt1->execute();
			$r=$stmt1->fetch();
	print <<<END
	<div id="myaccomodationbox">
			<h2 style="text-align:right">My Accomodation</h2> <br/>
			<div class='resultitem' id=rs{$r['rid']}>
				<table>
				<tr>
				<td>Location : </td><td>{$r['location']}</td>
				</tr>
				<tr>
				<td>Type : </td><td>{$r['accomodation_type']}</td>
				</tr>
				<tr>
				<td>Rent : </td><td>{$r['rent']}</td>
				</tr>
				</table>
			</div>
	</div>	
END;
			

?>