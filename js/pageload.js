$(document).ready(function() {

  if (window.location.hash) {
    href = location.hash.slice(1) + ".html";
<<<<<<< HEAD
    $("#div-main").load(href)l
=======
    $("#div-main").load(href);
>>>>>>> origin/Cheryl
  }
  else {
    window.location.hash = "#login";
  }

  $(window).on('hashchange', function() {
    var href = location.hash.slice(1) + ".html";
    $("#div-main").load(href);
  });
<<<<<<< HEAD
  
=======

>>>>>>> origin/Cheryl
})
