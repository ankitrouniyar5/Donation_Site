<div id="call-btn" class="visible-xs">
    <a class="btn" href="#displaymedicineform"><button type="button" class="btn btn-primary">Donate medicines now.</button></a>
 </div>
	<div class="container homeContainer">
		
		<div class="row">
			<div class = "col-md-8">
				<h3>Medicines</h3>
				<br>
				<h5>Here are some medicines from our users .</h5>

				<?php 
				displayMedicines('public');

				?>	

			</div>
			<div class = "col-md-4">
				<?php 
				echo "<br><hr>";
				displaysearch();


				?>
		
			<div id= "displaymedicineform">

				<?php echo '<hr><h4>Donate medicines easily</h4>';

				displaymedicineform();
				?>
			</div>
		</div>
		</div>
			
  	</div>