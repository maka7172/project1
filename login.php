<?php
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="/project2/css/semantic.css" media="screen" title="no title" charset="utf-8">
    <script src="/progect2/js/semantic.js"></script>
  </head>
  <body>
    <?php
    $show_form = 1;
    $show_error = 0 ;
     ?>
     <?php
     if (isset($_POST["name"]) & isset($_POST["password"])) {
       $name = $_POST["name"];
       $pass = $_POST["password"];
       if ($name!="" & $pass!="") {

         # code...
         $pass1 = md5($pass);
         $server = "localhost";
         $user = "root";
         $password="";
         $datbase = "project2";

         $conect = mysqli_connect($server,$user,$password,$datbase);
         if (!$conect) {
            # code...
            echo "your connection faild";

         }
         else {

           $select_query = "SELECT * FROM user_information WHERE password='$pass1' AND name='$name'";
           $resalt = mysqli_query($conect,$select_query);

           if (!empty($resalt)) {
             # code...
             $show_form = 0 ;
             $resalt1 = mysqli_fetch_row($resalt);
             $lastname = $resalt1[1];

             include('chatroom.php');
           }
           else {
             $show_error = 1 ;
           }
         }
       }
       else {
         $show_error = 1 ;
       }

     }


      ?>

    <?php
    if ($show_form==1) {?>
      <div style="float:left; width: 40%">

      <form class="ui form" method="post">
        <h4 class="ui dividing header">Register Information</h4></br>
              <div class="field">
                <label>Name</label>
                  <div class="field">
                    <input type="text" name="name" value="" placeholder="First Name">
                  </div>
                  <div class="field">
                    <label>PASSWORD</label>
                  <div class="field">
                    <input type="password" name="password" value="" placeholder="password"></br>
                    <input type="submit" name="submit" value="submit">
                    <a href="register.php"><input type="button" name="reg" value="registernow"></a>
                  </div>
                </div>
              </div>

      </form>

    <?php } ?>
    <?php

    if ($show_error == 1) {
      echo "<h1> please insert valid user name & password</h1>";
      echo "IF YOUR ARE NOT REGISTER IN WEBSITE <a href='/project2/register.php'>registernow</a>";
      # code...
    }

     ?>
     </div>




  </body>
</html>
