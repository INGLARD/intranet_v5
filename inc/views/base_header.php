<?php
if (session_id() == "") {session_start();}
include('./inc/connection/connexion.php');
include('./inc/connection/connexion_postgr.php');
include('./inc/connection/connexion_pdo.php');
$mycode = $_SESSION['codeutilisateur'];
$code_enseigne = $_SESSION['codeenseigne'] ;
$mag_util = $_SESSION['magutilisateur'] ;
$typ_util = $_SESSION['typeutilisateur'];

?>

		<div class="nav-content-end">
			<div class="nav-expand-button">
                <button id="fullscreen-btn" type="button">
					<i class="glyph-icon icon-arrows-alt nav-right-icons" id="nav-expand-icon"></i>
				</button>
            </div>


			<div class="dropdown nav-favorites-button">
				<button type="button" id="dropdownFavorite" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="glyph-icon favorite-add-star nav-right-icons" id="nav-favorites-icon"></i>
                </button>

				<div class="dropdown-menu box-md float-right" aria-labelledby="dropdownFavorite">
					<div class="popover-title display-block clearfix pad10A titlefav">Vos Favoris
						<a class="text-transform-cap font-primary font-normal btn-link float-right" href="#" title="View more options">
							Parametres...
						</a>
					</div>
					<div class="scrollable-content scrollable-slim-box">
						<ul class="no-border notifications-box">
							<li>
								<span class="bg-warning icon-notification glyph-icon icon-calendar"></span>
								<span class="notification-text">Plannings Vente</span>

							</li>
							<li>
								<span class="bg-warning icon-notification glyph-icon icon-calendar"></span>
								<span class="notification-text ">Planning Prepa</span>

							</li>
							<li>
								<span class="bg-warning icon-notification glyph-icon icon-calendar"></span>
								<span class="notification-text ">Planning Boulangerie</span>

							</li>
							<li>
								<span class="bg-azure icon-notification glyph-icon icon-linecons-shop"></span>
								<span class="notification-text">Commande transgourmet</span>

							</li>
							<li>
								<span class="bg-warning icon-notification glyph-icon icon-linecons-user"></span>
								<span class="notification-text">DPAE</span>

							</li>
							<li>
								<span class="bg-blue icon-notification glyph-icon icon-random"></span>
								<span class="notification-text">Fiche Auto évaluation</span>
							</li>
						</ul>
					</div>

				</div>
			</div>


			<div class="dropdown nav-tasks-button">
				<button type="button" id="dropdownTasks" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<!-- <span class="small-badge bg-red">8</span> -->
					<i class="glyph-icon icon-linecons-doc nav-right-icons" id="nav-tasks-icon"></i>
				</button>

				<div class="dropdown-menu box-md float-right" aria-labelledby="dropdownTasks">

					<div class="popover-title display-block clearfix pad10A titletache">
						Vos Taches
					</div>

					<div class="scrollable-content scrollable-slim-box">
						<div class="panel-body">
							<ul class="no-border notifications-box">
								<li>
									<span class="bg-danger icon-notification glyph-icon icon-calendar"></span>
									<span class="notification-text">Validation des plannings</span>
									<div class="notification-time">
										1 heure
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>
								<li>
									<span class="bg-warning icon-notification glyph-icon icon-signal"></span>
									<span class="notification-text ">Saisie des CA prévisionnels</span>
									<div class="notification-time">
										<b>15</b> minutes
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>
								<li>
									<span class="bg-green icon-notification glyph-icon icon-file"></span>
									<span class="notification-text ">DPAE : en attente de documents</span>
									<div class="notification-time">
										<b>2 heures</b>
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>
								<li>
									<span class="bg-azure icon-notification glyph-icon icon-th-list"></span>
									<span class="notification-text">Questionnaire de formation</span>
									<div class="notification-time">
										quelques secondes
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>
								<li>
									<span class="bg-warning icon-notification glyph-icon icon-check"></span>
									<span class="notification-text">Auto évaluation non remplie</span>
									<div class="notification-time">
										<b>15</b> minutes
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>
								<li>
									<span class="bg-blue icon-notification glyph-icon icon-random"></span>
									<span class="notification-text">T5.</span>
									<div class="notification-time">
										<b>2 heures</b>
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>
								<li>
									<span class="bg-purple icon-notification glyph-icon icon-sort"></span>
									<span class="notification-text">Gestion du stock</span>
									<div class="notification-time">
										quelques seconds
										<span class="glyph-icon icon-clock-o"></span>
									</div>
								</li>

							</ul>
						</div>
					</div>

					<div class="pad10A button-pane button-pane-alt text-center">
						<button type="button" class="btn btn-primary">Voir toutes les alertes</button>
					</div>
				</div>
			</div>


			<div class="dropdown nav-chat-button">
				<button type="button" id="dropdownChat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<!-- <span class="small-badge bg-red">3</span> -->
					<i class="glyph-icon icon-linecons-comment nav-right-icons" id="nav-chat-icon"></i>
				</button>

				<div class="dropdown-menu box-md float-right" aria-labelledby="dropdownChat">
					<div class="popover-title display-block clearfix pad10A titletchat">
						Contactez votre service Informatique
					</div>

					<div class="scrollable-content scrollable-slim-box">
						<div class="panel-body">
							<ul class="chat">
								<li class="left clearfix">
									<span class="chat-img pull-left">
									<img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
										<span class="glyph-icon icon-clock-o"></span>12 mins ago</small>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
										dolor, quis ullamcorper ligula sodales.
									</p>
								</div>
								</li>
								<li class="right clearfix"><span class="chat-img pull-right">
									<img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
								</span>
								<div class="chat-body clearfix">
									<div class="header">
										<small class=" text-muted"><span class="glyph-icon icon-clock-o"></span>13 mins ago</small>
										<strong class="pull-right primary-font">Bhaumik Patel</strong>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
										dolor, quis ullamcorper ligula sodales.
									</p>
								</div>
							</li>
							<li class="left clearfix"><span class="chat-img pull-left">
								<img src="http://placehold.it/50/55C1E7/fff&amp;text=U" alt="User Avatar" class="img-circle">
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
										<span class="glyph-icon icon-clock-o"></span>14 mins ago</small>
									</div>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
										dolor, quis ullamcorper ligula sodales.
									</p>
								</div>
							</li>
							<li class="right clearfix"><span class="chat-img pull-right">
								<img src="http://placehold.it/50/FA6F57/fff&amp;text=ME" alt="User Avatar" class="img-circle">
							</span>
							<div class="chat-body clearfix">
								<div class="header">
									<small class=" text-muted"><span class="glyph-icon icon-clock-o"></span>15 mins ago</small>
									<strong class="pull-right primary-font">Bhaumik Patel</strong>
								</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare
									dolor, quis ullamcorper ligula sodales.
								</p>
							</div>
						</li>
					</ul>
				</div>

				<div class="panel-footer">
					<div class="input-group">
						<input id="btn-input" class="form-control input-sm inputtchat" placeholder="Type your message here..." type="text">
						<span class="input-group-btn">
							<button class="btn btn-warning btn-sm" id="btn-chat">
								Send</button>
							</span>
						</div>
					</div>
				</div>
			</div>
			</div>


		<div class="dropdown nav-settings-button">
			<button type="button" id="dropdownSettings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="glyph-icon icon-linecons-cog nav-right-icons" id="nav-settings-icon"></i>
			</button>

			<div class="dropdown-menu float-right settings-button" aria-labelledby="dropdownSettings">
				<div class="box-sm">
					<div class="popover-title display-block clearfix pad10A titleparam">
						Mes paramètres
					</div>

					<div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
						<a href="#" class="btn vertical-button param hover-blue-alt" title="">
							<span class="glyph-icon icon-separator-vertical pad0A medium">
								<i class="glyph-icon icon-star opacity-80 font-size-20"></i>

							</span>Modifier <br>mes favoris

						</a>
						<a href="#" class="btn vertical-button param hover-green" title="">
							<span class="glyph-icon icon-separator-vertical pad0A medium">
								<i class="glyph-icon icon-wrench opacity-80 font-size-20"></i>
							</span>
							Changer <br />le fond d'écran
						</a>
						<a href="#" class="btn vertical-button param hover-orange" title="">
							<span class="glyph-icon icon-separator-vertical pad0A medium">
								<i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
							</span>
							Menu <br> automatique
						</a>
						<a href="#" class="btn vertical-button param hover-orange" title="">
							<span class="glyph-icon icon-separator-vertical pad0A medium">
								<i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
							</span>
							Modifier <br> les polices
						</a>
						<a href="#" class="btn vertical-button param hover-purple" title="">
							<span class="glyph-icon icon-separator-vertical pad0A medium">
								<i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
							</span>
							Modifier <br> les boutons

						</a>
						<a href="#" class="btn vertical-button param hover-azure" title="">
							<span class="glyph-icon icon-separator-vertical pad0A medium">
								<i class="glyph-icon icon-code opacity-80 font-size-20"></i>
							</span>
							Modifier <br> les alertes
						</a>
					</div>

					<div class="popover-title display-block clearfix pad10A titleparam">
						mes thèmes de couleurs
					</div>

					<div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix themes_dashboard">

						<?php
						// AFFICHE LES DIFFERENTS THEMES
						$resultats1=$dbconn2->prepare("SELECT * FROM intranet.int_themes WHERE id_company=$code_enseigne ORDER BY ordre ASC");
						$resultats1->execute();
						$resultats1->setFetchMode(PDO::FETCH_OBJ); // Récupére le nom des colonnes de la table

						while( $data = $resultats1->fetch() )    // Parcours de chaque ligne ramené par le select
						{
							$theme_id = $data->id;
							$funtion_theme = $data->function_to_launch;
							$class = $data->class_to_apply;
							$theme = $data->display_name;
							$theme_css = $data->function_param;
							$theme_css = "'$theme_css'";

							echo '<a href="index.php" class="btn vertical-button '.$class.'" title="" onClick="'.$funtion_theme.'('.$theme_id.','.$theme_css.')">';
							echo' <span class="glyph-icon icon-separator-vertical pad0A medium">'. $theme.'</span>';
							echo '</a>';
						}
						$resultats1 = null;

						?>

						</div>

						<div class="popover-title display-block clearfix pad10A titleparam">
							fond d'écran
						</div>

						<div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix  backgrounds_dashboard">
							<a href="#" class="btn vertical-button  picchangeDefault" title="" id="default_bg" onClick="bgChangeDefault()">
								<span class="glyph-icon icon-separator-vertical pad0A medium">
									<i class="format-frame-landscape" ></i>
								</span>

							</a>
							<a href="#" class="btn vertical-button  picchange01" title=""  id="01_bg" onClick="bgChange1()">
								<span class="glyph-icon icon-separator-vertical pad0A medium">
									<i class="format-frame-landscape" ></i>
								</span>

							</a>

						</div>

					</div>

					<div class="pad10A button-pane button-pane-alt text-center">
						<a href="unlog4.php" class="btn btn-danger">
							<i class="glyph-icon icon-power-off"></i>
							Deconnexion
						</a>
					</div>
				</div>
			</div>

		</div>

	</nav>

</header>
<!-- header end -->

<div id='page'>
