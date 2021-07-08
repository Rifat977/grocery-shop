@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')
<?php $x = count($data) ?>
<script>
$(document).ready(function(){
	@for($i=1; $i<$x+1; $i++)
	$("#itemAdd<?php echo $i; ?>").hide();
	$("#addCart<?php echo $i; ?>").on("click",function(){
		var proid = $("#addCart<?php echo $i; ?>").attr("data-id");
		$("#addCart<?php echo $i; ?>").hide();
		$("#itemAdd<?php echo $i; ?>").show();	
		if(proid){
			$.ajax({
				url: "{{ url('/add/cart/') }}/"+proid,
				type: "GET",
				dataType: "json",
				success:function(data){
					alert('Done');

				}
			})
		}
	});
	@endfor
});
</script>
<!-- banner -->
<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				@include("layouts.frontend.partial.sidebar")

			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			<section class="slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<div class="w3l_banner_nav_right_banner">
								<h3>Laksam Valy <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner1">
								<h3>Make your <span>food</span> with Spicy.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
						<li>
							<div class="w3l_banner_nav_right_banner2">
								<h3>upto <i>50%</i> off.</h3>
								<div class="more">
									<a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- flexSlider -->
				<link rel="stylesheet" href="{{ asset('assets/frontend/css/flexslider.css') }}" type="text/css" media="screen" property="" />
				<script defer src="{{ asset('assets/frontend/js/jquery.flexslider.js') }}"></script>
				<script type="text/javascript">
				$(window).load(function(){
				  $('.flexslider').flexslider({
					animation: "slide",
					start: function(slider){
					  $('body').removeClass('loading');
					}
				  });
				});
			  </script>
			<!-- //flexSlider -->
		</div>
		<div class="clearfix"></div>
	</div>

<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
			<h3>{{ $dataC->category }}</h3>
			<div class="agile_top_brands_grids">
				@php 
				$cp = 1;
				@endphp
                @foreach($data as $data)
				<div class="col-md-3 top_brand_left">
					<div class="hover14 column">
						<div class="agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block" >
										<div class="snipcart-thumb">
											<a href="{{ URL::to('product.html/'.$data->id) }}"><img title=" " alt=" " style="height:130px" src="/assets/backend/productImage/{{$data->proImage}}" /></a>		
											<p> {{ $data->proName }}</p>
											<h4>৳{{$data->price}} <span>৳{{$data->oldprice}}</span></h4>
										</div>
										<div class="snipcart-details top_brand_home_details">
											
											<input type="hidden" id="proid" name="productId" value="{{$data->id}}" />
											@if($data->stock>0)
											<input type="button" id="addCart<?php echo $cp; ?>" data-id="{{$data->id}}" name="submit" value="Add to cart" class="button" />
											@else
											<input type="button" id="" data-id="" name="submit" value="Not Available" class="button" style="background: #000;" />
											@endif
											<input type="button" id="itemAdd<?php echo $cp; ?>" value="ITEM ADDED" class="button" style="background:none; border:none; color:#000;" disabled />
											
								
										</div>
									</div>
								</figure>
							</div>
						</div>
					</div>
				</div>
				@php
					$cp++;
				@endphp
				@endforeach
					<div class="clearfix"> </div>
					<div class="agileinfo_move_text">
						<div class="agileinfo_marquee">
							<h4>লাকসামের<span class="blink_me">সেরা</span> অনলাইন গ্রোসারি শপ</h4>
						</div>
						<div class="agileinfo_breaking_news">
							<span> </span>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
@push('js')

@endpush

@endsection

