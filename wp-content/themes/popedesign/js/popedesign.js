//popedesign.js
var popedesign = {

  hamburger: function(){
    var $hamburger = $('button.mobile-trigger');
    var $nav = $('ul#menu-header-menu');
    $hamburger.on('click', function(e){
      $(this).toggleClass('active');
      $nav.toggleClass('active');
      e.preventDefault();
    });
  },

  searchTrigger: function(){
    var $searchForm = $('header .search-form');
    var $searchInput = $searchForm.find('.searchInput');
    var $searchToggle = $('header a.search-trigger');
    $searchToggle.on('click', function(e){
      $searchForm.toggleClass('inactive');
      $searchInput.focus();
      e.preventDefault();
    });
    //dismiss search on ESC
    $(document).on('keydown', function(event) {
      if (event.key == "Escape") {
        $searchForm.addClass('inactive');
      }
    });
  },

  carouselInit: function(){
    $('.home-carousel').owlCarousel(
      {
      autoplay: true,
      loop: true,
      margin: 10,
      items: 1,
      autoPlay: true,
      autoplayTimeout: 8000,
      autoplayHoverPause: true,
      paginationSpeed : 2000 //how long does it take to physically move?
      }
    );
    $('.about-carousel').owlCarousel(
      {
      autoplay: false,
      loop: false,
      mouseDrag: false,
      touchDrag: false,
      dots: false,
      lazyLoad: true,
      margin: 10,
      items: 1,
      autoplayTimeout: 8000,
      autoplayHoverPause: true,
      paginationSpeed : 2000 //how long does it take to physically move?
      }
    );
  }

}

$(document).ready(function(){
  popedesign.hamburger();
  popedesign.searchTrigger();
  if ($(".owl-carousel").length){
    popedesign.carouselInit();
  }

});
