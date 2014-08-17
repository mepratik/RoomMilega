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
		    $uid=$_SESSION['uid'];
			$accomodation_type  = $_POST['type'];
			$where_is_room_located = $_POST['location'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$rent = $_POST['rent'];
			$number_of_rooms = $_POST['num_rooms'];
			$max_beds_per_room = $_POST['max_beds'];
			$bed_provided = $_POST['bed_provided'];
			$notes = $_POST['notes'];
			$bathroom_type = $_POST['btype'];
			$jet_pump = $_POST['pump'];
			$hot_water = $_POST['hot_water'];
			$security_available = $_POST['security_avail'];
			$aval_electricity = $_POST['electricity24'];
			$availability = $_POST['isavailable'];
			$garage = $_POST['garage'];			
			$available_for = $_POST['availablefor'];
			$toilet_type = $_POST['ttype'];
			$kitchen_available = $_POST['kitchen'];
			$electricity_bill = $_POST['elect_bill'];
			$food_provided = "";
			$gym = $_POST['gym'];
			$laundary = $_POST['laundary'];
			$newspaper = $_POST['newspaper'];
			$tv = $_POST['tv'];
			$guest_room = $_POST['guest_room'];
			$ac_room = $_POST['ac'];
			$swimming_pool = $_POST['swimming'];
			$wifi = $_POST['wifi'];
			
			$stmt = $dbh->prepare("UPDATE room_details SET accomodation_type=:type, location=:location, rent=:rent, num_rooms=:num_rooms, max_beds_per_room=:max_beds, beds_provided=:bed_provided, bathroom_type=:btype, toilet_type=:ttype, kitchen_available=:kitchen, jet_pump=:pump, available_for=:availablefor, garage=:garage, hot_water=:hot_water, electricity_charge=:electricity_bill, state=:state, city=:city, gym=:gym, laundary=:laundary, food_provided=:food_provided, news_paper=:newspaper, tv=:tv, guest_room=:guest_room, ac_rooms=:ac, security_avail=:security_avail, swimming_pool=:swimming, electricity24=:electricity24, wi_fi=:wifi, notes=:notes, is_available=:isavailable where rid=:rid AND uid=:uid"); 
			
			$stmt->bindParam(':rid',$_SESSION['rid']); 
			$stmt->bindParam(':uid',$_SESSION['uid']); 
			$stmt->bindParam(':type',$accomodation_type); 
			$stmt->bindParam(':location',$where_is_room_located);
			$stmt->bindParam(':rent',$rent);
			$stmt->bindParam(':num_rooms',$number_of_rooms);
			$stmt->bindParam(':max_beds',$max_beds_per_room);
			$stmt->bindParam(':bed_provided',$bed_provided);
			$stmt->bindParam(':city',$city);
			$stmt->bindParam(':state',$state);
			$stmt->bindParam(':pump',$jet_pump);
			$stmt->bindParam(':hot_water',$hot_water);
			$stmt->bindParam(':security_avail',$security_available);
			$stmt->bindParam(':electricity24',$aval_electricity);
			$stmt->bindParam(':isavailable',$availability);
			$stmt->bindParam(':garage',$garage);
			$stmt->bindParam(':notes',$notes);
			$stmt->bindParam(':availablefor',$available_for);
			$stmt->bindParam(':ttype',$toilet_type);
			$stmt->bindParam(':btype',$bathroom_type);
			$stmt->bindParam(':kitchen',$kitchen_available);
			$stmt->bindParam(':electricity_bill',$electricity_bill);
			$stmt->bindParam(':food_provided',$food_provided);
			$stmt->bindParam(':gym',$gym);
			$stmt->bindParam(':laundary',$laundary);
			$stmt->bindParam(':newspaper',$newspaper);
			$stmt->bindParam(':tv',$tv);
			$stmt->bindParam(':guest_room',$guest_room);
			$stmt->bindParam(':ac',$ac_room);
			$stmt->bindParam(':swimming',$swimming_pool);
			$stmt->bindParam(':wifi',$wifi);
			
			$res = $stmt->execute();
			
			if($res)
			{
				echo "Accomodation details have been updated successfully. Thank you :)";
			}
			else
			{
				echo "Sorry, accomodation details could not be updated. Please check all the fields and try again.";
		    }
?>