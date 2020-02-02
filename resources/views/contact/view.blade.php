@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-12">

			<div class="card mb-5">
				<div class="card-header bg-primary text-white">
				Contact Messages
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
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Subject</th>
								<th scope="col">Message</th>
								<th scope="col">Action</th>

							</tr>
						</thead>

						<tbody>
							@forelse($contactmessages as $contactmessages)
							
							<tr class={{($contactmessages->read_status==1)?"bg-warning":""}}>
								<td> {{$loop->iteration}} </td>

								{{-- <td>{{ App\Category::find($product->category_id)->category_name}}</td> --}}


								<td>{{$contactmessages->first_name}}</td>
								<td>{{$contactmessages->last_name}}</td>
								<td>{{$contactmessages->subject}}</td>
								<td>{{$contactmessages->message}}</td>
								<td>
									@if($contactmessages->read_status==1)
									<a  class="btn btn-sm btn-primary" href="{{url('message/read')}}/{{$contactmessages->id}}">Read</a>
									@endif
									
								</td>

							</tr>

							@empty
							<tr>
								<td colspan="8" class="text-center text-danger">No data Available</td>
							</tr>
							@endforelse

						</tbody>
					</table>


				</div>
			</div>

		</div>
	
</div>

@endsection