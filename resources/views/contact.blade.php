@extends('layouts.frontendapp')

@section('frontend_content')

	<!-- Page -->
	<div class="page-area contact-page">
		<div class="container spad">
			<div class="text-center">
				<h4 class="contact-title">Get in Touch</h4>
			</div>


			@if(session('status'))


			<div class="alert alert-success">

				{{session('status')}}
				

			</div>

			@endif
			<form class="contact-form" method="post" action="{{url('contact/insert')}}">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<input type="text" placeholder="First Name *" name="first_name"> 
					</div>
					<div class="col-md-6">
						<input type="text" placeholder="Last Name *" name="last_name"> 
					</div>
					<div class="col-md-12">
						<input type="text" placeholder="Subject" name="subject">
						<textarea placeholder="Message" name="message"></textarea>
						<div class="text-center">
							<button class="site-btn" type="submit">Send Message</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="container contact-info-warp">
			<div class="contact-card">
				<div class="contact-info">
					<h4>Shipping & Returnes</h4>
					<p>Phone:    +53 345 7953 32453</p>
					<p>Email:   yourmail@gmail.com</p>
				</div>
				<div class="contact-info">
					<h4>Informations</h4>
					<p>Phone:    +53 345 7953 32453</p>
					<p>Email:   yourmail@gmail.com</p>
				</div>
			</div>
		</div>
		<div class="map-area">
			<div class="map" id="map-canvas"></div>
		</div>
	</div> 
	<!-- Page end -->



@endsection