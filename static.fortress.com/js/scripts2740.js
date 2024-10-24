function checkScroll(){
	if ($(window).scrollTop() >= 50) {
			$('header.home').addClass('scrolled');
	} else {
			$('header.home').removeClass('scrolled');
	}
}

$(document).ready(function() {

	var winWidth = window.innerWidth;
	checkScroll();
	$(window).scroll(checkScroll);

	$(document).on('click','.LoadMore',function(e) {
		e.preventDefault();
		var El = $(this);
		El.html('<img src="images/loading.gif" />');
		$.get(El.attr('href'),function(data) {
			El.replaceWith(data);
		});
	});

if ($(window).width() > 768 && ($('#subnav-toggle-wrapper').length > 0) ) {
	var $subnavHeight
	var waypoint = new Waypoint({
  	element: document.getElementById('subnav-toggle-wrapper'),
  	handler: function(direction) {
			if (direction=='down') {
				$subnavHeight = $('#about-subnav').outerHeight() - 176;
				$('.subnav-toggle').slideDown(100);
				$('.subnav').css('margin-top',-$subnavHeight+'px');
				$('.subnav').addClass('sticky');
				$('main').css('margin-top',$('.subnav').outerHeight(true) + 'px');
			} else {
				//$('.subnav-toggle').hide();
				//$('.subnav').removeClass('sticky');
				//$('.subnav').css('margin-top','176px');
				//$('main').css('margin-top','0');
			}
  	},
		offset:194
	})

	$('#subnav-toggle-wrapper')
	.on('click', '.down', function(e){
		e.preventDefault();
		$('.subnav').animate({marginTop:'176px'})
		$(this).removeClass('down')
		$(this).addClass('up')
	})
	.on('click', '.up', function(e){
		e.preventDefault();
		$('.subnav').animate({marginTop:-$subnavHeight+'px'})
		$(this).removeClass('up')
		$(this).addClass('down')
	})
} else {
	$('#subnav-toggle-wrapper-mobile')
	.on('click', '.down', function(e){
		e.preventDefault();
		$('#about-subnav').show()
		$(this).removeClass('down')
		$(this).addClass('up')
	})
	.on('click', '.up', function(e){
		e.preventDefault();
		$('#about-subnav').hide()
		$(this).removeClass('up')
		$(this).addClass('down')
	})
	
}

if ($(window).width() > 768 && ($('.permanent-cap-vehicles').length > 0) ) {
$(window).load(function() {
  $('.permanent-cap-vehicles').each(function() {
    var $rowHeight = $(this).css("height");
    $(this).find('.infobox').css("height",$rowHeight);
  });
})
}

$('button[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $('button[data-toggle="tab"]').removeClass("active")
  $(e.target).addClass("active") // newly activated tab
})

//normalize carousel slide heights
function carouselNormalization() {
  var items = $('#carousel-selected-investments .item'), //grab all slides
    heights = [], //create empty array to store height values
    tallest; //create variable to make note of the tallest slide

  if (items.length) {
    function normalizeHeights() {
        items.each(function() { //add heights to array
            heights.push($(this).height()); 
        });
        tallest = Math.max.apply(null, heights); //cache largest value;
        items.each(function() {
            $(this).css('min-height',tallest + 'px');
        });
    };
    normalizeHeights();

    $(window).on('resize orientationchange', function () {
        tallest = 0, heights.length = 0; //reset vars
        items.each(function() {
            $(this).css('min-height','0'); //reset min-height
        }); 
        normalizeHeights(); //run it again 
    });
  }
}
/* new video start here*/

var $mediaurl

$(document).on('click','.loadvideo',function(e) {
  e.preventDefault();
  $('.selected').removeClass('selected');
	videojs('mediaplayer').poster($(this).attr('data-image'));
	videojs('mediaplayer').src('https://static.fortress.com/video/'+$(this).attr('data-url'));
  $(this).parents(':eq(1)').find('.loadvideo').addClass('selected');
});


  /* Simple Modal Window */
  //open modal window by clicking any dom object with class = "modalOpen"
  if($('.modalOpen').length > 0) {
     $('.modalOpen').click(function(e){
       e.preventDefault();
       var thisHash = (this.hash).substring(1);
       var slideTo = ($(this).data('slide-to'));
       $('.modalWindow').show();
       if( $('#carousel-selected-investments').length > 0 ) { 
         $('#carousel-selected-investments').carousel(slideTo,{pause:'hover'}); 
       }
      
     })

     //close modal window by clicking on close or clicking outside content
     $(document).on('click', function(e) {
       if ($(e.target).attr('class') == 'modalContainerWrapper' || $(e.target).attr('class') == 'modalWindow') {
         $('.modalWindow').hide();
videojs('mediaplayer').pause();
         if( $('#carousel-selected-investments').length > 0 ) { 
           $('#carousel-selected-investments').carousel('pause'); 
         }
       }
     });

     $(document).on('click','.modalClose', function(e) {
       e.preventDefault();
       $('.modalWindow').hide();
        videojs('mediaplayer').pause();

      if( $('#carousel-selected-investments').length > 0 ) { 
         $('#carousel-selected-investments').carousel('pause'); 
       }
     });

  }// end if


  //link to bio on business pages
  $('.leadership-link').on('click',function(e) {
    e.preventDefault();
    $('a[href="#leadership"]').tab('show');
    $('.interior-tabs').ScrollTo({offsetTop: 175});
    var thisHash = $(this).attr('href');
    $(thisHash).collapse('show')
  });

  //about page hash scroll

if( $('.aboutScroll').length > 0) {
	$('.aboutScroll').click(function() {
//e.preventDefault();
				var thisHash = this.hash;
				$('html, body').animate({
							scrollTop: $(thisHash).offset().top - 175
								}, 500);
				});
}

//match heights of highlight items
//$('.highlight-item').matchHeight();
$('.news-item').matchHeight();
$('.tombstone').matchHeight();

// mobile nav

  $('.next-level').click(function(e) {
    e.preventDefault();
    thisSub = this.hash;
    $(thisSub).removeClass('hidden');
    $(thisSub).addClass('inview');
  });
  $('.closer').click(function(e) {
    e.preventDefault();
    $(thisSub).removeClass('inview');
    $(thisSub).addClass('hidden');
  });
  $('.nav-trigger').change(function(){
      if($('ul.device-subnav').hasClass('inview')) {
       $('ul.device-subnav').removeClass('inview'); 
       $('ul.device-subnav').addClass('hidden');      
        } else {
          $('ul.device-subnav').removeClass('inview'); 
        }
  });
  $('.sideclose').click(function() {
     console.log('here');
     $('.nav-trigger').attr("checked",false);
     $(this.hash).ScrollTo({offsetTop: 175});
  });

  $('.searchClick').click(function() {
    $('#searchQuery').animate({width: 'toggle'});
    $('#searchQuery').focus();
  })

	$('.viewer').click(function(e) {
	e.preventDefault();
	$(this).toggleClass('active');
	$('.viewer').not(this).removeClass('active');
	thisName = this.hash;
	thisChart = '#chart-'+thisName.substring(1);
	$(thisChart).toggleClass('show-chart');
	$('.desc').not(thisName).slideUp(); 
	$('.charts').not(thisChart).removeClass('show-chart');
	$(thisName).slideToggle();
if(!$('.charts').hasClass('show-chart')){
  $('#cm').addClass('show-chart'); 
}
});

});// end document.ready()

if(window.location.hash) {
	// smooth scroll to the anchor id
	$('html, body').animate({
			scrollTop: $(window.location.hash).offset().top - 175
	}, 900,'swing');
}

/* offer modal window and cookie */

$(document).on('click','#AcceptOffer',function(e) {
	e.preventDefault();
	setCookie('fortressOffer','accepted',1);
	location.href = $(this).attr('href');
});
function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays*24*60*60*1000));
	var expires = "expires="+d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
} 
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i=0; i<ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1);
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return "";
} 