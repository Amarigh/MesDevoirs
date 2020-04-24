<?php

class d_base
{



  function d_base()
  {
  }

  function init($db)
  {


    try {
      $db = new PDO('mysql:host=localhost;dbname=id12948400_php', 'id12948400_root', 'Mama199775026');
      return $db;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


  function destroy($db)
  {

    try {

      curl_close($db);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}











 ?>