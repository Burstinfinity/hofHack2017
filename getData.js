var products;
var post_emotions;
var demo_products;

function getAllProducts() {
  $.ajax({
    async: false,
    url: "dataHandler.php",
    dataType: "json",
    data: {
      "action":"getAllProducts"
    },
    success: function(data) {
      products = data;
    },
    error: function(one, two, three) {
      console.log(three);
    }
  });
}

function processPost(text) {
  $.ajax({
    async: false,
    url: "https://gateway-a.watsonplatform.net/calls/text/TextGetEmotion?apikey=10bc4239979f50934b5758f9e32aba4c333d4fb1",
    dataType: "json",
    data: {
      "outputMode":"json",
      "extract":"entities, keywords",
      "text": text,
    },
    success: function(data) {
      post_emotions = data;
    },
    error: function(error) {
      console.log(error);
    }
  }); //end ajax
} //end processPost

function getDemoProducts(emotion) {
  $.ajax({
    async: false,
    url: "dataHandler.php",
    dataType: "json",
    data: {
      "action":"getDemoProducts",
      "emotion" : emotion
    },
    success: function(data) {
      demo_products = data;
    },
    error: function(error) {
      console.log(error);
    }
  });
}

$(document).ready(function() {
  // getDemoProducts("sadness");
  // console.log(demo_products);

  getAllProducts();
  console.log(products);

  //processPost("Eveything sucks.");
  //console.log(post_emotions);

});
