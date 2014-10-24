$(function(){
  $.get(
    'http://www.corsproxy.com/' +
    'knt-tabihime.com/',
    function(response) {
      $('.container').html(response);
  });
});