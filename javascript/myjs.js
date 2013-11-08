//Stephen Wiggins
//Project 1
// Advanced Web
// November 7 2013



window.mySwipe = new Swipe(document.getElementById('slider'), {
  startSlide: 1,
  speed: 400,
  auto: 3000,
  continuous: true,
//  disableScroll: false,
 // stopPropagation: false,
  callback: function(index, elem) {},
  transitionEnd: function(index, elem) {}
});