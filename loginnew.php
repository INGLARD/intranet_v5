<?php
		session_start();
		include("connexion.php");
		echo $pseudo_membre = isset($_POST["username"]) ? $_POST["username"] : "";
		echo $passe_membre = isset($_POST["password"]) ? $_POST["password"] : "";
		//$query = "select * from pri_users where login = '$pseudo_membre' and mdp = '$passe_membre' and nb_erreurs <= 3 and actif = 'O' and mdp_perdu = 'N'";
		$query = "select * from pri_users where login = '$pseudo_membre' and mdp = '$passe_membre' and actif = 'O' and mdp_perdu = 'N'";
		$results = mysql_query($query) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		if (mysql_num_rows($results) == 1)
		{
			// La connexion est bonne
			// Mise à jour du code md5 de l'utilisateur
			$codemd5 = md5($pseudo_membre);
			mysql_query("update pri_users set md5code = '$codemd5' where login = '$pseudo_membre'");
			
			$query = "SELECT u.prenom prenom,u.num_coffre, u.nom nom, u.code code, t.code typeuser, t.nom fonction, e.nom_long enseigne, e.nom_court nenseigne, e.code codeenseigne, m.code_magasin mag FROM pri_users u, pri_typeusers t, pri_enseignes e, users_magasins m WHERE md5code = '$codemd5' AND t.code = u.type_user AND e.code = u.code_enseigne AND m.code_user = u.code";
			$results = mysql_query($query) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$data = mysql_fetch_assoc($results);
			if (mysql_num_rows($results) > 0)
			{
				$_SESSION['utilisateur'] = $data["prenom"]." ".$data["nom"];
				$_SESSION['codeutilisateur'] = $data["code"];
				$_SESSION['typeutilisateur'] = $data["typeuser"];
				$_SESSION['fonctionutilisateur'] = $data["fonction"];
				$_SESSION['enseigneutilisateur'] = $data["enseigne"];
				$_SESSION['ncenseigneutilisateur'] = $data["nenseigne"];
				$_SESSION['codeenseigne'] = $data["codeenseigne"];
				$_SESSION['magutilisateur'] = $data["mag"];
				$_SESSION['md5utilisateur'] = $codemd5;
				$_SESSION['numcoffre'] = $data["num_coffre"];
				$_SESSION['prenom'] = $data["prenom"];
			}
			if(!$_SESSION['quantity']){
				$_SESSION['quantity']=array();

				}
				
			mysql_free_result($results);
			include("deconnexion.php");
			// Redirection vers la nouvelle page (connexion reussie)
			header("Location: index.php?use=$codemd5");
		}
		/* else
		{
			// Probleme dans la connexion (mauvais mdp, non actif, nb erreurs >= 3, mdp perdu)
			$codemd5 = md5($pseudo_membre);
			$query = "select * from pri_users where login = '$pseudo_membre'";
			$results = mysql_query($query) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
			$data = mysql_fetch_assoc($results);
			if (($data["nb_erreurs"] >= 3) OR ($data["actif"] <> 'O') OR ($data["mdp_perdu"] <> 'N'))
			{
				// Si non actif, nb erreurs >= 3, mdp perdu
				if ($data["mdp_perdu"] == 'O')
				{
					// Si mdp perdu, on réactive le user, nb erreurs = 0, mdp perdu : non
					mysql_query("update pri_users set actif = 'O', nb_erreurs = 0, mdp_perdu = 'N' where login = '$pseudo_membre'");
					mysql_free_result($results);
					include("deconnexion.php");
					// Redirection vers la nouvelle page (connexion reussie apres saisie du nouveau mot de passe)
					header("Location: index.php?use=$codemd5&menu=princip");
				}
				else
				{
					// Sinon Envoi d'un mail pour informer que le user à un probleme avec son mot de passe
					$message = "$pseudo_membre : ".$data["nb_erreurs"]." erreurs - Actif :".$data["actif"]." - Mdp perdu :".$data["mdp_perdu"]." IP : ".$_SERVER["REMOTE_ADDR"];
					mail('didier.ontiveros@blachere.fr', 'Pbs Login BBG', $message);
					mysql_free_result($results);
					include("deconnexion.php");
					header("Location: log.php");
				}
			}
			else
			{
				// Si il s'est trompé de mot de passe
				if (mysql_num_rows($results) <> 0)
				{
					// Mise a jour du nombre d'erreurs de login
					mysql_query("update pri_users set nb_erreurs = nb_erreurs + 1 where login = '$pseudo_membre'");
					// Si 3 ou plus erreurs de login => utilisateur désactivé en attente de demande de changement de mot de passe
					//mysql_query("update pri_users set actif = 'V' where login = '$pseudo_membre' and nb_erreurs >= 3 and actif = 'O'");
					mysql_free_result($results);
					include("deconnexion.php");
					// Redirection vers la saisie des login et mot de passe
					header("Location: log.php");
				}
			}
		}*/
		
	?>
	