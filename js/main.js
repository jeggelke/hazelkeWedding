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

$(document).ready(function(){

  // Select all links with hashes
  $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      console.log('clicked');
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        &&
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });

    //scrolling Header
    // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("site-navigation");
    var contentArea = document.getElementById("content");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
      if (window.pageYOffset >= sticky) {
        header.classList.add("sticky");
        contentArea.classList.add("content-area-added-padding");
      } else {
        header.classList.remove("sticky");
        contentArea.classList.remove("content-area-added-padding");
      }
    }
})
