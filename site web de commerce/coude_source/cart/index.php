<?php 
session_start();

   try{
      $db=new PDO('mysql:host=localhost;dbname=id12948400_php','id12948400_root','Mama199775026');
      }
   catch(PDOException $e){
      echo $e->getMessage();
   }



   
   $reponse=$db->prepare('select * from Produit');

     $reponse->execute();


   if(! isset($_POST["envoi"])) $_POST["envoi"]="";
   if(! isset($_SESSION["cart"])) $_SESSION["cart"]=[];



   if(isset($_POST["add"]))
        {
    	if(isset($_SESSION["cart"]))
        	{
        		    $count=count($_SESSION["cart"]);
        		
        		
        			$etim_array = array( 'product_id'=>$_GET['id'] ,
                                        'item_name' =>$_POST['hidden-name'],
                                        'product_price'=>$_POST['hidden-price'],
                                        'item_quantity'=>$_POST['quantity'],

        			                    );
        			$_SESSION["cart"][$count]=$etim_array;
        			echo '<script>window.location="index.php"</script>';

        		


        }else
            	    {
            	    	$etim_array = array( 'product_id'=>$_GET['id'] ,
                                            'item_name' =>$_POST['hidden-name'],
                                            'product_price'=>$_POST['hidden-price'],
                                            'item_quantity'=>$_POST['quantity'],

            			                    );
            	    	$_SESSION["cart"][0]=$etim_array;
                        
            	    }
       }

    if(isset($_GET["action"]))
    {
	   if($_GET["action"]=="delete")
       {
		  foreach ($_SESSION["cart"] as $key => $value) 
             {

			     if($value['product_id']==$_GET['id'])
                     {
    				       unset($_SESSION["cart"][$key]);
    				        echo '<script>alert("le product est supprimer  ")</script>';
    				        echo '<script>window.location="index.php"</script>';
    			    }
		    }
	   }
   }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
     	<title>Panier</title>
     	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     	 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     	<link rel="stylesheet" type="text/css" href="../css/panier.css">
 </head>
 <body>
     <?php  include('../layout.php');?>
     <br>
 <div class="container" style="width:70% ;">
  	<h2>shopping cart</h2>
  	<div class="row">
  	 
        <?php 
         
        while($done=$reponse->fetch())
        {
           ?>
         
             <div class="col-md-3">
             	<form   method="post" action="./index.php?action=add&id=<?php echo $done['id'] ?>">
             		<div class="product">
                       
                       
             			<img  src="<?php echo ($done['image']) ?>" class="img img-responsive"  >
             			<h5 class="text-info"> <?php  echo $done['name'];  ?> </h5>
             			<h5 class="text-danger"><?php echo $done['prix']." \$"; ?> </h5>
             			<input type="text" name="quantity" value="1" class="form-control">
             			<input type="hidden" name="hidden-name" value="<?php echo($done['name']); ?>">
             			<input type="hidden" name="hidden-price" value="<?php echo($done['prix']); ?>">
             			<input type="submit" name="add" value="Ajouter" style="margin-top: 5px;" class="btn btn-success" >

             		</div>
             	</form>
             </div>

        <?php
         } ?>
    </div>
      
     
    <div style="clear:both;"></div>

    <form  method="post" action="./index.php" >
       <h2 >

                            <a href=""><input type="submit" name="envoi" value="Verifier" class="btn btn-primary"></a>
                            <a href="#"><input type="submit" name="envoi" value="Enregistrer" class="btn btn-secondary"></a>
                            
                           <a href=""> <input type="submit" name="envoi" value="Logout" class="btn btn-info"></a>
                          
        </h2>

    </form>

    <?php   if(isset($_POST["envoi"]) && $_POST["envoi"]=="Verifier")
    {
      ?> 
     <h3 class="title2">shopping cart details</h3>
     <div class="table-responsive">
     	<table class="table table-bordered">
             	<tr>
             		<th width="30%">nom Produit</th>
             		<th width="10%">quantité</th>
             		<th width="13%">Prix detail</th>
             		<th width="10%">Prix total</th>
             		<th width="17%">Remove</th>

             	</tr>

     	<?php 
            if(!empty($_SESSION["cart"]))
            {
           	   $total=0;
           	   foreach ($_SESSION["cart"] as $key => $value) 
               {

     	?> 
          
                <tr>
                	<td> <?php echo $value['item_name'] ?></td>
                	<td> <?php echo  $value['item_quantity'] ?></td>
                	<td><?php echo $value['product_price']; ?> $</td>
                	<td><?php echo number_format($value['item_quantity']*$value['product_price'],2); ?> $</td>
                	<td><a href="./index.php?action=delete&id=<?php echo $value['product_id'] ; ?> " class="text-danger" >remove etim</a></td>
                </tr>
        <?php 
                $total+= $value['item_quantity']*$value['product_price']; 
                $prix_total=$total;

              }?>
         <tr>
         	<td colspan="3" align="center">Total</td>
         	<th align="center"><?php echo number_format($total,2); ?> $</th>
         	<td></td>
         </tr>

     <?php }
      ?>

     </table>
     </div>
  <?php 
    }

    ?>

  <?php
     
        if(isset($_POST["envoi"]) && $_POST["envoi"]=="Enregistrer" ) {
        $f=fopen("./file.txt","w");
        if($f){
        foreach ($_SESSION["cart"] as  $value) {
            
            fputs($f,"numero id :".$value['product_id']." ; name_produit: ".$value['item_name']." ; nombre de produit: ".$value['item_quantity']." ; prix: ".$value['product_price']." $ \n");
        }

        

        fclose($f);
    }

      echo " <h3> les données du panier sont enregistre dans le fichier <a href=\"./file.txt\" ><u>file.txt</u></a><h3>";
}

?>
<?php
        if(isset($_POST['envoi']) && $_POST["envoi"]=="Logout")
        {
        session_unset(); 
        session_destroy(); 
        echo "<h3>La session est terminée</h3>";
        }
        
?>
  </div>

  
 </body>

</html>
