<nav class="cbp-spmenu-s2 cbp-spmenu cbp-spmenu-bkg cbp-spmenu-vertical2 cbp-spmenu-left2" id="kleft_nav">

	<div class="containermenu">
		<div class="containermenuintern">
			<!-- <div class="sfm-sidebar-close" id="closesideleft"></div> -->

			<ul id="only-one" class="slidemenuContainer" data-accordion-group>

				<li>
					<?php

						$query = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page,m.code FROM pri_menusV5 m, users_menus u where m.code not in (1) and m.code_menu_maitre is null and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
					    $results = mysql_query($query);

						if (mysql_num_rows($results) > 0){
							while ($data = mysql_fetch_assoc($results)) {
								$menu_name = $data["nom_affichage"];
								$menu_icon = $data["icone"];
								$name_class = $data["nom"];
								$mainmenu_code = $data["code"];

								echo '<li data-accordion class="side_menu_left card '. (($varmenup == $mainmenu_code)?"open":null) .'" data-noms="'.$data["nom"].'">
										<a data-control class="multi side_menu_in '. (($varmenup == $mainmenu_code)?"collapsed activeleft ".$name_class."Click" :null) .'"><img src="assets/img/img_menu/'.$menu_icon.'" class="sidemenu_icons">
											<span>'. $menu_name .'</span><ins class="sfm-sm-indicator"><i class="glyph-icon"></i></ins>
										</a>

										<ul data-content>
											<div  data-accordion-group>';

											$query2 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page , m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre=". $data["code"]." and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
											$results2 = mysql_query($query2);

											if (mysql_num_rows($results2) > 0) {
												while ($data2 = mysql_fetch_assoc($results2)) {
													$menu_name = $data2["nom_affichage"];
													$menu_icon = $data2["icone"];
													$mainmenu_code2 = $data2["code"];

													echo '<li data-accordion class="'. (($varmenuss == $mainmenu_code2)?"open" :null) .'">
														<a data-control class="submenuside '. (($varmenuss == $mainmenu_code2)?"activeleftsub ".$name_class."Transparent" :null) .'"><img src="assets/img/img_menu/'.$menu_icon.'" class="sidesubmenu_icons">
															<span>'. $menu_name .'</span>
															<ins class="sfm-sm-indicator"><i class="glyph-icon"></i></ins>
														</a>

														<div data-content>';

															$query3 = "SELECT m.nom, m.icone, m.nom_affichage, m.nom_page,m.code FROM pri_menusV5 m, users_menus u where m.code_menu_maitre=". $data2["code"]." and u.code_user = ".$mycode." and u.code_menu = m.code order by m.ordre";
															$results3 = mysql_query($query3);

															if (mysql_num_rows($results3) > 0) {
																while ($data3 = mysql_fetch_assoc($results3)) {
																	$menu_name = $data3["nom_affichage"];
																	$link_menu = $data3["nom_page"];
																	$mainmenu_code3 = $data3["code"];

																	echo '<article><a href="#" data-code-nom="'.$data["nom_affichage"].'" data-code-nom2="'.$data2["nom_affichage"].'" data-code-nom3="'.$data3["nom_affichage"].'" data-href="'.$link_menu.'.php" class="submenusidesub" data-class="'.$name_class.'" style="color:'. (($menuactif == $mainmenu_code3)?"var(--".$name_class."-text)" :null) .';">- '. $menu_name .'</a></article>';
																}
																echo '</div>';
															}

												echo	'</li>';
												}
												echo '</div>';
											}


								echo 	'</ul>
										</li>';

									}
								}

					?>
				</li>

			</ul>

		</div>
	</div>
</nav>
