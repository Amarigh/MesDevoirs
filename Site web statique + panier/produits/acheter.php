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

textarea,select{width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;}

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
<body>

<h3>Enter a new shipping address. </h3>

<div>
  <form action="/action_page.php">
    <label for="fname">full Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="ad1">addres n° 1</label>
    <input type="text" id="ad1" name="ad1" placeholder="Your address n° 1..">
    <label for="ad2">addres n° 2</label>
    <input type="text" id="ad2" name="ad2" placeholder="Your address n° 2..">
    <label for="city">City</label>
    <input type="text" id="city" name="city" placeholder="Your city 1..">

   

<label for="state">State/Province/Region: </label>
    <input type="text" id="state" name="state" placeholder="Your State..">
    

<label for="phon">Phone number:</label>
    <input type="text" id="phon" name="phon" placeholder="Your phon..">


<label for="del">Add delivery instructions (optional)</label>
    <textarea  id="phon" name="phon" placeholder="Your delivery.."></textarea> 



    <label for="country">Country/Region: </label>
    <select id="country" name="country">
      <option value="australia">Australia</option>
      <option value="canada">Canada</option>
      <option value="usa">USA</option>
    </select>
  
    <input type="submit" value="continue">
  </form>
</div>

</body>
</html>