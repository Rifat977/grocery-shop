<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="{{ asset('assets/frontend/css/font-awesome.css') }}" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<link href="{{ asset('assets/frontend/css/nav.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="icon" href="{{ asset('/assets/frontend/logo.png') }} ">

<!-- Nav -->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/nav/css/normalize.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/nav/css/demo.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/nav/css/component.css') }}" />
		<script src="{{ asset('assets/frontend/nav/js/modernizr.custom.js') }}"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet' type='text/css'>
		
<script src="{{ asset('assets/frontend/js/jquery-1.11.1.min.js') }}"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('assets/frontend/js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/easing.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"  rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"  rel="stylesheet">
<!-- start-smoth-scrolling -->
<script src="{{ asset('assets/frontend/js/okzoom.js') }}"></script>

@stack('css')

</head>
	
<body>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5f463c4dcc6a6a5947aef2d8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@include("layouts.frontend.partial.header")

@yield('content')

@include("layouts.frontend.partial.footer")


<!-- Bootstrap Core JavaScript -->

<script src="{{ asset('assets/frontend/js/nav.js') }}"></script>
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	

	@stack('js')
  <script src="{{ asset('assets/frontend/nav/js/classie.js') }}"></script>
		<script src="{{ asset('assets/frontend/nav/js/gnmenu.js' ) }}"></script>
		<script>
			new gnMenu( document.getElementById( 'gn-menu' ) );
		</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
    var type= "{{Session::get('alert-type', 'info')}}"
    switch(type){
        case 'info':
        toastr.info( "{{Session::get('message')}}" );
        break;
        case 'success':
        toastr.success( "{{Session::get('message')}}" );
        break;
        case 'error':
        toastr.error( "{{Session::get('message')}}" );
        break;    
    }
  @endif
</script>
</body>
</html>