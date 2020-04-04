
-----------------------------------------------

binom:  
           Amarigh Mustapha G1
           Farid Elkharrazi G2



------------------ Exercice 4 (partie 2) ---------------------




<?php 

function email($log){

	if(preg_match('/.+@.+\..{2,4}/', $log)) return true;
	else return false;
}

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

             
               // echo trim($user2[0]," ");



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

               echo "login n'exit pas";
                 




            }


        }

        else{

        	echo "mode passe incorrecte";
        }
 ?>
</body>
</html>