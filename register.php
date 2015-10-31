<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <title>registerpage</title>
    <link rel="stylesheet" href="/project2/css/semantic.css">
    <script src="/project2/js/semantic.js"></script>
  </head>
  <body>

<div style="width: 100%; height:100%;background-color:yellow">
  <div style="float:left; width:30%;height:100" >
  </div>
   <div style="position:relative;left:100px;top:100px; width: 40%;height:100%">
     <?php
     $show_form = 1 ;
     $show_error = 0 ;
     $show_errorpass = 0 ;
     if(isset($_POST["name"]) & isset($_POST["lastname"]) & isset($_POST["password"]) & isset($_POST["retypepass"])){
       $name = $_POST["name"];
       $lastname = $_POST["lastname"];
       $password = md5($_POST["password"]);
       $email = $_POST["email"];
       $age = $_POST["age"];
       $gender = $_POST["gender"];
       if ($name!="" & $lastname!="" & $password!="") {
         # code...
         if ($password == md5($_POST["retypepass"])) {
           # code...

         $server = "localhost";
         $user = "root";
         $password_db="";
         $datbase = "project2";
         $conect = mysqli_connect($server,$user,$password_db,$datbase);
         if (!$conect) {
            # code...
            echo "your connection faild";

         }
         else {
           $inser_query = "INSERT INTO user_information VALUES('$name','$lastname','$password','$email','$age','$gender')";
           $query = mysqli_query($conect,$inser_query);
           if ($query) {
             # code...
             $show_form = 0 ;
             echo "<h1>YOUR INFORMATION WILL BE REGISTERED <a href='login.php'>please login now</a></h1>";
           }

       }
     }
     else {
       $show_errorpass = 1 ;
     }
   }
     else {
       $show_error = 1 ;
     }
   }0.

      ?>



     <?php if ($show_form==1) {
           ?>
     <form class="ui form" method="post">
       <h4 class="ui dividing header">Register Information</h4></br>
             <div class="field">
               <label>Name</label>
               <div class="two fields">
                 <div class="field">
                   <input type="text" name="name" placeholder="First Name">
                 </div>
                 <div class="field">
                   <input type="text" name="lastname" placeholder="Last Name">
                 </div>
               </div>
             </div>
             <div class="field">
               <label>EMAIL</label>
                   <div class="field">
                   <input type="text" name="email" value="" placeholder="inter your email">
                 </div>
             </div>
             <div class="field">
               <label>PASSWORD</label>
               <div class="two fields">
                 <div class="field">
                   <input type="password" name="password" placeholder="password">
                 </div>
                 <div class="field">
                   <input type="password" name="retypepass" placeholder="retype password">
                 </div>
               </div>
             </div>
             <div class="field">
               <label>AGE</label>
                   <div class="field">
                   <input type="text" name="age" value=""placeholder="inter your age">
                 </div>
             </div>
             <div class="field">
               <label>GENDER</label>
                   <div class="field">
                   <input type="radio" name="gender" value="man" >man <input type="radio" name="gender" value="woman" >woman
                 </div>
             </div>
             <div class="field">
               <label>SUBMIT</label>
                   <div class="field">
                   <input type="submit" name="submit" value="submit" >
                 </div>
             </div>


       </form>
      <?php
            }
       ?>
    <?php
      if ($show_error==1) {
        # code...
        echo "PLEASE INSERT VALID INFORMATION";
      }
      if ($show_errorpass) {
        # code...
        echo "PLEASE INSERT EQUAL PASSWORD";
      }

      ?>

   </div>

</div>
 </body>

</html>
