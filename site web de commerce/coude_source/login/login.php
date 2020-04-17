<?php  

$i=1;

?>




<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=Password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  width: 500px;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin:auto;
}
h3{text-align: center;}
</style>
<style type="text/css"> @import url(../style.css); </style>
<body>
  <ul class="menu">
          <li> <a href="/"> Home </a> </li>&nbsp;&nbsp;&nbsp;&nbsp; 
        <li> <a href="/login/registre.php"> Register </a> </li> &nbsp;&nbsp;&nbsp;&nbsp;
      </ul>


<h3>Login</h3>

<div>
  <form action="/login/login.php" method="POST">
    

    <label for="email">Email</label>
    <input type="text" id="email" name="email" placeholder="Ton email..">

    <label for="pword">Mode de Passe</label>
    <input type="Password" id="pword" name="pword" placeholder="Ton Mode de passe.">

 <?php 

if(isset($_POST['connecte']) ){

  if(!preg_match('/.+@.+/', $_POST['email'])){
    $i=0;
  ?>

  <ol type="squart">
    <li>email mal format</li>
       <ol><li>email dois confirmer le format ..@...</li></ol>
    <?php 
       }
     if(!preg_match('/[0-9]/', $_POST['pword']) || !preg_match('/[A-Z]/', $_POST['pword']) || !preg_match('/[\#@%?$]/', $_POST['pword'])){
      $i=0;
     ?>
     <li>mode de passe mal format</li>
      <ol >Mode de Passe dois contient <li>un nombre [0-9] </li>
                                    <li>une lettre en majescul</li>
                                     <li>un carractère spécieux [\#@%?$]</li>
      </ol>
  </ol>
  <?php 

      }


       if($i==1)
    {

       echo '<script>window.location="/"</script>';
    }
    }


   

   ?>
  
    <input type="submit" value="Connecter" name="connecte">
    <a href="/login/registre.php" style="color: red;"> <u>crée un compte</u></a>
  </form>
</div>

</body>
</html>