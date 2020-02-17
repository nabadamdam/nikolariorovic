
<nav class="gtco-nav" role="navigation">
	<div class="gtco-container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div id="gtco-logo"><a href="index.php?page=Home">Savory <em>.</em></a></div>
			</div>
			<div class="col-xs-8 text-right menu-1">
				<ul>
					<?php foreach($links as $link): ?>
						<?php if(isset($_SESSION['user'])):?>
							<?php if($_SESSION['user']->idUloga == 1):?>
								<?php if($link->naziv == "Contact&Registration"): continue; ?>
								<?php else:?>
									<li><a href="index.php?page=<?=$link->naziv?>"><?=$link->naziv?></a></li>
								<?php endif;?>
							<?php endif;?>
							<?php if($_SESSION['user']->idUloga != 1):?>
								<?php if($link->naziv == "Admin" || $link->naziv == "Contact&Registration"): continue; ?>
									
								<?php else:?>
									<li><a href="index.php?page=<?=$link->naziv?>"><?=$link->naziv?></a></li>
								<?php endif;?>
							<?php endif;?>
						<?php endif;?>
						<?php if(!isset($_SESSION['user'])):?>
							<?php if($link->naziv == "Admin" || $link->naziv == "Logout" || $link->naziv == "Contact" || $link->naziv == "Menu"): continue; ?>
							<?php else:?>
								<li><a href="index.php?page=<?=$link->naziv?>"><?=$link->naziv?></a></li>
							<?php endif;?>
						<?php endif;?>
					<?php endforeach;?>	
				</ul>	
			</div>
		</div>
	</div>
</nav>
