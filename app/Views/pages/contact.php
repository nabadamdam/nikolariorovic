<?php if(isset($_SESSION['user'])):?>
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 animate-box">
					<h3 class="cursive-font primary-color">Contact Us</h3>
					<form action="index.php?page=ContactUs" method="POST" onSubmit="return proveraPodatakaContact();">
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="name">Name</label>
								<input type="text" id="name" name="name" class="form-control" value="<?=$_SESSION['user']->Ime?>" placeholder="Your first name" readonly="readonly"/>
								<span id="errorName1"></span>
							</div>
							
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" value="<?=$_SESSION['user']->Email?>" placeholder="Your email address" readonly="readonly"/>
								<span id="errorEmail1"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="message">Message</label>
								<textarea id="message" name="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
								<span id="errorMessage"></span>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" name="contact" class="btn btn-primary"/>
						</div>

					</form>	
					<?php
						if(isset($_GET['text'])){
							$tekst = $_GET['text'];
							if($tekst == "t"){
								echo"You have successfully sent your message!";
							}else{
								echo"You haven't successfully sent your message!";
							}
						}
					?>	
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="gtco-contact-info">
						<h3 class="cursive-font primary-color">Contact Information</h3>
						<ul>
							<li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
							<li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li class="url"><a href="http://FreeHTML5.co">FreeHTML5.co</a></li>
						</ul>
					</div>


				</div>
				</div>
			</div></br>
		</div>
	</div>
<?php else:?>
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 animate-box">
					<h3 class="cursive-font primary-color">Contact Us</h3>
					<form action="index.php?page=ContactUs" method="POST" onSubmit="return proveraPodatakaContact();">
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="name">Name</label>
								<input type="text" id="name" name="name" class="form-control" placeholder="Your first name"/>
								<span id="errorName1"></span>
							</div>						
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="email">Email</label>
								<input type="text" id="email" name="email" class="form-control" placeholder="Your email address"/>
								<span id="errorEmail1"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label class="sr-only" for="message">Message</label>
								<textarea id="message" name="message" cols="30" rows="10" class="form-control" placeholder="Write us something"></textarea>
								<span id="errorMessage"></span>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" value="Send Message" name="contact" class="btn btn-primary"/>
						</div>
					</form>	
					<?php
						if(isset($_GET['text'])){
							$tekst = $_GET['text'];
							if($tekst == "t"){
								echo"You have successfully sent your message!";
							}else{
								echo"You haven't successfully sent your message!";
							}
						}
					?>	
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="gtco-contact-info">
						<h3 class="cursive-font primary-color">Contact Information</h3>
						<ul>
							<li class="address">198 West 21th Street, <br> Suite 721 New York NY 10016</li>
							<li class="phone"><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li class="email"><a href="mailto:info@yoursite.com">savory&#64;gmail&#46;com</a></li>
						</ul>
					</div>


				</div>
				</div>
			</div></br>
			<div class="row">
				<div class="col-md-12">
					<h3 class="cursive-font primary-color regH">Registration</h3>
					<form action="index.php?page=Registration" method="POST" onSubmit="return proveraPodataka();">
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Name</label>
								<input type="text" id="Name" name="Name" class="form-control"/>
								<span id="errorName"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Surname</label>
								<input type="text" id="Surname" name="Surname" class="form-control"/>
								<span id="errorSurname"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Email</label>
								<input type="text" id="Email" name="Email" class="form-control"/>
								<span id="errorEmail"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Username</label>
								<input type="text" id="Username" name="Username" class="form-control"/>
								<span id="errorUsername"></span>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="date-start">Password</label>
								<input type="password" id="Password" name="Password" class="form-control"/>
								<span id="errorPassword"></span>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="submit" name="regB" class="btn btn-primary btn-block" value="Registration"/>
							</div>
						</div>
					</form>	
				</div>
			</div>
		</div>
	</div>						
<?php endif;?>