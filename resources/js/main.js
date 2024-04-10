
$('.menu_icon_sec > a').on('click', function(){
    $('body').addClass('active_menu');
});
$('.cross_icon span').on('click', function(){
    $('body').removeClass('active_menu');
});

$(document).ready(function () {
    $('.nav li a + i').on("click", function (e) {
        e.preventDefault();
        $(this).parent().find('>ul').slideToggle(100);
    });
});


$(window).scroll(function(){
	var sticky = $('header'),
	scroll = $(window).scrollTop();
	if (scroll >= 150){
		sticky.addClass('fixed_header');
	}
	else {
		sticky.removeClass('fixed_header');
	  }
  });

$('.main_menu_sec a[href^=\\#]').on('click', function(event){     
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 500);
});

// var swiper = new Swiper(".programs_slider", {
// 	slidesPerView: 1,
//     spaceBetween: 0,
// 	pagination: {
// 	  el: ".programs_pagination",
// 	  dynamicBullets: true,
// 	  clickable: true,
// 	},
// 	breakpoints: {
//         640: {
//           slidesPerView: 1,
//         },
//         768: {
//           slidesPerView: 2,
//         },
//         1024: {
//           slidesPerView: 3,
//           spaceBetween: 0,
//         },
//       },
//   });

  // var swiper = new Swiper(".gallery_slider", {
	// slidesPerView: 1,
  //   spaceBetween: 0,
	// pagination: {
	//   el: ".gallery_pagination",
	//   dynamicBullets: true,
	//   clickable: true,
	// },
	// breakpoints: {
  //       640: {
  //         slidesPerView: 1,
  //       },
  //       768: {
  //         slidesPerView: 2,
  //       },
  //       1024: {
  //         slidesPerView: 3,
  //         spaceBetween: 20,
  //       },
  //     },
  // });

  $.fancybox.defaults.hash = false;

$(document).ready(function(){
	$('.m_height').matchHeight();
	$('.p_height').matchHeight();
});


