<?php
if(isset($_GET['page'])):
	if($_GET['page']=="Home"):
		?>
		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(app/assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						<div class="row row-mt-15em">
							<?php if(isset($_SESSION['user'])):?>
								<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
									<h1 class="cursive-font centerDiv">All in good taste!</h1>	
								</div>
							<?php endif;?>
							<?php if(!isset($_SESSION['user'])):?>
								<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
									<h1 class="cursive-font">All in good taste!</h1>	
								</div>
								<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
									<div class="form-wrap">
										<div class="tab">
											<div class="tab-content">
												<div class="tab-content-inner active" data-content="signup">
													<h3 class="cursive-font">Log in</h3>
													<form action="index.php?page=login" method="POST" onSubmit="return proveraPodatakaLogIn();">
														<div class="row form-group">
															<div class="col-md-12">
																<label for="date-start">Email</label>
																<input type="text" name="email" id="email" class="form-control"/>
																<span id="errorEmail2"></span>
															</div>
														</div>
														<div class="row form-group">
															<div class="col-md-12">
																<label for="date-start">Password</label>
																<input type="password" name="password" id="password" class="form-control"/>
																<span id="errorPassword2"></span>
															</div>
														</div>

														<div class="row form-group">
															<div class="col-md-12">
																<input type="submit" name="login" class="btn btn-primary btn-block" value="Log in"/>
															</div>
														</div>
														<?php
															if(isset($_GET['text'])){
																echo"You didn't enter the email or password correctly";
															}
														?>
													</form>	
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif;?>
							
						</div>
					</div>
				</div>
			</div>
		</header>

	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="Menu"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(app/assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						

						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Taste all our menu!</h1>	
							</div>
							
						</div>
								
						
					</div>
				</div>
			</div>
		</header>
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="Services"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(app/assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">It's our pleasure to serve!</h1>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="Contact"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(app/assets/images/img_bg_5.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">

						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Say hello!</h1>	
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</header>
		
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="Author"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm heder" role="banner" style="background-image: url(app/assets/images/img_bg_4.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Author</h1>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="Admin"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm heder1" role="banner" style="background-image: url(app/assets/images/img_bg_6.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Admin Panel</h1>	
							</div>							
						</div>		
					</div>
				</div>
			</div>
		</header>
		
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="Update"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm heder1" role="banner" style="background-image: url(app/assets/images/img_bg_6.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Admin Panel</h1>	
							</div>							
						</div>						
					</div>
				</div>
			</div>
		</header>
		
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="UpdateUser"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm heder1" role="banner" style="background-image: url(app/assets/images/img_bg_6.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Admin Panel</h1>	
							</div>							
						</div>						
					</div>
				</div>
			</div>
		</header>
		
	<?php
		endif;
	?>
	<?php
		if($_GET['page']=="onePicture"):
	?>
		<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image: url(app/assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-center">
						<div class="row row-mt-15em">
							<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1 class="cursive-font">Taste all our menu!</h1>	
							</div>	
						</div>			
					</div>
				</div>
			</div>
		</header>
	<?php
		endif;
	?>
<?php
	endif;
?>
<?php
	if(!isset($_GET['page'])):
?>
	<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(app/assets/images/img_bg_1.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						<div class="row row-mt-15em">
							<?php if(isset($_SESSION['user'])):?>
								<div class="col-md-12 mt-text animate-box" data-animate-effect="fadeInUp">
									<h1 class="cursive-font centerDiv">All in good taste!</h1>	
								</div>
							<?php endif;?>
							<?php if(!isset($_SESSION['user'])):?>
								<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
									<h1 class="cursive-font">All in good taste!</h1>	
								</div>
								<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
									<div class="form-wrap">
										<div class="tab">
											<div class="tab-content">
												<div class="tab-content-inner active" data-content="signup">
													<h3 class="cursive-font">Log in</h3>
													<form action="index.php?page=login" method="POST" onSubmit="return proveraPodatakaLogIn();">
														<div class="row form-group">
															<div class="col-md-12">
																<label for="date-start">Email</label>
																<input type="text" name="email" id="email" class="form-control"/>
																<span id="errorEmail2"></span>
															</div>
														</div>
														<div class="row form-group">
															<div class="col-md-12">
																<label for="date-start">Password</label>
																<input type="password" name="password" id="password" class="form-control"/>
																<span id="errorPassword2"></span>
															</div>
														</div>
														<div class="row form-group">
															<div class="col-md-12">
																<input type="submit" name="login" class="btn btn-primary btn-block" value="Log in"/>
															</div>
														</div>
														<?php
															if(isset($_GET['text'])){
																echo"You didn't enter the email or password correctly";
															}
														?>
													</form>	
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endif;?>
							
						</div>
					</div>
				</div>
			</div>
		</header>

<?php
	endif;
?>




