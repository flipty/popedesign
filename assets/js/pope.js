//pope.js
var popeUtils = {

  homeCarousel: function () {
    $("#home-carousel").owlCarousel({
        navigation : false, 
        singleItem: true,
        autoPlay: 8000,
        paginationSpeed : 2000, //how long does it take to physically move?
        rewindSpeed : 1000,
        //transitionStyle: "fade",
        //stopOnHover: true,
        afterInit: function(){
            $(".owl-controls").wrap("<div class='container controls'></div>");
        }
    });
  },

  resizeIsotopes: function () {
    isotope = $(".isotope");
    isoHeight = isotope.width();
    isotope.css("height", isoHeight);
    var isos = $(".isotope").size();
    var contentIsos = $(".isoGrid .isotope").size();
      //count the isotopes and assign left right and center to them. Current limit is 21.
      $(".isoGrid .isotope").each(function(){
          var $this = $(this);
          var $thisIndex = $this.index() + 1;

          if (($thisIndex == 1) || ($thisIndex == 4) || ($thisIndex == 7) || ($thisIndex == 10) || ($thisIndex == 13) || ($thisIndex == 16) || ($thisIndex == 19))
          {
            $this.addClass("isoLeft");
          }
          if (($thisIndex == 2) || ($thisIndex == 5) || ($thisIndex == 8) || ($thisIndex == 11) || ($thisIndex == 14) || ($thisIndex == 17) || ($thisIndex == 20))
          {
            $this.addClass("isoCenter");
          }
          if (($thisIndex == 3) || ($thisIndex == 6) || ($thisIndex == 9) || ($thisIndex == 12) || ($thisIndex == 15) || ($thisIndex == 18) || ($thisIndex == 21))
          {
            $this.addClass("isoRight");
          }
      });
  },

  quoteCarousel: function () {
    $("#quote-carousel").owlCarousel({
        navigation : false, 
        pagination: false,
        singleItem: true,
        autoPlay: 5000,
        paginationSpeed : 3000, //how long does it take to physically move?
        rewindSpeed : 1000,
        transitionStyle: "fade",
        //stopOnHover: true,
        afterInit: function(){
            //$(".owl-controls").wrap("<div class='container controls'></div>");
        }
    });
  },

  //big carousel on detail page
  projectDetailCarousel: function () {
    $("#project-detail").owlCarousel({
        navigation : true, 
        singleItem: true,
        pagination: false,
        addClassActive: true,
        slideSpeed: 2000,
        //transitionStyle: "fade",
        navigationText: ["&#xe803;","&#xe804;"],
        afterMove: function(){
          var owl = $("#project-detail");
          var pager = $("#project-carousel").data('owlCarousel');;
          var currentPager = $("#project-carousel .activeItem");
          var currentItem = this.owl.currentItem;
          currentPager.removeClass("activeItem");
          
          //pager.goTo(currentItem);
        }  
    });
  },

  //small pager carousel on detail page
  projectCarousel: function () {
    $("#project-carousel").owlCarousel({
        navigation : true, 
        singleItem: false,
        pagination: false,
        items: 5,
        responsive: false,
        navigationText: ["&#xe803;","&#xe804;"],
        afterInit: function(){
          var carouselItem = $("#project-carousel .item");
          carouselItem.each(function(){
            $(this).on("click", function(){
              var thisSlide = $(this).parents().index();
              var bigPhoto = $("#project-detail").data('owlCarousel');
              bigPhoto.goTo(thisSlide);
              $(".item").removeClass("activeItem");
              $(this).addClass("activeItem");
            });
          });
        },
        afterAction: function(){
          //console.log('pager action');
        }
    });
  },

  navOverride: function () {
    $("li.dropdown > a").each(function(){
      $(this).on("click", function(){
        var $thisLink = $(this).attr("href");
        window.location.href = $thisLink;
      });
    });

  },

  func4: function () {

  },

  func5: function () {

  }

};// end popeUtils

//initialize things that need initialization
$(document).ready(function(){
    popeUtils.homeCarousel();
    popeUtils.quoteCarousel();
    popeUtils.resizeIsotopes();
    popeUtils.projectCarousel();
    popeUtils.projectDetailCarousel();
    popeUtils.navOverride();
});

//handle things when the viewport is resized
$(window).on("resize", function(){
    popeUtils.resizeIsotopes();
});

//resume upload visual handling
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
});