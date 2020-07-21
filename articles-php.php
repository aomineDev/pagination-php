<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Paginación | Ajax</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./assets/css/styles.css">
  <link rel="shortcut icon" href="https://aomineDev.github.io/ico/aomine.ico">
</head>
<body>
	<div class="app">

		<div class="wave wave-1">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="#0099ff" fill-opacity="1" d="M0,96L48,80C96,64,192,32,288,32C384,32,480,64,576,85.3C672,107,768,117,864,112C960,107,1056,85,1152,85.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
			</svg>
		</div>

		<div class="wave wave-2">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
				<path fill="#0099ff" fill-opacity="1" d="M0,96L48,80C96,64,192,32,288,32C384,32,480,64,576,85.3C672,107,768,117,864,112C960,107,1056,85,1152,85.3C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
			</svg>
		</div>

		<div class="container"> <!-- Solo para las animaciones -->
			<section class="articles">
				<h1 class="articles-title">Artículos</h1>
				<ul class="article-wrapper" id="article-wrapper">
				<?php
					require_once "./server/pagination.php";

					while($article = mysql_fetch_object($query)):
				?>
					<li class="article">
						<span class="article-index"><?= $article->ID ?> </span><?= $article->lista ?>
					</li>
				<?php endwhile; ?>
				</ul>
			</section>
		
			<section class="pagination">
				<a class="pagination-link <?php if ($page == 1) {echo 'disable';} ?>" href="<?php echo "?page=$prevPage" ?>">
					<span>&laquo;</span>
				</a>
				<a class="pagination-link <?php if ($page == 1) {echo 'active';} ?>" href="?page=1">
					<span>1</span>
				</a>
				<a class="pagination-link <?php if ($page == 1) {echo 'active';} ?>" href="?page=2">
					<span>2</span>
				</a>
				<a class="pagination-link <?php if ($page == 1) {echo 'active';} ?>" href="?page=3">
					<span>3</span>
				</a>
				<a class="pagination-link <?php if ($page == 1) {echo 'active';} ?>" href="?page=4">
					<span>4</span>
				</a>
				<a class="pagination-link <?php if ($page == 4) {echo 'disable';} ?>" href="<?php echo "?page=$nextPage" ?>">
					<span>&raquo;</span>
				</a>
			</section>
		</div>
	</div>

	<footer class="footer">
		<p class="footer-text">Design by <a href="#!" class="footer-link">Diego Valerio</a></p>
	</footer>

  <script src="./assets/js/app.js"></script>
</body>
</html>