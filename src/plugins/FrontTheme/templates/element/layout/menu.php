<!-- Start Header Area -->
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html">
						<?= $this->Html->image('logo.png') ?>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							
						<li class="nav-item active">
								<?= $this->Html->link('ホーム', ['controller' => 'Pages', 'action' => 'index'], ['class' => 'nav-link']) ?>
							</li>

							<?php
							foreach ($categories as $idCategory => $category) { ?>
								<li class="nav-item">
								<?= $this->Html->link($category, ['controller' => 'Products', 'action' => 'index', $idCategory], ['class' => 'nav-link']) ?>
							</li>
							<?php
							} ?>
					
							<li class="nav-item">
								<?= $this->Html->link('カート', ['controller' => 'Orders', 'action' => 'checkout'], ['class' => 'nav-link']) ?>
							<li class="nav-item">
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!-- End Header Area -->