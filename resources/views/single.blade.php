@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')
<script>
$(document).ready(function(){
	$("#itemAdd").hide();
	$("#addCart").on("click",function(){
		var proid = $("#addCart").attr("data-id");
		$("#addCart").hide();
		$("#itemAdd").show();	
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
});
</script>
<?php $x = count($dataD) ?>
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
			<div class="w3l_banner_nav_right_banner3">
				<h3>Best Deals For New Products<span class="blink_me"></span></h3>
			</div>
			<div class="agileinfo_single">
				<h5>{{$data->proName}}</h5>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="/assets/backend/productImage/{{$data->proImage}}" alt=" " class="img-responsive" />
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p>{{$data->details}}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4>৳{{$data->price}} <span>৳{{$data->oldprice}}</span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
											
							 
							 	<input type="hidden" id="proid" name="productId" value="{{$data->id}}" />
							 	@if($data->stock>0)
							 	<input type="button" id="addCart" data-id="{{$data->id}}" name="submit" value="Add to cart" class="button" />
							 	@else
							 	<input type="button" id="" data-id="" name="submit" value="Not Available" class="button bg-light text-danger border border-danger" />
							 	@endif
								<input type="button" id="itemAdd" value="Item added" class="btn btn-outline-success" disabled />
							 
											
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		<div class="container">
			<h3>Popular Products</h3>
			<div class="w3ls_w3l_banner_nav_right_grid1">
					<h6></h6>
			@php 
				$cp = 1;
			@endphp
					@foreach($dataD as $data)
									<div class="col-md-3 col-6 top_brand_left mt-2 mb-2" style="margin-top:8px;">
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
				</div>

		</div>
	</div>
@push('js')

@endpush

@endsection

