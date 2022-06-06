var menu = $('.in-page-nav-bar');
var menuItems = menu.find('.in-page-links').find("a");
var lastId; 
var menuPos = menu.position().top + menu.outerHeight();
 
 // Anchors corresponding to menu items
 var scrollItems = menuItems.map(function(){
   var item = $($(this).attr("href"));
    if (item.length) { return item; }
 });
 
// Add sticky nav listener
$(window).on('scroll', function(){
    var scroll = $(window).scrollTop();
    var menu = $('.in-page-nav-bar');
  
   // Get container scroll position
   var menuHeight = menu.outerHeight()+1;
   
   //var fromTop = $(this).scrollTop() + menuHeight;
   
   var fromTop = $(this).scrollTop();
   
   if(menu.hasClass('sticky')) {
	   fromTop = $(this).scrollTop() + menuHeight;
   }
   
   // Get id of current scroll item
   var cur = scrollItems.map(function(){
     if ($(this).offset().top < fromTop)
       return this;
   });
   // Get the id of the current element
   cur = cur[cur.length-1];
   var id = cur && cur.length ? cur[0].id : "";
   
   if (lastId !== id) {
       lastId = id;
       // Set/remove active class
       menuItems
         .parent().removeClass("active")
         .end().filter("[href='#"+id+"']").parent().addClass("active");
		 
		$('.in-page-nav-toggle .active-page-link').text(menuItems.filter("[href='#"+id+"']").text()); 
   }   
  
	// Toggle sticky menu state
	if (window.pageYOffset > (menuPos + 5)) {
		menu.addClass('sticky');
	  } else {
		menu.removeClass('sticky');
	}
	
});

// Mobile Nav
$('.in-page-nav-toggle').on('click', function() {
	$('.in-page-links').collapse('toggle');
});

$('body').on('click', '.in-page-links.collapse.show li a', function() {
	$('.in-page-links').collapse('hide');
	$('.in-page-nav-toggle .active-page-link').text($(this).text());
});