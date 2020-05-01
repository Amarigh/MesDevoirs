    <?php

      session_start();
      if (!isset($_SESSION['lecnum'])) $_SESSION['lecnum'] = 0;
      if (!isset($_SESSION['livcode'])) $_SESSION['livcode'] = 0;
      if (!isset($_SESSION['lecnom'])) $_SESSION['lecnom'] = null;
      if (!isset($_SESSION['lecmpasse'])) $_SESSION['lecmpasse'] = null;
      ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>appBib</title>
       <style type="text/css">
          .d1 {

             display: inline-flex;
             width: 450px;
          }

          .d {
             width: 150px;
          }
       </style>
    </head>

    <body>