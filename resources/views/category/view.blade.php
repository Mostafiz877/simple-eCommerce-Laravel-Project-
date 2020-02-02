@extends('layouts.app')

@section('content')

<div class="container">


	<div class="card mb-6">
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
						<th scope="col">Category Name</th>
						<th scope="col">Menu Status</th>
						<th scope="col">Created AT</th>
						<th scope="col">Action</th>
					</tr>
				</thead>

				<tbody>
					@forelse($categories as $category)

					<tr>
						<td>
							{{$loop->iteration}}
						</td>
						<td>{{$category->category_name}}</td>
						<td>{{($category->menu_status ==1) ? "Yes":"No"}}</td>
						<td>{{$category->created_at->format('d-M-y h:i a')}}
							<br>


							{{$category->created_at->diffForHumans()}}

						</td>

						<td>
							<a href="{{url('change/menu/status')}}/ {{$category->id}}" class="btn btn-sm btn-warning">Change</a>
						</td>



					</tr>

					@empty
					<tr>
						<td colspan="8" class="text-center text-danger">No data Available</td>
					</tr>
					@endforelse

				</tbody>
			</table>

			{{-- 					{{$products->links()}} --}}

		</div>
	</div>



	<div class="card" style="margin:20px;">
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


			<div  style="width:30%" >
				<form action="{{url('add/category/insert')}}" method="post" enctype="multipart/form-data" >

					{{csrf_field()}}

					<div class="form-group">
						<label for="exampleInputEmail1">Product Category</label>
						<input type="text" class="form-control" placeholder="Enter Product Category" name="category_name" value="{{old('category_name')}}">
					</div>


				<div class="form-group">
					<input type="checkbox" name="menu_status" value="1" id="menu">  <label for="menu">Use as Menu</label>
				</div>

					<button type="submit" class="btn btn-primary">Add Category</button>
				</form>


			</div>

		</div>

	</div>


	
	

</div>

@endsection