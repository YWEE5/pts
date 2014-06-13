<aside id="sidebar-right">
	<div id="login">
		<form>
			Benutzername<br />
			<input type="text" name="name"><br />
			Passwort<br />
			<input type="text" name="password"><br />
			<input type="submit" value="Login">
		</form>
		<?php
		 if(isset($_SESSION['UserID'])) {
			echo"Hallo,".$_SESSION['Vorname'];
			echo"<br/>";
			echo "<a href='?site=logout'>Ausloggen</a><br />";
		} else {
			echo "<a href='?site=login'>Bitte einloggen</a><br />";
		}
		?>
		<a href="?site=register">Registrieren</a>
	</div>
	<div id="video">
		Video
	</div>
</aside>