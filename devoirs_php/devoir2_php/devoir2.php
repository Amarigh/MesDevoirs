
-----------------------------------------------

binom:  
           Amarigh Mustapha G1
           Farid Elkharrazi G2



------------------ Exercice 1----------------------------------------------------------------------------






 <?php 

function explode_($string,$car){
	$str='%['.$car.']%';
  
     return preg_split($str,$string);

     // la fonction preg_splite() Fractionne une chaîne par une expression régulière
     // return array 
     //preg_split ( chaîne $pattern , chaîne $subject [, int $limit= -1 [, int $flags= 0 ]]): tableau

// ou bien on utilise la fonction explode 
     // explode Fractionner une chaîne par une chaîne

     // return explode($car,$string);

}



 ?>  

 
--------------------------------------------------------------------------------------------------------------------------------------


------------------ Exercice 2------------------------------------------------------------------------





<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

        <h3 style="text-align: center;">Commandes Clients</h3>
	    <table border="1px" style="margin:auto;">
			<tr>
					<th>Numéro de commande </th>
					<th>Numéro du client</th>
					<th>Date de commande</th>
					<th>Designation article</th>
					<th>Quantité (Pal)</th>
					<th>Prix unitaire (HT)</th>
					<th>Date de Livraison</th>
					<th>Adresse Client </th>
			</tr>


		   <?php 
                  

                  $f=fopen('./clients.txt',"r");
                  	while(!feof($f))
                  	{   $ligne=fgets($f,1000000);
                       $array=explode('|',$ligne);
                  	
                  	
                  

	             
	              ?> 
		                 <tr>
			     	     <?php 

			     	         
			     	       if(strtolower($array[1])==strtolower(" cli1001"))

			     	        {   //  strtolower fonction de chaine de carractére  retourne la chaîne avec tous les caractères en minuscule
			     	 	     

			     	 	     // ucwords fonction de chaine de carractére  retourne la chaîne avec toutes les initiales des mots qui la composent en majuscules. 

			     	        // strtolower fonction de chaine de carractére  retourne la chaîne avec tous les caractères en majuscules
			     	 	     
			     	   ?>
			     	         <td class=" "> <?php echo $array[0] ?></td>
			     	         <td class=" "> <?php echo strtoupper($array[1]) ?></td>
			     	         <td class=" "> <?php echo $array[2] ?></td>
			     	         <td class=" "> <?php echo ucwords($array[3]) ?></td>
			     	         <td class=" "> <?php echo $array[4] ?></td>
			     	         <td class=" "> <?php echo $array[5] ?></td>
			     	         <td class=" "> <?php echo $array[6] ?></td>
			     	         <td class=" "> <?php echo ucwords($array[7]) ?></td>






			     	        <?php 
			     	        }

			     	        else{ ?>


                           <td class=" "> <?php echo $array[0] ?></td>
			     	         <td class=" "> <?php echo strtoupper($array[1]) ?></td>
			     	         <td class=" "> <?php echo $array[2] ?></td>
			     	         <td class=" "> <?php echo ucwords($array[3]) ?></td>
			     	         <td class=" "> <?php echo $array[4] ?></td>
			     	         <td class=" "> <?php echo $array[5] ?></td>
			     	         <td class=" "> <?php echo $array[6] ?></td>
			     	         <td class=" "> <?php 
			     	           $t=ucwords($array[7]);
			     	        echo substr($t,0,21)." ".strtoupper(substr($t,22)); 

                             // substr()   Retourne une partie d'une chaîne 
			     	        ?></td>
			     	         

                          

                  <?php } ?>
			     	 

		       </tr>
	     <?php }
             

        

	      ?>
	           
	      
	    </table>


</body>
</html>

----------------------------------------------------------------------------------------------------------------




------------------ Exercice 3 -------------------------------------------------------------------------------------


--------------- partie 1 choisition de date -----------


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

                        // avec la boucle for en ajoute tous les options de jours , mois et années 

					   	for ($i=2; $i <32 ; $i++) { 
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


--------------------- partie 2 validation de date


 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <h1>validation de la date </h1>
  <p>la date date saisir est : <b><?php echo $_POST['sl1']."/".$_POST['sl2']."/".$_POST['sl3']; ?></b></p>



  <?php 

  // la date est valide si la l'anne >= 2000
  // en utilise supervariable $_POST[]

if($_POST['sl3']>=2000){

 ?>

<b>La date saisie  <span style="color: green;">est valide</span></b>

<?php }

else { ?>

	<b>l'anne <?php echo $_POST['sl3']; ?> est non bissextile :  <span style="color: red;">Date invalide</span></b>


<?php } ?>

 </body>
 </html>

----------------------------------------------------------------------------------------------


---------------Exercice 4 ----------------------------------------------------------------------------------------------


------------------ partie 1  Aceuil.php  ---------------------


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post"  action="authentification(exercice4).php">


	<label for="login">Login </label><input type="email" name="login" id="login" placeholder="login"><br>
	<label for="pwd">mot de passe</label><input type="password" name="pwd" id="pwd" placeholder="mot de passe"><br>
	<input type="submit" name="ok" value="ok">
	



</form>
</body>
</html>



------------------ partie 2  Authentification.php ---------------------




<?php 
// la fonction email permet de valider email
// les condition sur email est  
// ????@???.????

function email($log){

	if(preg_match('/.+@.+\..{2,4}/', $log)) return true;
	else return false;
}


//  la fonction mpasse permet de valider mot de passe 
// les condition son
// - au moin 8 carractère
// - contien un nombre [0-9]
//- contien un carractère special [*&%$#@!?]
// - contien un carractère Majuscule [A-Z]

  function mpasse($pass)
 {
        if(strlen ($pass)<8)
        {
            return false ;
        }
    else if (!preg_match('/[0-9]/',$pass) ||!preg_match('/[A-Z]/',$pass) || !preg_match('/[*&%$#@!?]/',$pass))
        {
            return false ;
        }
        else 
        return true;

}



 

 ?>







<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>L'authentification</h1>
<?php 
        if( email($_POST['login']) && mpasse($_POST['pwd']) ) {

             
               // verification de mot de passe et email



             if( strtolower(trim($_POST['login']," "))==strtolower(trim("toto@cocomail.com"," ")) &&  trim("123Autr?"," ") == trim($_POST['pwd']," ")){

             	echo "Authentification réussie";
             }

             
             elseif( strtolower($_POST['login'])==strtolower("sanfour@gmail.com")  && trim($_POST['pwd']," ")==trim("Asb23lk!"," ")  ){

             	echo "Authentification réussie";
             }


             elseif( strtolower($_POST['login'])==strtolower("ahlanWar@hotmail.com")  && trim($_POST['pwd']," ")==trim("Aqruy&0tyu"," ")  )
             {

             	echo "Authentification reussie";
             }
          
            else{

               echo "login n'exit pas ";
                 




            }


        }

        else{

        	echo "mode passe  ou format d'email incorrecte ";
        }
 ?>
</body>
</html>

--------------------------------------------------


