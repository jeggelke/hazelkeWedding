$(document).ready(function(){
  toggleNavVisibility();
});

$(window).on('resize', function(){
  toggleNavVisibility();
})



function toggleNavVisibility(){
  if ($( window ).width() > 751)
  {
    $('#nav-button').hide();
    $('#primary-menu').attr('aria-expanded', true);
  }
  else {
    $('#nav-button').show();
    $('#primary-menu').attr('aria-expanded', false);
  }
}
