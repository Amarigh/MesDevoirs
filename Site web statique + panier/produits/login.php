<!DOCTYPE html>
<html>
<style>
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
          <li> <a href="../index.php"> Home </a> </li>&nbsp;&nbsp;&nbsp;&nbsp; 
        <li> <a href="./registre.php"> Register </a> </li> &nbsp;&nbsp;&nbsp;&nbsp;
      </ul>


<h3>Login</h3>

<div>
  <form action="/action_page.php">
    

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Your email..">

    <label for="pword">Password</label>
    <input type="Password" id="pword" name="pword" placeholder="Your Password..">

  
    <input type="submit" value="Connecter">
  </form>
</div>

</body>
</html>