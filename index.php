<?php
  require_once 'db.php';
  require_once 'handler/biblHandler.php';
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Izbor knjiga iz biblioteke</title>

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/style.css">
  <script src="./assets/js/jquery-3.3.1.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/script.js"></script>
</head>

<style>
body {
  background-image: linear-gradient(to right, beige , red);
  background-image: url("slika.jpg");
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  padding-bottom: 100px;
  font-size:14px;

}
.my-3 {
  font-family: Impact;
  color: blue;
  text-align: center;
}

.container{
  color: black;
  margin: 30px auto;
  font-family: Trebuchet MS;
  
}
table {
    color: black;
    font-family: Trebuchet MS;
    border: white 4px solid;
    
}
td {
    color: black;
    border:  white 2px solid;
    text-align: center;
    padding: 5px;
    background: #f2f2f2;
}
th {
  background: #d9d9d9;
  border:  white 2px solid;
  text-align: center;
}


</style>

<body>
  <div class="container">
    <div id="bibl">
      <?php
        require_once 'components/bibl.php';
      ?>
    </div>
    <br><br>
    <div id="knjiga">
      <?php
        require_once 'components/knjiga.php';
      ?>
    </div>
  </div>
  <div class="spacer"></div>
</body>

</html>

