

-----------------------------------------------

binom:  
           Amarigh Mustapha G1
           Farid Elkharrazi G2



------------------ Exercice 2---------------------





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
			     	        {
			     	 	
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
			     	        echo substr($t,0,21)." ".strtoupper(substr($t,22)); ?></td>
			     	         

                          

                  <?php } ?>
			     	 

		       </tr>
	     <?php }
             

        

	      ?>
	           
	      
	    </table>


</body>
</html>