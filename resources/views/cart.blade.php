@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')
<?php $x = count($data) ?>
<script>
$(document).ready(function(){
	@for($i=1; $i<$x+1; $i++)
	$("#cartPlus<?php echo $i; ?>").on("click",function(){
		var proid = $("#cartPlus<?php echo $i; ?>").attr("data-id");	
		if(proid){
			$.ajax({
				url: "{{ url('/plus/cart/') }}/"+proid,
				type: "GET",
				dataType: "json",
				success:function(data){
					alert('Done');
				}
			})
		}
	});
	@endfor

	@for($i=1; $i<$x+1; $i++)
	$("#cartMin<?php echo $i; ?>").on("click",function(){
		var proid = $("#cartMin<?php echo $i; ?>").attr("data-id");	
		if(proid){
			$.ajax({
				url: "{{ url('/min/cart/') }}/"+proid,
				type: "GET",
				dataType: "json",
				success:function(data){
					alert('Done');
				}
			})
		}
	});
	@endfor

	@for($i=1; $i<$x+1; $i++)
	$("#cartRemove<?php echo $i; ?>").on("click",function(){
		var proid = $("#cartRemove<?php echo $i; ?>").attr("data-id");
		$("#rem<?php echo $i; ?>").hide();	
		if(proid){
			$.ajax({
				url: "{{ url('/remove/cart/') }}/"+proid,
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
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Your Cart</li>
			</ul>
		</div>
	</div>
		<div class="privacy about">
			<h3>Your <span>Cart</span> </h3>

		
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span>{{count($data)}} Products</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
						
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
                @php 
				$i=1;
				$cp = 1;
				@endphp
               @foreach($data as $product)
                    <tr class="rem1" id="rem<?php echo $cp; ?>">
						<td class="invert">{{$i++}}</td>
						<td class="invert-image"><a href="product.html/{{$product->id}}"><img style="height:50px; width:40px;" src="/assets/backend/productImage/{{$product->options->image}}" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                         
									<div id="cartMin<?php echo $cp; ?>" data-id="{{$product->rowId}}" class="entry value-minus">&nbsp;</div>
									
									<div class="entry value"><span>{{ $product->qty }}</span></div>
									<input type="hidden" id="rowId" value="{{$product->rowId}}" />
									<div id="cartPlus<?php echo $cp; ?>" data-id="{{$product->rowId}}" class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<td class="invert">{{ $product->name }}</td>
						
						<td class="invert">৳{{ $product->price }}</td>
						<td class="invert">
							<div id="cartRemove<?php echo $cp; ?>" data-id="{{$product->rowId}}" class="rem">
								<div class="close1"> </div>
							</div>

						</td>
					</tr>
				@php
					$cp++;
				@endphp
				@endforeach

				</tbody></table>
			</div>
<style>
	.checkout-left-basket ul li:nth-child({{count($data)+2}}) {
    font-size: 1em;
    color: #212121;
    font-weight: 600;
    padding: 1em 0;
    border-top: 1px solid #DDD;
	border-bottom: 1px solid #DDD;
    margin: 2em 0 0;
}
</style>

<div class="checkout-left">
<div class="col-md-4 checkout-right-basket">	
<a href="{{ URL::to('/') }}" >CONTINUE SHOP</a>
</div>
</div>

			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">

					@if(!count($data)==0)	
					<a href="{{ URL::to('/checkout') }}"><h4>Checkout</h4></a>
					@endif

					<ul>
					@php
						$sum = 0;
					@endphp

					@foreach($data as $product)
					@php
					$sum+=$product->subtotal;
					@endphp
						<li>{{$product->name}} <i>x {{$product->qty}}</i> <span>৳{{$product->price*$product->qty}} </span></li>
					@endforeach
						<li>Delivery Charge <i>-</i> <span> Free</span></li>
						<li>Total <i>-</i> <span>৳{{ $sum }}</span></li>
					</ul>
				</div>
				

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

	
@push('js')
 <script src="{{ asset('assets/frontend/js/jquery-1.11.1.min.js') }}"></script>
 <!--quantity-->
 <script>
 $('.value-plus').on('click', function(){
 var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
 divUpd.text(newVal);
 });
 
 $('.value-minus').on('click', function(){
 var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
 if(newVal>=1) divUpd.text(newVal);
 });
 </script>
 <!--quantity-->
 <script>
// @for($i=1; $i<$x+1; $i++)
// 	$("#cartRemove<?php echo $i; ?>").on("click",function(){
// 		var proid = $("#cartRemove<?php echo $i; ?>").attr("data-id");	
// 		$('.rem1').remove();
// 	});
// @endfor



//  $(document).ready(function(c) {
//  $('.close1').on('click', function(c){
//  $('.rem1').fadeOut('slow', function(c){
//  $('.rem1').remove();
//  });
//  });	  
//  });
 </script>
 <script>$(document).ready(function(c) {
 $('.close2').on('click', function(c){
 $('.rem2').fadeOut('slow', function(c){
 $('.rem2').remove();
 });
 });	  
 });
 </script>
 <script>$(document).ready(function(c) {
 $('.close3').on('click', function(c){
 $('.rem3').fadeOut('slow', function(c){
 $('.rem3').remove();
 });
 });	  
 });
 </script>
 
 <!-- //js -->
 <!-- script-for sticky-nav -->
 <script>
 $(document).ready(function() {
 var navoffeset=$(".agileits_header").offset().top;
 $(window).scroll(function(){
 var scrollpos=$(window).scrollTop(); 
 if(scrollpos >=navoffeset){
 $(".agileits_header").addClass("fixed");
 }else{
 $(".agileits_header").removeClass("fixed");
 }
 });
 
 });
 </script>
 <!-- //script-for sticky-nav -->
 <!-- start-smoth-scrolling -->
 <script type="text/javascript" src="js/move-top.js"></script>
 <script type="text/javascript" src="js/easing.js"></script>
 <script type="text/javascript">
 jQuery(document).ready(function($) {
 $(".scroll").click(function(event){		
 event.preventDefault();
 $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
 });
 });
 </script>
 <!-- start-smoth-scrolling -->
 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
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
 <!-- //here ends scrolling icon -->

 @endpush
 
 @endsection