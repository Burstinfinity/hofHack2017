<?php

  function executeQuery() {
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);
    $conn->close();
    return $result;
  }

  function checkRange($emotion, $value, $range) {
    $sql = "SELECT * FROM ProductTable WHERE ".$emotion." BETWEEN ".($value - $range)." AND ".($value + $range);
    $result = executeQuery($sql);
    if ($result->num_rows == 0) {
      return [];
    }
    else {
      $products = array();
      while ($row = $result->fetch_assoc()) {
        $product = array(
          "product_id"=>$row["product_id"],
          "name"=>$row["name"],
          "image"=>$row["image"],
          "anger"=>$row["anger"],
          "joy"=>$row["joy"],
          "sadness"=>$ro
        );
      }
    }
  }

  //takes json from post content and returns json from db
  function getProduct($post_score) {
    //select with each emotion in range
    $anger = $post_score["anger"];
    $fear = $post_score["fear"];
    $sadness = $post_score["sadness"];
    $disgust = $post_score["disgust"];
    $joy = $post_score["joy"];

    $range = 0.2;

    $sql = "SELECT * FROM ProductTable WHERE anger BETWEEN ".$anger
  }

?>
