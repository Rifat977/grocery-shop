@extends('layouts.frontend.app')

@push('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endpush

@section('content')

<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->
<!-- banner -->
	
		
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>

		
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span>{{count($data)}} Products</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>
							<th>Product Name</th>	
							<th>Product</th>
							<th>Quanity</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
			@php
				$i=1;
			@endphp
				@foreach($data as $product)
					<tr class="rem1">
						<td class="invert">{{$i++}}</td>
						<td class="invert">{{$product->name}}</td>
						<td class="invert-image"><a href="#"><img style="height:50px; width:40px;" src="/assets/backend/productImage/{{$product->options->image}}" alt=" " class="img-responsive"></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class=""><span>{{$product->qty}}</span></div>	
								</div>
							</div>
						</td>
						<td class="invert">৳{{$product->price*$product->qty}}</td>
						
					</tr>
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
				<div class="col-md-4 checkout-left-basket">
								@if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                                </ul>
                                </div>
                                @endif
<form action="{{ URL::to('/order/add') }}" method="POST" class="">
@csrf

					<ul>
					@php
						$sum = 0;
						$p=0;
					@endphp

					@foreach($data as $product)
					@php
					$sum+=$product->subtotal;
					@endphp
						<li>{{$product->name}} <i>x {{$product->qty}}</i> <span>৳{{$product->price*$product->qty}} </span></li>
							
					@php
					$p++;
					@endphp
					@endforeach
						<li>Delivery Charge <i>-</i> <span> Free</span></li>
						<li>Total <i>-</i> <span>{{ $sum }}</span></li>

					</ul>
				</div>


				<div class="col-md-8 address_form_agile">
					  <h4>Add your Details</h4>
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Delivery to this Address:</label>
														    <textarea class="form-control" name="address" required=" " placeholder="Name, Phone number, zila/Upazilla, address "></textarea>
														</div>
													</div>
													
													<div class="clear"> </div>
												</div>
							
										</div>
									</section>



		<div class="checkout-left-basket mt-5">
				<button style="background:#000; color:#fff; border:none; padding:10px; margin-top:30px;" class="button" type="submit">Complete Order </button>
		</div>
		<div class="checkout-right-basket">
				<a style="background-color:green; text-decoration:none" class="order" href="{{ URL::to('/cart') }}">Return Cart  </a>
		</div>
				</div>

						<input type="hidden" name="cmrId" value="{{Auth::user()->id}}" />
						<input type="hidden" name="amount" value="<?php echo $sum; ?>" />
						<input type="hidden" name="invoice" value="<?php echo $dt = "LKSM".rand(); ?>" />
                        <input type="hidden" name="totalItem" value="<?php echo count($data); ?>" />			

</form>		
				<div class="clearfix"> </div>
				
			</div>

		
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
	
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
 <script>$(document).ready(function(c) {
 $('.close1').on('click', function(c){
 $('.rem1').fadeOut('slow', function(c){
 $('.rem1').remove();
 });
 });	  
 });
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
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 @endpush
 
 @endsection