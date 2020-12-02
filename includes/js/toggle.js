/*$(function() {
  // Sidebar toggle behavior
  $('#sidebarCollapse').on('click', function() {
    $('#sidebar, #content').toggleClass('active');
  });
});*/

$(function(){
  $(".hamburger").click(function(){
    $(".wrapper").toggleClass("collapse");
  });
});