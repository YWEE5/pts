<aside id="sidebar-right">
	<div id="login">
		<?php
		 if(isset($_SESSION['UserID'])) {
			echo"Hallo,".$_SESSION['Vorname'];
			echo"<br/>";
			echo "<a href='?site=logout'>Logout</a><br />";
		} else {
			echo "<a href='?site=login'>Login</a><br />";
		}
		?>
		<a href="?site=register">Registrieren</a>
	</div>
	<div id="video">
		Video
	</div>
</aside>