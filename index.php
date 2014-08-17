<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
<title>
Room Search : find rooms, PG, hostels nearby you
</title>
<meta name="keywords" content="rooms,hostels,pg,accomodation,dehradun,room search,rooms for boys,rooms for girls,rooms in dehradun" />
<meta name="description" content="Find rooms for accomodation online. Rooms, PGs and hostels available for girls, boys and family. Find best room according to you needs." />
<link rel="stylesheet" type="text/css" href="css/template.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	
	$.get('searchdiv.htm',function(data){
			$('#middle').html(data);
	});
	
	$("#login").click(function(){
		$("#login").addClass("active");
		$("#search").removeClass("active");
		$("#signup").removeClass("active");
		$("#searchdiv").slideUp("slow");
		$("#searchdiv").fadeOut("slow");
		$("#signupbox").slideUp("slow");
		$("#signupbox").fadeOut("slow");
		$.get('loginbox.htm',function(data){
			$('#middle').html(data);
			$("#loginbox").delay(100).fadeIn("slow");
		});
	});
	
	$("#myaccount").click(function(){
		$("#myaccount").addClass("active");
		$("#search").removeClass("active");
		$("#manageacc").removeClass("active");
		$("#addacc").removeClass("active");
		$("#searchdiv").slideUp("slow");
		$("#addaccbox").slideUp("slow");
		$.get('myaccount.php',function(data){
			$('#middle').html(data);
			$("#myaccountbox").delay(100).fadeIn("slow");
		});
	});
	
	$("#addacc").click(function(){
		$("#addacc").addClass("active");
		$("#search").removeClass("active");
		$("#manageacc").removeClass("active");
		$("#myaccount").removeClass("active");
		$("#searchdiv").slideUp("slow");
		$("#myaccountbox").slideUp("slow");
		$.get('addaccbox.htm',function(data){
			$('#middle').html(data);
			$("#addaccbox").delay(100).fadeIn("slow");
		});
	});
	
	$("#manageacc").click(function(){
		$("#manageacc").addClass("active");
		$("#search").removeClass("active");
		$("#addacc").removeClass("active");
		$("#myaccount").removeClass("active");
		$("#searchdiv").slideUp("slow");
		$("#addaccbox").slideUp("slow");
		$.get('manageacc.php',function(data){
			$('#middle').html(data);
			$("#manageaccbox").delay(100).fadeIn("slow");
		});
	});
	
	$("#search").click(function (){
		$("#search").addClass("active");
		$("#login").removeClass("active");
		$("#signup").removeClass("active");
		$("#myaccount").removeClass("active");
		$("#manageacc").removeClass("active");
		$("#addacc").removeClass("active");
		$("#loginbox").slideUp("slow");
		$("#loginbox").fadeOut("slow");
		$("#signupbox").slideUp("slow");
		$("#signupbox").fadeOut("slow");
		$("#addaccbox").slideUp("slow");
		$("#addaccbox").fadeOut("slow");
		$("#manageaccbox").slideUp("slow");
		$("#manageaccbox").fadeOut("slow");
		$.get('searchdiv.htm',function(data){
			$('#middle').html(data);
			$("#searchdiv").delay(100).fadeIn("slow");
		});
	});
	
	$("#signup").click(function(){
		$("#signup").addClass("active");
		$("#login").removeClass("active");
		$("#search").removeClass("active");
		$("#searchdiv").slideUp("slow");
		$("#searchdiv").fadeOut("slow");
		$("#loginbox").slideUp("slow");
		$("#loginbox").fadeOut("slow");
			
		$.get('signupbox.htm',function(data){
			$('#middle').html(data);
			$("#signupbox").delay(100).fadeIn("slow");
		});
	});
	
	<?php
		if(isset($_SESSION['login']) && $_SESSION['login'] == 1)
		{
				echo '$("#signout").click(function(){
				$.get("signout.php",function(){
					location.reload(0);
				});
			});';
		}
	?>
});

</script>
</head>
<body>
<div id="wrapper">

	<div id="middle">
		
	</div>
	<div id="notification">
		<span id="message"></span>
	</div>
	<div id="navigate">
		<a class="link active" id="search">Search</a>
		<?php
			if(isset($_SESSION['login']) && $_SESSION['login'] == 1)
			{
				print <<<END
				<a class="link" id="addacc">Add Accomodation</a>
				<a class="link" id="manageacc">Manage Accomodation</a>
				<a class="link" id="myaccount">My Account</a>
				<a class="link" id="signout">Sign Out</a>
END;
			}
			else
			{
print <<<END
				<a class="link" id="login">Login</a>
				<a class="link" id="signup">Signup</a>
END;
			}
		?>
	</div>
</div>
</body>
</html>