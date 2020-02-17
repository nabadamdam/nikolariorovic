<div id="gtco-counter" class="gtco-section">
	<div class="gtco-container">

		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
				<h2 class="cursive-font primary-color">Fun Facts</h2>
				<p>Our restaurant is the best place in city. Check our stats and fun facts!</p>
			</div>
		</div>

		<div class="row">
			
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="5" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Avg. Rating</span>

				</div>
			</div>
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="43" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Food Types</span>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="32" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Chef Cook</span>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInUp">
				<div class="feature-center">
					<span class="counter js-counter" data-from="0" data-to="1985" data-speed="5000" data-refresh-interval="50">1</span>
					<span class="counter-label">Year Started</span>

				</div>
			</div>
				
		</div>
	</div>
</div>
<div id="gtco-subscribe">
	<div class="gtco-container">
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
				<h2 class="cursive-font">Subscribe</h2>
				<p>Be the first to know about the news in restaurant.</p>
			</div>
		</div>
		<div class="row animate-box">
			<div class="col-md-8 col-md-offset-2">
				<?php
					if(isset($_GET['textSub'])){
						$tekst = $_GET['textSub'];
						if($tekst == "t"){
							echo"You have successfully subscribed!";
						}else{
							echo"You email exists in our base!";
						}
					}
				?>	
				<form action="index.php?page=Subscribe" method="POST" onSubmit="return proveraSubscribe();" class="form-inline">
					<div class="col-md-6 col-sm-6" id="marginLeft">
						<div class="form-group">
							<label for="email" class="sr-only">Email</label>
							<input type="email" name="email" class="form-control" id="emailSub" placeholder="Your Email">
							<span id="errorEmail3"></span>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<button type="submit" name="buttonSub" id="buttonSub" class="btn btn-default btn-block">Subscribe</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>