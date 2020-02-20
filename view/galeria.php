<?php
session_start();
require_once('../controller/multimedia.controller.php');
if(!empty($_SESSION['nombres'])) {
	include("include/headerPerfil.php");
} else {
	include("include/header.php");
}
$MultimediaController = new MultimediaController();
?>
<!DOCTYPE html>

<html lang="es">

<body>
	<div class="row">
		<div class="col-md-12">
			<div id="galery">
				<h3 id="titgallery"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</h3>
				<div id="carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel" data-slide-to="0" class="active"></li>
						<li data-target="#carousel" data-slide-to="1"></li>
						<li data-target="#carousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="assets/img/img1.jpg" alt="Chania">
						</div>
						<div class="item">
							<img src="assets/img/img2.jpg" alt="Chania">
						</div>
						<div class="item">
							<img src="assets/img/img3.jpg" alt="Flower">
						</div>
					</div>
					<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
						<i class="fa fa-2x fa-reply" aria-hidden="true"></i>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
						<i class="fa fa-2x fa-share" aria-hidden="true"></i>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<hr id="linea" />
	<div class="row">
		<div class="col-md-12">
			<h3 id="titgallery"><i class="fa fa-video-camera" aria-hidden="true"></i> Video</h3>
			<div class="col-md-6">
				<video id="video" controls>
					<source src="assets/video/Intro.mp4" type="video/mp4">
				</video>
			</div>
			<div class="col-md-6">
				<video id="video" controls>
					<source src="assets/video/Intro.mp4" type="video/mp4">
				</video>
			</div>
		</div>
	</div>
</body>
</html>
<?php
	include("include/footer.php");
?>