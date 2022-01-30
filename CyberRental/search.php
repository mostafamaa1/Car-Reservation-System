<?php
  //Navbar Starts Here
   include('partials-front/Navbar.php');
  //Navbar Ends Here
    ?>

<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="CSS/search.css">
<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
					<form action="<?php echo SITEURL; ?>list.php" method="POST">
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="form-label">Pick Up Location: </label>
								<input list="Locations" class="form-control" name="pickup" placeholder="Choose a City" required>
								<datalist id="Locations" class="form-label">
                			
									<option name="nicosia" value="Nicosia">
									<option name="girne" value="Girne">
									<option name="magusa" value="Magusa">
									<option name="ercan" value="Ercan">
									<option name="gonyeli" value="Gonyeli">
             				 </datalist>
								</div>
								</div>
								<div class="col-md-6">
								<div class="form-group">
								<label class="form-label">Drop Off Location: </label>
								<input list="Locations" class="form-control" name="dropoff" placeholder="Choose a City" required>
								<datalist id="Locations" class="form-label">
                  					
									<option name="nicosia" value="Nicosia">
									<option name="girne" value="Girne">
									<option name="magusa" value="Magusa">
									<option name="ercan" value="Ercan">
									<option name="gonyeli" value="Gonyeli">
             					 </datalist>
								</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
									<?php 

									$month = date('m');
									$day = date('d');
									$year = date('Y');

									$today = $year . '-' . $month . '-' . $day;
									$end = $year . '-' . $month . '-' . $day;

									?>
										<span class="form-label">Start Date</span>
										<input class="form-control" name="fromdate" type="date" min="<?php echo $today; ?>" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">End Date</span>
										<input class="form-control" name="todate" type="date" min="<?php echo $today;?>" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-btn">
										<button name="submit" class="submit-btn">Search</button>
									</div>
								</div>
							</div>
							<?php
							if(isset($_SESSION['date']))
							{
								echo $_SESSION['date'];
								unset($_SESSION['date']);
							}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
  //footer Starts Here
   include('partials-front/footer.php');
  //footer Ends Here
    ?>
