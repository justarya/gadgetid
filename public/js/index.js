// console.log('test');
$(".admin__content__control__expand").hide();
// $('.admin__nav__menu .parent a').click(function(e){
//   e.preventDefault();
//   var dataLink = $(this).attr('data-link');
//   var dataTarget = $(this).attr('data-target');
//   $('.admin__content__control__expand').hide();
//   // location.hash = "page="+dataTarget;
//   var stateObj = { foo: "bar" };
//   history.pushState(stateObj, "page", "index.php?page="+dataTarget);
//   // history.pushState(stateObj, "", "/page1.jsp?parameter1=DEF&parameter2=XYZ");
//   console.log('menu click');
//   $('.admin__content').load(dataLink);
// });
function togglePopup() {
  $(".popup-bg").toggle();
}
function toggleForm() {
  $(".admin__content__control__expand").slideToggle("fast");
}
$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".slider-nav"
});
$(".slider-nav").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: true,
  centerMode: true,
  focusOnSelect: true
});
