<?php
	if($_GET['page']=="Menu"):
?>
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2 class="cursive-font primary-color">Popular Dishes</h2>
					<p>Here you can see some pictures of our specialities, fresh of the owen!</p>
				</div>
			</div>
			<input type="text" class="form-control" id="searchMenu" name="searchMenu" placeholder="Search..."/>
			<select class="form-control" id="listSort">
				<option value="default">Default</option>
				<option value="ASC">Ascending</option>
				<option value="DESC">Descending</option>
			</select>
			</br>
			</br>
			<div class="row" id="productSearch">
				<?php foreach($products as $item): ?>
					<div class="col-lg-4 col-md-4 col-sm-6">
						<a href="index.php?page=onePicture&idPic=<?=$item->idProizvoda?>" class="fh5co-card-item">
							<figure>
								<img src="<?=$item->SlikaSrc?>" alt="<?=$item->SlikaAlt?>" class="img-responsive">
							</figure>
							<div class="fh5co-text">
								<h2><?=$item->Naziv?></h2>
								<p><?=$item->Opis?></p>
								<p><span class="price cursive-font">$<?=$item->Cena?></span></p>
							</div>
						</a>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</div>
<?php
	endif;
?>
<?php
	if($_GET['page']=="onePicture"):
?>
	<div class="gtco-container">
		<div class="row">
			<div class="col-md-12 col-md-offset-0 text-left">
				<div class="row row-mt-15em" id="marginOneProd">
					<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
						<img src="<?=$oneProducts->SlikaSrc?>" alt="<?=$oneProducts->SlikaAlt?>" id="border" class="img-responsive">
					</div>
					<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">
						<div class="form-wrap">
							<div class="tab">
								<div class="tab-content">
									<div class="tab-content-inner active" data-content="signup">
										<h2 class="cursive-font" id="titleOneProd">Information of product</h2>
										<div class="fh5co-text">
											<h4><?=$oneProducts->Naziv?></h4>
											<p><?=$oneProducts->Opis?></p>
											<p><span class="price cursive-font" id="colorPriceOneProd">$<?=$oneProducts->Cena?></span></p>
											<a href="index.php?page=Menu" name="backPage" class="btn btn-primary btn-block">Back to Menu</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
	endif;
?>
