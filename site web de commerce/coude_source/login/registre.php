
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


input[type=email], select {
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
          <li> <a href="/"> Home </a> </li>&nbsp;&nbsp;&nbsp;&nbsp; </ul>
<h3>Formaile d'inscription</h3>

<div>
  <form action="/login/registre.php" method="POST">
    <label for="fname">NOM</label>
    <input type="text" id="fname" name="nom" value="<?php 
    if(isset($_POST['ok']) ){echo $_POST['nom'];}?>" placeholder="Ton nom..">
    <?php 
    if(isset($_POST['ok']) ){
        if(empty($_POST['nom'])){
    $i=0;
    ?>
    <li style="color:red;">name obligatoir</li>
    <?php }} ?>

    <label for="lname">PRENOM</label>
    <input type="text" id="lname" value="<?php 
    if(isset($_POST['ok']) ){echo $_POST['prenom'];}?>" name="prenom" placeholder="Ton Prenom..">

<label for="email">Email</label>
    <input type="email" id="email" value="<?php 
    if(isset($_POST['ok']) ){echo $_POST['email'];}?>" name="email" placeholder="Ton email..">
 <?php 
    if(isset($_POST['ok']) ){
        if(empty($_POST['email'])){
            $i=0;
    
    ?>
    <li style="color:red;">email obligatoir</li>
    <?php }} ?>

    <label for="pword">Mod de Passe</label>
    <input type="Password" id="pword" value="<?php 
    if(isset($_POST['ok']) ){echo $_POST['pword'];}?>" name="pword" placeholder="Ton mode de passe..">
 <?php 
    if(isset($_POST['ok']) ){
        if(empty($_POST['pword'])){
            $i=0;
    
    ?>
    <li style="color:red;">mode de passe  obligatoir</li>
    <?php }} ?>

<label for="cpword">Confirmé Mode de Passe</label>
    <input type="Password" id="cpword" name="cpword" placeholder="Ton mode de passe..">
    <?php 
    if(isset($_POST['ok']) ){
        if(empty($_POST['cpword'])){
            $i=0;
    
    ?>
    <li style="color:red;">confirmé votre mot de passe  </li>
    <?php }} ?>
     <label for="tel">Tel</label>
    <input type="text" id="tel" value="<?php 
    if(isset($_POST['ok']) ){echo $_POST['tel'];}?>" name="tel" placeholder="Ton phon..">
  
    <input type="submit" value="Submit" name="ok">
    <?php 
    if(isset($_POST['ok']) ){
        if($i==1){
            
             echo '<script>window.location="/login/login.php"</script>';
        }
        
    }
    ?>
   
  </form>
</div>

</body>
</html>