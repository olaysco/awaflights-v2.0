@extends('admin.master')

@section('main')

<div class="main-panel">
		@if(Session::get('success'))
		<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:absolute;z-index:1000">
				<strong>Request Successfully processed</strong>
				<p>{{Session::get('message')}}</p>
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
						  <p class="card-title">Select booking number you wish to check status for </p>
						  <form method="POST" action="{{url('/dashboard/checkReservation')}}">
							  @csrf
						  <div class="form-group">
						  <select id="" class="form-control" name="bookingId" required>
								<option value="">select booking number</option>
								@foreach ($flights as $ft)
									<option value="{{$ft->id}}">Booking Number: {{$ft->bookingNumber}}</option>
								@endforeach
								  
								</select>
						  </div>
								
								<div>
									<button class="btn btn-primary" type="submit">Issue Ticket</button>
								</div>
						  </form>
						</div>
					  </div>
					</div>
			</div>

			@if(Session::get('bookingStatus'))
			<div class="row" style="margin-bottom:30px;">
					<div class="col-md-12 stretch-card">
					  <div class="card">
						<div class="card-body">
						  <p class="card-title">Flight current status from server </p>
						  <hr>
						  <p>Booking Status     <strong style="padding-left:10px;">{{Session::get('bookingStatus')}}</strong></p>
						  <p>Booking Number <strong style="padding-left:10px;">{{Session::get('bookingNumber')}}</strong></p>
						  <p>Ticket download link  <strong style="padding-left:10px;">{{Session::get('ticketDownloadLink')??'No download link'}}</strong>
						</div>
						<div class="card">
							<form method="POST" action="{{url('/dashboard/saveflight')}}">
								@csrf
							<input name="flightStatus" value="{{Session::get('bookingStatus')}}" type="hidden">
							<input name="flightId" value="{{Session::get('flightId')}}" type="hidden">
							<button type="submit" class="btn btn-primary" style="width:100%">
								Save flight status to local
							</button>
							</form>
						</div>
					  </div>
					  
					</div>
			</div>
			@endif
	</div>
@include('admin.footer')
</div>
@endsection
