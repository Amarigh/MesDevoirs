

-----------------------------------------------

binom:  
           Amarigh Mustapha G1
           Farid Elkharrazi G2



------------------ Exercice 3 (partie 1)---------------------




<!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<h1>choisir une date</h1>
<form method="post"  action="./exercice3_Validation.php">
<table border="0">
	
	<tr>
		<td><b>Jour</b></td>
		<td><b>Moi</b></td>
		<td><b>Annee</b></td>
	</tr>
	<tr>
		<td>
			
					   <select name="sl1">
					   	<option value="1" selected="selected">1</option>
					   	<?php 
					   	for ($i=1; $i <32 ; $i++) { 
					   		?>
					   			<option value="<?php echo $i; ?>" ><?php echo $i; ?></option>
					   	
					   	<?php  }
					   	 ?>
					   

					   </select>
		</td>

         <td>
         	
           
			   <select name="sl2">
			   	<option value="1" selected="selected">1</option>
			   	<?php 
			   	for ($i=2; $i <13 ; $i++) { 
			   		?>
			   			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			   	
			   	<?php  }
			   	 ?>
			   

			   </select>

         </td>
         <td>
         	
    
		   <select name="sl3">
		   	<option value="1900" selected="selected" name="a1900">1900</option>
		   	<?php 
		   	for ($i=1901; $i <2021 ; $i++) { 
		   		?>
		   			<option value="<?php echo $i; ?>" name="<?php echo "a".$i ; ?>"><?php echo $i; ?></option>
		   	
		   	<?php  }
		   	 ?>
		   

		   </select>

         </td>

	</tr>
</table>

<input type="submit" name="ok" value="Envoyer">

</form>




   
   
   	

 </body>
 </html>
