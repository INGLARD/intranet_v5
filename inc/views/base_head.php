<!-- header start -->
<header>
	<nav class="navbar">
		<div class="dropdown nav-content-start">
			<div class="icon-bars-menu-button">
				<button type="button" class="intranet_menu_dropdown" id="showLeft" style="display:none">
					<i class="glyph-icon icon-bars"></i>
				</button>
			</div>

			<div class="">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="loginDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<img src="assets/img/profile_nav.png" alt="profile_nav"/>
					<span><?php echo $nomprenom; ?></span>
				</button>

				<div class="dropdown-menu login-dropdown-content" aria-labelledby="loginDropdownMenu">
					<div class="user-info">
						<div class="">
							<i class="glyph-icon icon-linecons-user iconprofil"></i>
						</div>

						<div class="">
							<p><?php echo $nomprenom ?></p>
							<p><?php echo $fonction ?></p>
							<p> <?php echo $codemag.' - '.$nommag ?></p>
						</div>
					</div>

					<div class="dropdown-divider"></div>

					<div class="disconnect">
						<a href="unlog4.php" class="btn btn-danger">
							<i class="glyph-icon icon-power-off"></i>
							Deconnexion
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="nav-content-center">
			<p class="nav-title">Intranet du Groupe Blachere</p>
			<p id="clock"><?php echo $date ?></p>
		</div>
