<?php
header("Content-Type: text/css");
$darkColor = '#16151C';
$purple = '#71677C';
$main = '#1D8782';
$lightBlue = '#47BAD3';
$white = '#F3E9EB';
?>

body{
  background-color: <?php echo $darkColor; ?>;
  color: <?php echo $white; ?>;
  font-family: "Rancho", cursive;
  font-weight: 400;
  font-style: normal;
}

h1{
  color: <?php echo $main; ?>;
  text-align: center;
}

a, a:visited{
  color: <?php echo $purple ?>;
}

.menuButtons a{
  background-color: <?php echo $purple ?>;
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  color: white;
  text-align: center;
  text-decoration: none;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s;
}

.menuButtons a:hover{
  background-color: #8A8293; 
}

.menuButtons{
  display: flex;
  flex-direction: row;
  background-color: <?php echo $main ?>
}

footer{
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  text-align: center;
}

