$(function(){
		
		//Trigger
		$('.trigger').click(function(){
				$(this).toggleClass('active')
				$('.gnb').toggleClass('active')
		})
		
		$('section, gnb a').click(function(){
				$('.gnb').removeClass('active')
				$('.trigger').removeClass('active')
		})

        /* Smooth Scrolling */
        $('.gnb a').click(function(e){
            e.preventDefault();
            $.scrollTo(this.hash || 0,900)
        })

          //Change CSS width Scroll
        $(window).scroll(function(){
            if($(window).scrollTop() > 50) {
            $('header, .gototop').addClass('active')
            }
            else {
            $('header, .gototop').removeClass('active')
            }
        })

        // slick.js : work-slider
        $('.work-slider').slick({
            dots: true,
            infinite: true,
            // autoplay:true,
            arrows:false,
            speed: 3000,   
            slidesToShow: 2,
            slidesToScroll: 2, //한번 스크롤할때마다 보이는 div 갯수
            //이게 적어질수록 도트 갯수가 늘어난다.
            responsive: [
                {
                breakpoint: 1840,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    // autoplay:true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                },
                {
                breakpoint: 480,
                settings: {
                    // autoplay:true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        })

    

        //pdf
        var userAgent = navigator.userAgent || navigator.vendor || window.opera; 

        // iOS detection from: http://stackoverflow.com/a/9039885/177710 
        if( /iPad|iPhone|iPod/.test( userAgent ) && !window.MSStream ) 
        { 
            location.href	= img_src;
        } 
        else 
        { 
            // Windows Phone must come first because its UA also contains "Android" 
            // if (/windows phone/i.test(userAgent)) { 
            // else if (/android/i.test(userAgent)) { 
            location.href	= 'http://docs.google.com/gview?embedded=true&url='+ img_src; 
        }
		
})


