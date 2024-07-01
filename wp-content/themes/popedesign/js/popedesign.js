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

    $("#project-detail").owlCarousel({
        items: 1,
        singleItem: true,
        addClassActive: true,
        slideSpeed: 2000,
        dots: false
      }
    );

    var $projectDetail = $('#project-detail');
    $projectDetail.on('changed.owl.carousel',function(e){
        console.log('UPDATED!');
    });

    $("#project-carousel").owlCarousel({
        navigation : true,
        singleItem: false,
        pagination: false,
        items: 5,
        responsive: false,
        navigationText: ["&#xe803;","&#xe804;"],
        onInitialized: function(){
          var carouselItem = $("#project-carousel .item");
          carouselItem.each(function(){
            $(this).on("click", function(){
              var thisSlide = $(this).parents().index();
              var bigPhoto = $("#project-detail");
              bigPhoto.trigger('to.owl.carousel', thisSlide);
              $(".item").removeClass("activeItem");
              $(this).addClass("activeItem");
            });
          });
        }
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

    $('.careers-carousel').owlCarousel(
      {
      autoplay: true,
      loop: true,
      mouseDrag: false,
      touchDrag: false,
      dots: false,
      lazyLoad: true,
      margin: 15,
      items: 4,
      autoplayTimeout: 4000,
      autoplayHoverPause: false,
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
