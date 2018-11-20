<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';
$country = $_GET['country'];
$all = $_GET['all'];
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

/**
function querydatabase($queryrequest, $conn){
  
   $results = $conn->query($queryrequest)->fetchAll(PDO::FETCH_ASSOC);
   header("Content-Type: text/html; charset=utf-8");
  echo '<ul>';
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
}**/


if(isset($country)==true){
    $conn->query("SELECT*FROM countries WHERE '%country%'",$conn)->fetchAll(PDO::FETCH_ASSOC);
    header("Content-Type: text/html; charset=utf-8");
  echo '<ul>';
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
    
}elseif($all == "true"){
  $conn->query("SELECT * FROM countries",$conn)->fetchAll(PDO::FETCH_ASSOC);
   # querydatabase("SELECT * FROM countries", $conn);
    header("Content-Type: text/html; charset=utf-8");
  echo '<ul>';
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
}