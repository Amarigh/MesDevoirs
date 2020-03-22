   devoir1 php

  Binome:
          Amarigh Mustapha G1
          Farid Elkharrazi  G2


------  Exercice1 ------------------------------------------------------------------------

<?php 

		$table = array('img1.jpg','imge2.jpg','img3.jpg' ,'img4.jpg','img5.jpg','img6.jpg');
		shuffle($table);

 ?>

 <!DOCTYPE html>
 <html>
    <head>
 	    <title>Exercice 1</title>
    </head>
    <body>
 	    <br>
 	    <h1 align="center">Délice des Fruits & Légumes </h1>
 	    <br>
        <table border="0"  style="margin:auto;">
    	    <tr>
    		
			       <th width="20%"><img src="<?php echo $table[0]; ?>"></th>
			       <th width="20%"><img src="<?php echo $table[1]; ?>"></th>
			       <th width="20%"><img src="<?php echo $table[2]; ?>"></th>

    	    </tr>
        </table>
    </body>
 </html>



 -------- Exercice2 --------------------------------------------------------------------------

<?php 

    $f=fopen('fichier.txt',"r");
    while(!feof($f))
		{

		$array[]=explode('|',fgets($f,500));

		}

    fclose($f);

    foreach ($array as  $value) 
    {
 	      $i=1;
 	     foreach ($value as  $val) 
 	     {
 	     	echo $val;
 	     	if($i++!=count($value)) echo "  |   ";

 	     }
 	     echo "<br>";
    }

?>		 

--------Exercice3------------------------------------------------------------------

<?php 

   $f=fopen("fichier.txt","r");
   while(!feof($f))
	   {

		$table[]=explode("|",fgets($f,500));
	   }

    fclose($f);

?>



<!DOCTYPE html>
<html>
    <head>
	    <title>exercice3</title>
		<style type="text/css">
			table
				{
					
					 width:90%;
				}
			th
				{

					text-align: enter;
					font-family: Arial, sans-serif;
					background-color:#33F0FF;
				}
			td
				{
					text-align: right;
					padding: 1.5%;
					padding-right: 0px;
				}
			.classe_0,.classe_<?php echo count($table[0])-1 ;?>
				{
				text-align: left;	
				padding: 1.5%;
					padding-left: 0px;
				}
		</style>
				 
    </head>
    <body>
		<h1>Central d'achats</h1>
		<h3>Comandes Clients</h3>

	    <table border="1px">
			<tr>
					<th>Numéro de<br>commande </th>
					<th>Numéro du<br>client</th>
					<th>Date de<br>commande</th>
					<th>Designation<br>article</th>
					<th>Quantité<br>(Pal)</th>
					<th>Prix unitaire<br>(dh)</th>
					<th>Date de<br>Livraison</th>
					<th>Adresse<br>Client </th>
			</tr>
		   <?php 
	             foreach ($table as $value) { 
	        ?> 
		        <tr>
			     	<?php 
			     	     foreach ($value as $key=>$val) {
			     	 	
			     	?>
			     	         <td class=" <?php echo "classe_$key" ?>"> <?php echo $val ?></td>
			     	<?php } ?>

		       </tr>
	     <?php } ?>
	           
	      
	    </table>

    </body>
</html>	 


-------------fichier.txt---------------
242005001 | 1236 | 24 octobre 2005 | Tomates | 4 | 4.0 | 26 octobre 2005 | 22 rue du Paradis, Fonty agadir
252005001 | 1235 | 25 octobre 2005 | Tomates | 6 | 3.5 | 28 octobre 2005 | 22 rue du Paradis, Fonty agadir
252005002 | 1234 | 25 octobre 2005 | Tomates | 8 | 3.0 | 30 octobre 2005 | 45 Avenue des Far, Casablanca