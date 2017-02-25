$(document).ready(function() {

  if (window.location.hash) {
    href = location.hash.slice(1) + ".html";

    $("#div-main").load(href);
  }
  else {
    window.location.hash = "#login";
  }

  $(window).on('hashchange', function() {
    var href = location.hash.slice(1) + ".html";
    $("#div-main").load(href);
  });

})
