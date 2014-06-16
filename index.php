<?php require('header.php'); ?>
<main class="clearfix">
	<?php require('sidebar-left.php'); ?>
	<section id="content">
		<?php
			$site = $_GET["site"];
			if($site == '') {
				$inhalt = $inhalt + 1;
				$handle = fopen ($dateinamen, "w");
				fwrite ($handle, $inhalt);
				fclose ($handle);
				echo 'Startseite';
			} else {
				$path = $site . '.php';
				if(!file_exists($path)) {
					require('404.php');
				} else {
					require($path);
				}
			}
		?>
	</section>
	<?php require('sidebar-right.php'); ?>
</main>
<?php require('footer.php'); ?>
