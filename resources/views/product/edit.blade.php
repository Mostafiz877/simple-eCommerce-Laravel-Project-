@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-6 offset-3 ">

			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{url('add/product/view')}}">Product List</a></li>
					<li class="breadcrumb-item active" aria-current="page">{{$single_product_info->product_name}}</li>
				</ol>
			</nav>
			<div class="card">
				<div class="card-header bg-primary text-white">
					Edit Product Form
				</div>
				<div class="card-body">

					@if(session('status'))
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
						{{session('status')}}

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					@endif

					<form action="{{url('edit/product/insert')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name</label>
							<input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="{{$single_product_info->product_name}}">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Product Description</label>
							<textarea name="product_description" id="" cols="30" rows="3" class="form-control">{{$single_product_info->product_description}}</textarea>
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Product Price</label>
							<input name="product_price" type="number" class="form-control" placeholder="Enter Product Price" value="{{$single_product_info->product_price}}">
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Product Quantity</label>
							<input name="product_quantity" type="number" class="form-control" placeholder="Enter Product Quantity" value="{{$single_product_info->product_quantity}}">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Alert Quantity</label>
							<input name="alert_quantity" type="number" class="form-control" placeholder="Alert Quantity" value="{{$single_product_info->alert_quantity}}">
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Product Image</label>
							<input name="product_image" type="file">
						</div>

						<img src="{{asset('uploads/product_photos')}}/{{$single_product_info->product_image}}" alt="not found" height="150px" width="150px" style="border-radius:5px;">

						<input type="hidden" name="product_id" value="{{$single_product_info->id}}" >

						<input type="submit" name="" value="Save" class="btn btn-sm btn-warning">
					</form>
					
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>

@endsection