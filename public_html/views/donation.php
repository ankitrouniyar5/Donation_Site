<div id="call-btn" class="visible-xs">
    <a class="btn" href="#displaydonationform"><button type="button" class="btn btn-primary">Donate Items</button></a>
 </div>

	<div class="container homeContainer">
		
		<div class="row">
			<div class = "col-md-8">
				<h3>Available items</h3>

				<?php 
				displayDonations('public');

				?>	

			</div>
			<div class = "col-md-4">
				<?php 
				echo "<br><hr>";
				displaysearch();


				?>
		
			<div id= "displaydonationform">

				<?php echo '<hr><h4>Donate Items Easily</h4>';

				displaydonationform();
				?>
			</div>
		</div>
		</div>
			
  	</div>
