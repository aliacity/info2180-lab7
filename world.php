<?php
$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';
$country = $_GET['country'];
$all = $_GET['all'];
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);


function querydatabase($queryrequest, $conn){
  $duh = $conn->query($queryrequest);
  $results = $duh->fetchAll(PDO::FETCH_ASSOC);
  echo '<ul>';
    foreach ($results as $row) {
      echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
    echo '</ul>';
}


if($all == "true"){
    querydatabase("SELECT * FROM countries", $conn);
}else if($country){
    querydatabase("SELECT * FROM countries WHERE name LIKE '%$country%'",$conn);
}