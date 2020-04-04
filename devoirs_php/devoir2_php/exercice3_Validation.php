


-----------------------------------------------

binom:  
           Amarigh Mustapha G1
           Farid Elkharrazi G2



------------------ Exercice 3 (partie 2)---------------------







 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <h1>validation de la date </h1>
<p>la date date saisir est : <b><?php echo $_POST['sl1']."/".$_POST['sl2']."/".$_POST['sl3']; ?></b></p>

<?php 

if($_POST['sl3']>=2000){
?>
<b>La date saisie  <span style="color: green;">est valide</span></b>
<?php }
else { ?>
	<b>l'anne <?php echo $_POST['sl3']; ?> est non bissextile :  <span style="color: red;">Date invalide</span></b>
<?php } ?>

 </body>
 </html>
