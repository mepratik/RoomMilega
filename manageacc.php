<html>
<head>
<script type="text/javascript">
$("#type").change(function(){
	$val=$("#type").val();
	if($val == 'Boys\' Hostel' || $val== "Girls\' Hostel")
	{
		$("#honly").fadeIn("slow");
		$("#fponly").fadeOut("slow");
	}
	else if($val == 'Flat' || $val == 'PG')
	{
		$("#honly").fadeOut("slow");
		$("#fponly").fadeIn("slow");
	}
	else
	{
		$("#honly").fadeOut("slow");
		$("#fponly").fadeOut("slow");
	}
		
});
</script>

<script type="text/javascript">
	$("#addaccbutton").click(function(){
	
		$("#notification").slideDown("slow",function(){
			$("#message").html("Processing...",function(){
				$("#message").delay(100).fadeIn("slow");
			});
		});
		
		$.post('addacc.php',$("#addaccform").serialize(),function(data){
		$("#notification").fadeIn("slow",function(){
				$("#message").html(data);
				$("#message").fadeIn("slow");
				$("#message").delay(2000).fadeOut("slow",function(){
					$("#notification").delay(100).slideUp("slow",function(){
						location.reload(0);
					});
				});
			});
		});
	});
</script>

</head>
</html>
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
			
			
			$stmt1 = $dbh->prepare("SELECT * FROM room_details WHERE uid = :userid");
			$stmt1->bindParam(":userid",$_SESSION['uid']);
			$stmt1->execute();
			$row1=$stmt1->fetch();
			
            $rid= $row1['rid'];
			$type= $row1['accomodation_type'];
			$location= $row1['location'];
			$rent= $row1['rent'];
			$rooms= $row1['num_rooms'];
			$bpm= $row1['max_beds_per_room'];
			$beds= $row1['beds_provided'];
			$bathroom= $row1['bathroom_type'];
			$toilet= $row1['toilet_type'];
			$kitchen= $row1['kitchen_available'];
			$electricity= $row1['electricity24'];
			$jet= $row1['jet_pump'];
			$garage= $row1['garage'];
			$hotwater= $row1['hot_water'];
			$availablefor= $row1['available_for'];
			$electricity_charge= $row1['electricity_charge'];
			$state= $row1['state'];
			$city= $row1['city'];
			$gym= $row1['gym'];
			$laundry= $row1['laundary'];
			$food= $row1['food_provided'];
			$paper= $row1['news_paper'];
			$tv= $row1['tv'];
			$guest= $row1['guest_room'];
			$ac= $row1['ac_rooms'];
			$security= $row1['security_avail'];
			$pool= $row1['swimming_pool'];
			$wifi= $row1['wi_fi'];
			$notes= $row1['notes'];
			$available= $row1['is_available'];
			
			$_SESSION['rid']=$row1['rid'];
			print <<<END
			
			<div id="manageaccbox" class="scrollbar">
<form id="manageccform" method="POST" onSubmit="return false;">
		<h2>Update Accomodation Information</h2> <br/>
		<div id="addaccleft">
	<label>Accomodation Type :</label> <select name="type" id="type" class="inputfield" > <option selected>$type </option><option>PG</option><option>Flat</option><option>Boys' Hostel</option><option>Girls' Hostel</option>
											</select><br/>
		<label>Where is room Located? :</label> <input type="text" name="location" class="inputfield" value="$location"/></br>
		<label>City :</label> <input type="text" name="city" class="inputfield" value="$city"/></br>
		<label>State :</label> <input type="text" name="state" class="inputfield" value="$state"/></br>
		
		<label>Rent :</label> <input type="number" name="rent" min="500" step="50" class="inputfield" value="$rent"/></br>
  <label>Number of Rooms :</label> <input name="num_rooms" type="number" min="1" max="50" class="inputfield" value="$rooms"/> </br>
<label>Max Beds Per Room:</label> <input name="max_beds" type="number" min="1" max="5" class="inputfield" value="$bpm"></br>
		<label>Bathroom Type :</label> <select name="btype" class="inputfield" ><option SELECTED>$bathroom</option><option>Attached</option><option>Common</option><option>Both</option> </select><br/>
		<label>Beds provided :</label> <input type="checkbox" name="bed_provided" checked="$beds"/>Yes </br>
		<label>Notes :</label> <textarea rows="3" cols="30" name="notes" >$notes</textarea></br>
		
		</div>
		
		
		<div id="addaccright">
		<label>Jet Pump :</label> <input type="checkbox" name="pump" checked="$jet"/>Yes </br>
		<label>Hot Water :</label> <input type="checkbox" name="hot_water" checked="$hotwater"/>Yes </br>
		<label>Security Available :</label> <input type="checkbox" name="security_avail" checked="$security"/>Yes</br>
		<label>24 Hour Electricty :</label> <input type="checkbox" name="electricty24" checked="$electricity"/>Yes </br>
		<label>Availabity :</label> <select name="isavailable"><option selected> $available </option><option>Available</option><option value="0">Not-Available</option></select></br>
		<label>Garage :</label> <input type="checkbox" name="garage" checked="$garage"/>Yes </br>
		
		
		<!-- for flat & pg -->
		<div id="fponly" style="diaplay:none">
		<label>Available For :</label> <select name="availablefor" ><option selected> $availablefor </option> <option>Family</option><option>Boys</option><option>Girls</option><option>Unisex</option>  </select><br/>
		<label>Toilet Type :</label> <select name="ttype" ><option selected> $toilet </option> <option>Indian</option><option>Western</option><option>Both</option> </select><br/>
		<label>Kitchen Available :</label> <input type="checkbox" name="kitchen" checked="$kitchen"/>Yes </br>
		<label>Electricity Bill :</label> <select name="availablefor"> <option selected> $electricity_charge</option><option>Included</option><option>Excluded</option></select><br/>
		</div>
		
		<!-- for hostel only -->
		<div id="honly" style="display:none">
		<label>Gym :</label> <input type="checkbox" name="gym" checked="$gym"/>Yes </br>
		<label>Laundary :</label> <input type="checkbox" name="laundary" checked="$laundry"/>Yes </br>
		<label>Newspaper :</label> <input type="checkbox" name="newspaper" checked="$paper"/>Yes </br>
		<label>TV :</label> <input type="checkbox" name="tv" checked="$tv"/>Yes </br>
		<label>Guest Room :</label> <input type="checkbox" name="guest_room" checked="$guest"/>Yes </br>
		<label>AC Room :</label> <input type="checkbox" name="ac" checked="$ac"/>Yes </br>
		<label>Swimming Pool :</label> <input type="checkbox" name="swimming" value="$pool"/>Yes </br>
		<label>WiFi :</label> <input type="checkbox" name="wifi" checked="$wifi"/>Yes </br>
	
		</div>
		<input type="submit" class="button" name="addaccbutton" id="addaccbutton" value="Update Accomodation" />
		</div>
		</form>
	</div>
END;
?>