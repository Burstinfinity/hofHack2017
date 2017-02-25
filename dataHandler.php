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

  function fuck($emotion, $value, $range) {
    $sql = "SELECT * FROM ProductTable WHERE ".$emotion." BETWEEN ".($value - $range)." AND ".($value + $range);
    $result = executeQuery($sql);
    $products = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $product = array(
          "product_id"=>$row["product_id"],
          "name"=>$row["name"],
          "image"=>$row["image"],
          "anger"=>$row["anger"],
          "joy"=>$row["joy"],
          "sadness"=>$row["sadness"]
        );
        array_push($products, $product);
      } //end while
    } //end if
    return $products;
  } //end checkRange

  function checkRange($emotion, $value, $range) {
    $sql = "SELECT * FROM ProductTable WHERE ".$emotion." BETWEEN ".($value - $range)." AND ".($value + $range);
    $result = executeQuery($sql);

    //if products found in that range, return true.
    if ($result->num_rows > 0) { return TRUE; }
    else { return FALSE; }
  }

  //takes json from post content and returns json from db
  function getProducts($post_score) {
    //select with each emotion in range
    $emotions = array("anger","sadness","joy","disgust","fear");
    $num_matched = 0;
    $range = 0.2;

    foreach ($emotions as $emotion) {
      //if product found
      if checkRange($post_score[$emotion]) {
        $num_matched += 1;
      }
      
    }

  }

?>
