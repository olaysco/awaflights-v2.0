@extends('admin.master')

@section('main')
<div class="main-panel">
	@if(Session::get('errorMsg'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:absolute;z-index:1000">
				<strong>Error occured</strong> {{Session::get('errorMsg') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		</div>
	@endisset
	
	@if(Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:absolute;z-index:1000">
				<strong>Request Successfully processed</strong>
				<p>{{Session::get('message')}}</p>
				<p>{{Session::get('bookingStatus')}}</p>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		</div>
	@endisset
		
	<div class="content-wrapper">
			<div class="row" style="margin-bottom:30px;">
					<div class="col-md-12 stretch-card">
					  <div class="card">
						<div class="card-body">
						  <p class="card-title">Ensure you select the right booking number </p>
						  <form method="POST" action="{{url('/dashboard/issueTicket')}}">
							  @csrf
						  <div class="form-group">
						  <select id="" class="form-control" name="bookingId" required>
								<option value="">select booking number</option>
								@foreach ($flights as $ft)
									<option value="{{$ft->id}}">Booking Number: {{$ft->bookingNumber}}</option>
								@endforeach
								  
								</select>
						  </div>
								<div class="form-group">
										<div class="input-group">
										  <div class="input-group-prepend">
											<span class="input-group-text bg-primary text-white"><i class="mdi mdi-key"></i></span>
										  </div>
										  <input type="text" name="walletPasscode" class="form-control" placeholder="wallet passcode" aria-label="code" required>
										</div>
								</div>
								<div>
									<button class="btn btn-primary" type="submit">Issue Ticket</button>
								</div>
						  </form>
						</div>
					  </div>
					</div>
			</div>

	</div>
@include('admin.footer')
</div>
@endsection
