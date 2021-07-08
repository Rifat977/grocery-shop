	<!-- <script type="text/javascript">
		$(document).ready(function(){
			$("#cardValue").hide();
		});
	</script> -->
	<style>
		.gn-menu li :hover{
			color:white !important;
		}
		.gn-menu li a :hover{
			color:white !important;
		}
	</style>
<div class="agileits_header fixed" >
		<div class="container">
			<ul id="gn-menu" class="gn-menu-main"  >
				<li class="gn-trigger">
					<a style="background:;" class="gn-icon gn-icon-menu"><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller">
							<ul class="gn-menu">
								 <!-- <li class="gn-search-item">
									<input placeholder="Search" type="search" class="gn-search">
									<a style="color:#fff;" class="gn-icon gn-icon-search"><span>Search</span></a>
								</li>  -->
								<li>
									<a href="{{ URL::to('/') }}" class="gn-icon gn-icon-download">Home</a>
								</li>
								<li>
									<a  href="{{ URL::to('/') }}" class="gn-icon gn-icon-product">Product</a>
								</li>
								<li>
									<a  href="{{ URL::to('/') }}" class="gn-icon gn-icon-category">Category</a>
								</li>
								@guest
								<li>
									<a  href="{{ URL::to('/login') }}" class="gn-icon gn-icon-user">Login</a>
								</li>
								@else
								<li>
									<a  href="{{ URL::to('/') }}" class="gn-icon gn-icon-user">Your Profile</a>
								</li>
								@endguest
								<li>
									<a  href="{{ URL::to('/order') }}" class="gn-icon gn-icon-order">Order</a>
								</li>
								<li>
									<a  href="{{ URL::to('/cart') }}" class="gn-icon gn-icon-cart">View Cart</a>
								</li>
								<li>
									<a  href="{{ URL::to('/mail.html') }}" class="gn-icon gn-icon-contact">Contact Us</a>
								</li>
								<li>
									<a class="gn-icon gn-icon-about">About Us</a>
								</li>
								<li>
									<a class="gn-icon gn-icon-privacy">Privacy</a>
								</li>
								
							</ul>
						</div><!-- /gn-scroller -->
					</nav>
				</li>
				
		<style>
			.dropdown:hover{
				color:#fff;
			}
		</style>				
<li class="dropdown">
  <a class="dropdown-toggle" style="margin-top:3px;" id="dropdownMenuButton" data-toggle="dropdown">
    <i style="font-size:20px;" class="fa fa-user-circle" aria-hidden="true"></i>
</a>
  <p class="dropdown-menu" >
						@guest
								<a class="dropdown-item" href="/login">Login</a>
								@if (Route::has('register'))
                            	<a class="dropdown-item" href="{{ route('register') }}">Register</a>
								@endif 
						@else
							<a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}</a>
							   
									<?php
									$cmrid =  Auth::user()->id ;
									session(['cmrID'=> $cmrid ]);
									?>
									<a class="dropdown-item" href="{{ URL::to('/order') }}"  ><i class="fa fa-list-ul"></i> My Order</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
						@endguest	
</p>

</li>

				<li><a href="{{ URL::to('/cart') }}" class="codrops-icon codrops-icon-drop"><span>View Cart </span>  <!-- <sup><button id="cardValue" class="badge badge-danger" style="border:none;">+</button></sup> --></a></li>

			</ul>
			
		</div><!-- /container -->


		<!-- <div class="w3l_offers">
			<a href="products.html">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="#" method="post">
			@csrf
				<input type="text" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value=" ">
			</form>
		</div>
		
		<div class="product_list_header">  
			<form action="/cart" method="get">
			
                <fieldset>
                    <input type="submit"  value="View your cart" class="button" />
                </fieldset>
            </form>
		</div>
		
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
							@guest
								<li><a href="/login">Login</a></li>
								@if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
								@endif 
							@else
							<li><a style="margin-left:8px;" href="#"> {{ Auth::user()->name }}</a></li>

							<li>    
									<?php
									$cmrid =  Auth::user()->id ;
									session(['cmrID'=> $cmrid ]);
									?>
									<a href="{{ URL::to('/order') }}" style="background:none; border:none" ><i class="fa fa-list-ul"></i> My Order</a>
							</li>
							<li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
							@endguest	
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="{{ URL::to('mail.html') }}">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div> -->
	</div>
<!-- script-for sticky-nav -->
<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").addClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
<style>
	@media (max-width: 767px) {
    .dont {
        margin-top:20px;
    }
}
</style>
	<div class="logo_products" >
		<div class="container dont">
			<div class="w3ls_logo_products_left mt-4">
				<!-- <h1><a href="{{ URL::to('/') }}"><span>Laksam</span> Store</a></h1> -->
				<h2><a class="text-dark" href="{{ URL::to('/') }}">Amar Laksam</a></h2>
			</div>
			
			<div class="w3ls_logo_products_left1 mt-4">
				<div class="col-12 in-gp-tl">
					<div class="input-group">
						
						<input type="text" style="border-radius: 3px;" class="border border-danger" placeholder="Search for...">

						<span class="input-group-btn">
							<button class="btn btn-danger" type="button">Search</button>
						</span>
					</div><!-- /input-group -->
				</div><!-- /.col-lg-6 -->
			</div>


			<div class="w3ls_logo_products_left1 mb-2">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
