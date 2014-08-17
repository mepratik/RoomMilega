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
			
			
	echo "<h2>Search Results : </h2><br/>";
	$query = $_GET['query'];
	$tags = explode(" ",$query);
	
	$stmt = $dbh->prepare("SELECT rid, uid, location, state, city, accomodation_type, rent, available_for FROM room_details WHERE (is_available = 1 AND accomodation_type LIKE :type AND (location LIKE :location  OR city LIKE :city OR state LIKE :state))");
	
	$type = $_GET['type'];
	if($type=='all')
		$type='%%';
	else
		$type = "%".$type."%";
	$stmt->bindParam(":type",$type);
	$c=0;
	
	foreach ($tags as $tag)
	{
			$location="%".$tag."%";
			$city="%".$tag."%";
			$state="%".$tag."%";

			$stmt->bindParam(":location",$location);
			$stmt->bindParam(":city",$city);
			$stmt->bindParam(":state",$state);
			
			$stmt->execute();
			$count=$stmt->rowCount();
			for($i=0;$i<$count;$i++)
			{
				$r=$stmt->fetch();
				$flag=0;
				for($j=0;$j<$c;$j++)
				{	
					if($list[$j] == $r['rid'])
						$flag=1;
				}
				if($flag==0)
				{
					$list[$c]=$r['rid'];
					$c=$c+1;
				}
				else
					continue;
			print <<<END
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
END;
			}
		}

?>