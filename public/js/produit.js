$(document).ready(function() {
    var $window = $(window);
    var tabwrap = $('#tab-buttons');
    var prefooter = $('#fh5co-footer');
    var prefooter_top = prefooter.offset().top;
    var prefooter_height = prefooter.height();
    var prefooter_bottom = prefooter_top + prefooter_height;
    //console.log(prefooter_top);
    $window.on('scroll', function() {
      var scrollTop = $window.scrollTop();
      var viewport_height = $(window).height();
      var scrollTop_bottom = scrollTop + viewport_height;
      //console.log(scrollTop_bottom);
      if(scrollTop_bottom >= prefooter_top)
      {
        tabwrap.addClass('d-none');
      }
      else
      {
        tabwrap.removeClass('d-none');
      }
    });


    $window.on('scroll', function() {
        $('nav').toggleClass('navbar-scroll', $(this).scrollTop > 200);
    });
});

