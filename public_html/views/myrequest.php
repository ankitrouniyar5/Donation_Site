<div id="call-btn" class="visible-xs">
    <a class="btn" href="#displayrequestform"><button type="button" class="btn btn-primary">Make requests now.</button></a>
 </div>

	<div class="container homeContainer">
		<div class="row">
			<div class = "col-md-8">
				<h3>Your Requests</h3>

				<?php 

				displayRequests('myrequest');


				?>	

			</div>
			<div class = "col-md-4">
				<?php 
				echo "<br><hr>";
				displaysearch();


				?>
		
			<div id= "displayrequestform">

				<?php echo '<hr><h4>Make easy requests.</h4>';

				displayrequestform();
				?>
			</div>
		</div>
		</div>
			
  	</div>
  	