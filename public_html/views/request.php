<div id="call-btn" class="visible-xs">
    <a class="btn" href="#displayrequestform"><button type="button" class="btn btn-primary">Make requests now.</button></a>
 </div>
<div class="container homeContainer">
		
		<div class="row">
			<div class = "col-md-8">
				<h3>Requests</h3>
				<br>
				<h5>Here are some requests from our users see if you can help them.</h5>

				<?php 
				displayRequests('public');

				?>	

			</div>
			<div class = "col-md-4">
				<?php 
				echo "<br><hr>";
				displaysearch();


				?>
		
			<div id= "displayrequestform">

				<?php echo '<hr><h4>Make easy requests</h4>';

				displayrequestform();
				?>
			</div>
		</div>
		</div>
			
  	</div>