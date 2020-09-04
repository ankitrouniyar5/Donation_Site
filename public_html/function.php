<?php
	session_start();
	// ini_set('display_errors',1); 
 // 	error_reporting(E_ALL);

	$link = mysqli_connect("shareddb-w.hosting.stackcp.net","mydiary_database-3134399aa0","g''?>'c%9#-5","mydiary_database-3134399aa0");

	 if (mysqli_connect_error()){

      die("Connection Failed");
    }
if(isset($_GET['logout'])){


	session_unset();
}
   
function displayDonations($_type){
	global $link;

	if ($_type == "public"){

		$whereClause = "WHERE donationbox.status = 'Available' ";

	}else if($_type == "mydonation"){

		$whereClause = "WHERE userid ='".mysqli_real_escape_string($link,$_SESSION['id'])."'";
	}else if($_type == "search"){
		if ($_GET['q']==""){
			echo '<div class="alert alert-danger" role="alert">Search box was empty!! </div>';
		}else{
		echo '<div class="alert alert-success" role="alert">Showing results in <strong>Donations</strong> for  <em>'.$_GET['q'].'</em></div>';
	}
		$whereClause = "WHERE `donationInfo` LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%' AND donationbox.status = 'Available' ";
	}
	
	$query = "SELECT * FROM `donationbox` " .$whereClause. " ORDER BY `datetime` DESC";
	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result) == 0){
		echo "There is no donation available";
	}else{

		while($row = mysqli_fetch_assoc($result)){

			$userQuery = "SELECT * FROM `user_info` WHERE id = '".mysqli_real_escape_string($link,$row['userid'])."' LIMIT 1";
			$userQueryResult = mysqli_query($link,$userQuery);
			
			$user = mysqli_fetch_assoc($userQueryResult);
			echo "<div class = 'donations'><p>".$row['donationInfo']."<br>Status:".$row['status']."</p>";
			echo "<strong>From :</strong> ".$user['first-name']." ".$user['last-name']."<br>";
			echo "<strong>Contact Information:</strong><br> Email:-".$user['email']."<br>Phone: ".$user['phone-number']."</div>";
			if ($_type=="mydonation"){
				echo '<button class="btn btn-success changeStatus" value ="'.$row['Id'].'">Change Status</button>
						<button class="btn btn-danger deleteDonation" value ="'.$row['Id'].'">Delete</button>';
						 

			}
			
		}
	}
}

function displaysearch(){
	echo '<form class="form-inline">
  
  <div class="form-group">
  <input type = "hidden" name = "page" value="search">
    <label for="searchbox" class="sr-only">Search items</label>
    <input type="text" name = "q" class="form-control" id="searchbox" placeholder="Search">
  </div>
  <button class="btn btn-primary">Search</button>
</form>';
}

function displaydonationform(){
	echo '<div id="donationSuccess" class="alert alert-success">Your donation was posted successfully.</div>
            <div id="donationFail" class="alert alert-danger"></div><div method =  "POST">
  
  <div class="form-group">
    <label for="status">Status</label>
    <select class="form-control" name = "status" id="status">
      <option>Available</option>
      <option>Unavailable</option>
    </select>
  </div>
  
  <div class="form-group">
    <label for="donationInfo">Donation Description</label>
    <textarea class="form-control" id="donationInfo" name = "donationInfo" rows="3"></textarea>
  </div>
  <button class="btn btn-primary" id = "postDonation">Donate</button>
</div>';
}

function mailingForm(){

	echo '
			    <div class="form-group">
			    	<br>
			    <h5>We will share your message with every one associated with our foundation.</h5><hr>
			     <div class="form-group">
			    <label for="phone-number-box">Enter your-number</label>
			    <input type="text" id="phone-number-box" class="form-control mx-sm-3" >
			    <small>We will share this number with everone.</small>
			    </div>
			   <label for="mailDescription">Enter your message below</label>
			   <textarea class="form-control" id="mailDescription" style = "width: 60%;"rows="5" placeholder = "Example: My friends had an accident he needs o positive blood .Contact me if you are near Narela"></textarea>
			  </div>
			<button class="btn btn-primary" id = "sendmail">SEND MAIL</button>
			<div id="sendingMail" class="alert alert-primary">Sending......</div>
			<div id="sendingSuccess" class="alert alert-success">Your message was sent.</div>
			<div id="sendingFailed" class="alert alert-danger"></div>
		';
}


