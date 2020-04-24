<?php
session_start();
include("layoutfirst.php");


include("d_base.php");

$d_base = new d_base();
$db = null;
$db = $d_base->init($db);

?>


<?php

if (isset($_GET['ajouter'])) {

	if ($_GET['ajouter'] == 'ajouter') {

		if ($_SESSION['connection'] == 0) {

			echo '<script>window.location="login.php#login"</script>';
		} else {
			if (empty($_SESSION['id_produits'])) {
				$_SESSION['id_produits'] = $_GET['id'];
				echo "<script>alert('le produit est ajouter à votre panier') </script>";
			} else {
				if (preg_match('/' . $_GET['id'] . '/', $_SESSION['id_produits'])) {
					echo "<script>alert('le produit est  déja ajouter à votre panier') </script>";
				} else {
					$_SESSION['id_produits'] = $_SESSION['id_produits'] . "|" . $_GET['id'];
					echo "<script>alert('le produit est ajouter à votre panier') </script>";
				}
			}
			echo '<script>window.location="produit.php#p8"</script>';
		}
	}
}





?>





<?php

$reponse =  $db->prepare('select * from produits');

$reponse->execute();


?>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Accueil</a></span> <span>Produits</span></p>
				<h1 class="mb-0 bread">Collection Produits</h1>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section bg-light">
	<div class="container">

		<div class="col-md-8 col-lg-10 order-md-last">
			<div class="row">

				<?php

				while ($resulte = $reponse->fetch()) {




				?>


					<!-- produits -->
					<div class="col-sm-6 col-md-6 col-lg-4 ftco-animate">
						<div class="product" id="p<?php echo $resulte['ID'] ?> pr">
							<a href="<?php echo $resulte['IMAGE']; ?>" class="img-prod"><img style="min-width: 100%;" class="img-fluid" src="<?php echo $resulte['IMAGE']; ?>" alt="Colorlib Template">

								<div class="overlay"></div>
							</a>
							<div class="text py-3 px-3">
								<h3><a href="#"><?php echo $resulte['NAME'] ?></a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span class="mr-2 price-dc"><?php echo $resulte['PRIX'] + 3;
																						echo " $" ?></span><span class="price-sale"><?php echo $resulte['PRIX'] . " $"; ?></span></p>
									</div>
									<div class="rating">
										<p class="text-right">
											<a href="#"><span class="ion-ios-star-outline"></span></a>
											<a href="#"><span class="ion-ios-star-outline"></span></a>
											<a href="#"><span class="ion-ios-star-outline"></span></a>
											<a href="#"><span class="ion-ios-star-outline"></span></a>
											<a href="#"><span class="ion-ios-star-outline"></span></a>
										</p>
									</div>
								</div>


								<p class="bottom-area d-flex px-3">

									<a href="produit.php?ajouter=ajouter&id=<?php echo $resulte['ID'] ?>" class="add-to-cart text-center py-2 mr-1"><span>Ajoute au Panier <i class="ion-ios-add ml-1"></i></span></a>


								</p>

							</div>
						</div>
					</div>

				<?php } ?>
				<!-- fin de produits -->
			</div>

		</div>


	</div>
</section>



<?php
include("layoutlast.php");

?>