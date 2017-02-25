<?php

  if (isset($_POST["action"])) {
    $action = $_POST["action"];
    switch ($action) {
      case "getAllProducts" :
        getAllProducts();
        break;
    }
  }
  function executeQuery($sql) {
    $servername = "localhost";
    $username = "root";
    $password = "TOPKA";
    $dbname = "sbhack";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sql);
    $conn->close();
    return $result;
  }

  //get all products from db and output to json
  function getAllProducts() {
    $sql = "SELECT * FROM ProductTable";
    $result = executeQuery($sql);
    $products = array();

    if ($result->num_rows == 0) {
      die("No products found");
    }
    while ($row = $result->fetch_assoc()) {
      $product = array(
        "product_id"=>$row["product_id"],
        "name"=>$row["name"],
        "image"=>$row["image"],
        "anger"=>$row["anger"],
        "sadness"=>$row["fear"],
        "disgust"=>$row["disgust"],
        "joy"=>$row["joy"],
        "fear"=>$row["fear"]
      );
      array_push($products, $product);
    } //end while
    echo json_encode($products);
  } //end getAllProducts

  //gets all products associated with given emotion
  function getDemoProducts() {
    $emotion = $_POST["emotion"];
    $sql = "SELECT product_id, name, image FROM ProductDemo WHERE emotion = ".$emotion;
    executeQuery($sql);

    $products = array();

    if ($result->num_rows == 0) {
      die("No products found");
    }
    while ($row = $result->fetch_assoc()) {
      $product = array(
        "product_id"=>$row["product_id"],
        "name"=>$row["name"],
        "image"=>$row["image"]
      );
      array_push($products, $product);
    } //end while
    echo json_encode($products);
  } //end getDemoProducts
