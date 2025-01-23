<?php
echo "
	<div id=\"globalmenu\">
		<div id=\"menushadow\"></div>
		<div id=\"globalnav\">
			<div id=\"globalmenu_top_bar\"></div>";
				
// -------------------------------- Dashboard menu ACTIV
			if ($activemenu_name == "dashboard") {
				echo "
				<a href=\"dashboard.php\" class=\"under_none\">
					<div class=\"menu_box_active_relative\">
						<div class=\"menu_box_active\">
				 			<img class=\"menu_head_icon_active\" src=\"images/icons/house.png\">
							<h3 class=\"menu_head\">Dashboard</h3>
						</div>
					</div>
				</a>
				<div class=\"submenu_box\">
					<a href=\"index.php\" class=\"under_none\">
						<h3 class=\"menu_subhead\"";
						// on this site show submenu black and bold
						if ($activesubmenu_name == "hjem") {echo "style=\"font-weight: bold;color:#000;\"";}
						echo">Hjem</h3>
					</a>
					<a href=\"guide.php\" class=\"under_none\">
						<h3 class=\"menu_subhead\"";
						// on this site show submenu black and bold
						if ($activesubmenu_name == "guide") {echo "style=\"font-weight: bold;color:#000;\"";}
						echo">Guide</h3>
					</a>
				</div>";
			}
// -------------------------------- Dashboard menu DEAVTIV
			else {
				echo "
				<a href=\"dashboard.php\" class=\"under_none\">
					<div class=\"menu_box_deactive_relative\">
						<div class=\"menu_box_deactive\">
				 			<div class=\"menu_head_icon_dashboard\"></div>
							<h3 class=\"menu_head\">Dashboard</h3>
						</div>
					</div>
				</a>";
			}
			// menu breaker
			echo "<div class=\"menu_break\"></div>";
// --------------------------------- SITES !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
			// menu breaker
			echo "<div class=\"menu_break\"></div>";
// --------------------------------- Users menu ACTIV
			if ($activemenu_name == "brugere") {
				echo "
				<a href=\"users.php\" class=\"under_none\">
					<div class=\"menu_box_active_relative\">
						<div class=\"menu_box_active\">
				 			<img class=\"menu_head_icon_active\" src=\"images/icons/users.png\">
							<h3 class=\"menu_head\">Brugere</h3>
						</div>
					</div>
				</a>
				<div class=\"submenu_box\">
					<a href=\"users.php\" class=\"under_none\">
						<h3 class=\"menu_subhead\"";
						// on this site show submenu black and bold
						if ($activesubmenu_name == "alle brugere") {echo "style=\"font-weight: bold;color:#000;\"";}
						echo">Alle Brugere</h3>
					</a>
					<a href=\"user-new.php\" class=\"under_none\">
						<h3 class=\"menu_subhead\"";
						// on this site show submenu black and bold
						if ($activesubmenu_name == "tilfør ny") {echo "style=\"font-weight: bold;color:#000;\"";}
						echo">Tilfør ny</h3>
					</a>
						<a href=\"profile.php\" class=\"under_none\">
							<h3 class=\"menu_subhead\"";
							// on this site show submenu black and bold
							if ($activesubmenu_name == "din profil") {echo "style=\"font-weight: bold;color:#000;\"";}
							echo">Din Profil</h3>
						</a>
				</div>";
			}
// -------------------------------- Users menu DEAVTIV
			else {
				echo "
				<a href=\"users.php\" class=\"under_none\">
					<div class=\"menu_box_deactive_relative\">
						<div class=\"menu_box_deactive\">
							<div class=\"menu_head_icon_users\"></div>
							<h3 class=\"menu_head\">Brugere</h3>
						</div>
					</div>
				</a>";
			}
// --------------------------------- Settings menu ACTIV
			if ($activemenu_name == "indstillinger") {
				echo "
				<a href=\"settings-general.php\" class=\"under_none\">
					<div class=\"menu_box_active_relative\">
						<div class=\"menu_box_active\">
				 			<img class=\"menu_head_icon_active\" src=\"images/icons/settings.png\">
							<h3 class=\"menu_head\">Indstillinger</h3>
						</div>
					</div>
				</a>
				<div class=\"submenu_box\">
					<a href=\"settings-general.php\" class=\"under_none\">
						<h3 class=\"menu_subhead\"";
						// on this site show submenu black and bold
						if ($activesubmenu_name == "generelle") {echo "style=\"font-weight: bold;color:#000;\"";}
						echo">Generelle</h3>
					</a>
				</div>";
			}
// -------------------------------- Settings menu DEAVTIV
			else {
				echo "
				<a href=\"settings-general.php\" class=\"under_none\">
					<div class=\"menu_box_deactive_relative\">
						<div class=\"menu_box_deactive\">
							<div class=\"menu_head_icon_settings\"></div>
							<h3 class=\"menu_head\">Indstillinger</h3>
						</div>
					</div>
				</a>";
			}

			echo "
		</div>
		<div id=\"menushadow\"></div>
	</div>";
?>