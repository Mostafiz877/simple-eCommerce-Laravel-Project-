@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-8">

			<div class="card mb-5">
				<div class="card-header bg-primary text-white">
					Product List
				</div>
				<div class="card-body">


					@if(session('deletestatus'))
					<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
						{{session('deletestatus')}}

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					@endif

					<table class="table table-bordered">
						<thead>
							<tr>

								<th scope="col">S.L No</th>
								<th scope="col">Category</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product desc.</th>
								<th scope="col">Product Price</th>
								<th scope="col">Product Quantity</th>
								<th scope="col">Alert Quantity</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>

						<tbody>
							@forelse($products as $product)
							
							<tr>
								<td> {{$loop->iteration}} </td>

								{{-- <td>{{ App\Category::find($product->category_id)->category_name}}</td> --}}




								<td>{{$product->relationToCategory->category_name }}</td>

								<td>{{$product->product_name}}</td>
								<td>{{str_limit($product->product_description,30)}}</td>
								<td>{{$product->product_price}}</td>
								<td>{{$product->product_quantity}}</td>
								<td>{{$product->alert_quantity}}</td>
								<td>
									<img height="50px" width="50px" src="{{asset('uploads/product_photos')}}/{{$product->product_image}}" alt="not found">
								</td>

								<td>
									<div class="btn-group" role="group" aria-label="Basic example">
										<a href="{{url('delete/product')}}/{{$product->id}}" class="btn btn-sm btn-danger" title="Delete temporary">Delete</a>

										<a href="{{url('edit/product')}}/{{$product->id}}" class="btn btn-sm btn-warning">Edit</a>
									</div>
								</td>
							</tr>

							@empty
							<tr>
								<td colspan="8" class="text-center text-danger">No data Available</td>
							</tr>
							@endforelse

						</tbody>
					</table>

					{{$products->links()}}

				</div>
			</div>

			<div class="card">
				<div class="card-header bg-danger text-warning">
					Deleted List
				</div>
				<div class="card-body">


					@if(session('restorestatus'))
					<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
						{{session('restorestatus')}}

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					@endif


					@if(session('forcedeletestatus'))
					<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
						{{session('forcedeletestatus')}}

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					@endif

					<table class="table table-bordered">
						<thead>
							<tr>

								<th scope="col">S.L No</th>
								<th scope="col">Product Name</th>
								<th scope="col">Product desc.</th>
								<th scope="col">Product Price</th>
								<th scope="col">Product Quantity</th>
								<th scope="col">Alert Quantity</th>
								<th scope="col">Image</th>
								<th scope="col">Action</th>
							</tr>
						</thead>

						<tbody>
							@forelse($deleted_products as $deleted_product)
							
							<tr>
								<td>
								{{$loop->iteration}}
								</td>
								<td>{{$deleted_product->product_name}}</td>
								<td>{{str_limit($deleted_product->product_description,30)}}</td>
								<td>{{$deleted_product->product_price}}</td>
								<td>{{$deleted_product->product_quantity}}</td>
								<td>{{$deleted_product->alert_quantity}}</td>
								<td>
									<img height="50px" width="50px" src="{{asset('uploads/product_photos')}}/{{$deleted_product->product_image}}" alt="not found">
								</td>
								<td>
									<div class="btn-group" role="group" aria-label="Basic example">
										<a href="{{url('restore/product')}}/{{$deleted_product->id}}" class="btn btn-sm btn-warning">Restore</a>
										<a title="Delete Forever" href="{{url('force/delete/product')}}/{{$deleted_product->id}}" class="btn btn-sm btn-danger">Delete</a>
									</div>
								</td>
							</tr>

							@empty
							<tr>
								<td colspan="8" class="text-center text-danger">No data Available</td>
							</tr>
							@endforelse

						</tbody>
					</table>

				{{-- 	{{$deleted_products->links()}} --}}

				</div>
			</div>

		</div>
		<div class="col-4">
			<div class="card">
				<div class="card-header bg-primary text-white">
					Add Product Form
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

					@if($errors->all())


					<div class="alert alert-danger">
						
						@foreach($errors->all() as $error )
						<li>{{$error}}</li>
						@endforeach

					</div>

					@endif



					<form action="{{url('add/product/insert')}}" method="post" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="exampleInputEmail1">Product Name</label>
							<input type="text" class="form-control" placeholder="Enter Product Name" name="product_name" value="{{old('product_name')}}">
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Category Name</label>
							<select name="category_id" id="" class="form-control">
								<option value="">--select One---</option>
								@foreach($categories as $category)

								<option value="{{$category->id}}">{{$category->category_name}}</option>

								@endforeach
								
							</select>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Product Description</label>
							<textarea name="product_description" id="" cols="30" rows="3" class="form-control">{{old('product_description')}}</textarea>
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Product Price</label>
							<input name="product_price" type="number" class="form-control" placeholder="Enter Product Price" value="{{old('product_price')}}">
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Product Quantity</label>
							<input name="product_quantity" type="number" class="form-control" placeholder="Enter Product Quantity" value="{{old('product_quantity')}}">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Alert Quantity</label>
							<input name="alert_quantity" type="number" class="form-control" placeholder="Alert Quantity" value="{{old('alert_quantity')}}">
						</div>


						<div class="form-group">
							<label for="exampleInputEmail1">Product Image</label>
							<input name="product_image" type="file" >
						</div>


						<input type="submit" name="" value="Add Product" class="btn btn-primary">
					</form>
					
				</div>
				
			</div>



			
		</div>
		
	</div>
	
</div>

@endsection