function displayRequests($_type){
	global $link;

	if ($_type == "public"){

		$whereClause = "";

	}else if($_type == "myrequest"){

		$whereClause = "WHERE userid ='".mysqli_real_escape_string($link,$_SESSION['id'])."'";
	}else if($_type == "search"){
		if ($_GET['q']==""){
			echo '<div class="alert alert-danger" role="alert">Search box was empty!! </div>';
		}else{
		echo '<div class="alert alert-success" role="alert">Showing results in <strong>Requests</strong> for <em>'.$_GET['q'].'</em></div>';
	}
		$whereClause = "WHERE `requestInfo` LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%' OR `title` LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%' ";
	}
	
	$query = "SELECT * FROM `requestbox` " .$whereClause. " ORDER BY `datetime` DESC";
	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result) == 0){
		echo "There is no request available";
	}else{

		while($row = mysqli_fetch_assoc($result)){

			$userQuery = "SELECT * FROM `user_info` WHERE id = '".mysqli_real_escape_string($link,$row['userid'])."' LIMIT 1";
			$userQueryResult = mysqli_query($link,$userQuery);
			
			$user = mysqli_fetch_assoc($userQueryResult);
			echo "<div class = 'donations'><p><strong>".$row['title']."</strong><br>Description:".$row['requestInfo']."</p>";
			echo "<strong>From :</strong> ".$user['first-name']." ".$user['last-name']."<br>";
			echo "<strong>Contact Information:</strong><br> Email:-".$user['email']."<br>Phone: ".$user['phone-number']."</div>";
			if ($_type=="myrequest"){

				echo '<button class="btn btn-danger deleteRequest" value ="'.$row['Id'].'">Delete</button>';
						 

			}
			
		}
	}
}


function displayMedicines($_type){
	global $link;

	if ($_type == "public"){

		$whereClause = "";

	}else if($_type == "mymedicine"){

		$whereClause = "WHERE userid ='".mysqli_real_escape_string($link,$_SESSION['id'])."'";
	}else if($_type == "search"){
		if ($_GET['q']==""){
			echo '<div class="alert alert-danger" role="alert">Search box was empty!! </div>';
		}else{
		echo '<div class="alert alert-success" role="alert">Showing results in <strong>Medicines</strong> for <em>'.$_GET['q'].'</em></div>';
	}
		$whereClause = "WHERE `medicineInfo` LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%' OR `name` LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%' ";
	}
	
	$query = "SELECT * FROM `medicinebox` " .$whereClause. " ORDER BY `datetime` DESC";
	$result = mysqli_query($link,$query);
	if (mysqli_num_rows($result) == 0){
		echo "There is no medicine available";
	}else{

		while($row = mysqli_fetch_assoc($result)){

			$userQuery = "SELECT * FROM `user_info` WHERE id = '".mysqli_real_escape_string($link,$row['userid'])."' LIMIT 1";
			$userQueryResult = mysqli_query($link,$userQuery);
			
			$user = mysqli_fetch_assoc($userQueryResult);
			echo "<div class = 'donations'><p><strong>".$row['name']."</strong><br>Description:".$row['medicineInfo']."</p>";
			echo "<strong>From :</strong> ".$user['first-name']." ".$user['last-name']."<br>";
			echo "<strong>Contact Information:</strong><br> Email:-".$user['email']."<br>Phone: ".$user['phone-number']."</div>";
			if ($_type=="mymedicine"){

				echo '<button class="btn btn-danger deleteMedicine" value ="'.$row['Id'].'">Delete</button>';
						 

			}
			
		}
	}
}


function displayrequestform(){
	echo '<div id="requestSuccess" class="alert alert-success">Your request was posted successfully.</div>
            <div id="requestFail" class="alert alert-danger"></div><div method =  "POST">
  
  <div class="form-group">
    <label for="title">Title</label>
    <input type = "text" class = "form-control" id = "title">
  </div>
  
  <div class="form-group">
    <label for="requestInfo">Request Description</label>
    <textarea class="form-control" id="requestInfo" name = "requestInfo" rows="3"></textarea>
  </div>
  <button class="btn btn-primary" id = "postRequest">Request</button>
</div>';
}

function displaymedicineform(){
	echo '<div id="medicineSuccess" class="alert alert-success">Your medicine was donated successfully.</div>
            <div id="medicineFail" class="alert alert-danger"></div><div method =  "POST">
  
  <div class="form-group">
    <label for="name">Name of medicine</label>
    <input type = "text" class = "form-control" id = "name">
  </div>
  
  <div class="form-group">
    <label for="medicineInfo">Request Description</label>
    <textarea class="form-control" id="medicineInfo" name = "medicineInfo" rows="3"></textarea>
  </div>
  <button class="btn btn-primary" id = "postMedicine">Donate medicine</button>
</div>';
}

?>