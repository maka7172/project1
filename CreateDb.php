<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
  <?php
  $show_form = 1 ;
  //data_type function
  function data_type($number){
    switch ($number) {
      case 1 :
        # code...
        return "varchar" ;
        break;
      case 2 :
          # code...
        return "int" ;
        break;
      case 3:
            # code...
        return "time" ;
        break;

      default:
        # code...
        return "varchar" ;
        break;
    }
  }


//show_erorr function
function show_erorr(){
  echo "please insert valid information";
}

//fetch_fildes function
function fetch_fildes($count)
{
  echo "<form action='' method='POST'>" ;
  for ($i=1; $i <=$count ; $i++) {
    ?>
  <span>please insert your <?php  $i  ?> :</span><input type="text" name="fild<?php  $i  ?>" value=''><select name="datatype">
  <option value="1">varchar</option>
  <option value="2">int</option>
  <option value="3">time</option>
</select></br>
  <?php }
  echo "<input type='submit' name='fildsubmit' value='submit'>" ;
  echo "</form>" ;
  $filds = array() ;
  for ($i=1; $i <=$count ; $i++) {
    # code...
    if (isset($_POST["fild" . $i])) {
      # code...
      $key = $_POST["fild" . $i] ;
      $datatype = $_POST["datatype"];
      //use data_type function
      $filds[$key] = data_type($datatype) ;
      return $filds ;
    }
  }

}

//give server , user , pass information

if (isset($_POST["server"]) & isset($_POST["dbuser"])) {
  $server = $_POST["server"] ;
  $user = $_POST["dbuser"] ;
  $pass = $_POST["pass"] ;
    if ($server != "" & $user != "") {
    # code...
    $show_form = 0 ;
    $connect = mysqli_connect($server, $user,$pass) ;
    if (!$connect) {
      # code...
      echo "your connection lost";
    }
    else {
      # code...
    echo "you are connect to database</br>" ;
    $dbname = $_POST["dbname"] ;
    $table = $_POST["tbname"] ;
    $count = $_POST["count"] ;
    $dbquery = "create database $dbname ";
    $query = mysqli_query($connect,$dbquery);

    if ($query) {
      # code...
      echo "create your DB</br>";
      //use db
      $usedb = "use $dbname";
      $query = mysqli_query($connect,$usedb);
      echo "use db" ;
      //use function fetch_fildes
      $filds1 = fetch_fildes($count);
      //create table
      foreach ($filds1 as $key=>$value)
       {
        $test .=  $key . " " . $value ;

      }
      $tbquery = "create table $table ($test)" ;


    }

  }
  }
  else {
    //show_erorr function
    show_erorr() ;
  }
}
else {
    show_erorr() ;
}

      if($show_form == 1) { ?>

    <form class="" action="" method="post">
      <span>please insert your serveradd :</span><input type="text" name="server" value=""></br>
      <span>please insert your DBuser :</span><input type="text" name="dbuser" value=""></br>
      <span>please insert your DBpas :</span><input type="password" name="pass" value=""></br>
      <span>please insert your DBname :</span><input type="text" name="dbname" value=""></br>
      <span>please insert your Tablename :</span><input type="text" name="tbname" value=""></br>
      <span>plaese insert count of colums :</span><input type="text" name="count" value=""></br>
      <input type="submit" name="ok" value="submit">
    </form>
<?php  } ?>
  </body>
</html>
