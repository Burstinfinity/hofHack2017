$(document).ready(function() {

  if (window.location.hash) {
    href = location.hash.slice(1) + ".html";
    $("#div-main").load(href)l
  }
  else {
    window.location.hash = "#login";
  }

  $(window).on('hashchange', function() {
    var href = location.hash.slice(1) + ".html";
    $("#div-main").load(href);
  });
  
})
