@extends('admin.master')

@section('main')
<?php
setlocale(LC_MONETARY, 'en_NG');
function date_helper($datetime){
		$date = new \DateTime(str_replace('/','-',$datetime));
		$time = $date->format('H:i');
		$day = $date->format('D');
		$month_day = $date->format('M,j');
		$year = $date->format('Y');
		return compact('time','day','month_day','year');
		
}

$titleArray = ["1"=>"MISS","2"=>"MASTER","3"=>"MRS","4"=>"MR"];
$ageGroupArray = ["1"=>"INFANT","2"=>"CHILD","3"=>"ADULT"];
	
?>
<div class="main-panel">
		<div class="content-wrapper">
	@if (!empty($flight))
		<?php 
		$flightDetails = json_decode($flight->flightDetails); 
		$travellers = $flightDetails->travellers;
		$pricedItinerary = $flightDetails->pricedItinerary;
		$contactDetails = $flightDetails->contactInformation;
		?>
		<div class="row" style="margin-bottom:30px;">
				<div class="col-md-12 stretch-card">
				  <div class="card">
					<div class="card-body">
					  <p class="card-title">Select a booking Number</p>
					  <div class="form-group">
									<select class="form-control" id="bookingSelect">
											<option value="">select booking number</option>
											@foreach ($flights as $ft)
												<option value="{{$ft->id}}">Booking Number: {{$ft->bookingNumber}}</option>
											@endforeach
											  
											</select>
							  
							
						  </div>
					  
						  
					</div>
				  </div>
				</div>
		</div>
	
		<div class="row">
				<div class="col-md-12 stretch-card">
				  <div class="card">
					<div class="card-body">
					  <span class="card-title"><strong>{{$flight->bookingNumber.'   '}}</strong><i class="mdi mdi-arrow-down-bold-circle"></i></span>
					  <span style="float:right"><button class="btn" style="color:#fff; background-color: #009688; cursor:not-allowed;">{{$flight->status}}</button></span>
					  <div class="table-responsive">
						<table id="recent-purchases-listing" class="table">
						  <thead>
								<tr>
										<th scope="col">Departure</th>
										  <th scope="col">Departure Time</th>
										  <th scope="col">Arrival</th>
										  <th scope="col">Arrival Time</th>
										  <th scope="col">Duration</th>
										  <th scope="col">Carrier</th>
								</tr>
						  </thead>
						  <tbody>
								@foreach ($pricedItinerary->originDestinationOptions as $originDestinationOption)
								<?php
								$segCount = count($originDestinationOption->flightSegments); 
								for($i=0; $i<$segCount; $i++){
									$d = $originDestinationOption->flightSegments[$i];
									$dept_time = date_helper($d->departureTime);
									$arr_time = date_helper($d->arrivalTime); 
								?> 
						  <tr>
								<td>{{ $d->departureAirportName }}</td>
								<td>{{ $dept_time['time'].' '.$dept_time['day'].','.$dept_time['month_day'].' '.$dept_time['year'] }}</td>
								<td>{{ $d->arrivalAirportName }}</td>
								<td>{{ $arr_time['time'].' '.$arr_time['day'].' '.$arr_time['month_day'].' '.$arr_time['year'] }}</td>
								<td>{{ $d->journeyDuration }}</td>
								<td><img src="https://c.fareportal.com/n/common/air/3x/{{$d->airlineCode}}.png" style="width:20px; height:20px;">{{ $d->airlineName }}</td>
							  </tr>
						  <?php } ?>
						  @endforeach
						</tbody>
						</table>
					  </div>
					</div>
				  </div>
				</div>
			  </div>


			  <div class="row" style="margin-top:30px;">
					<div class="col-md-12 stretch-card">
					  <div class="card">
						<div class="card-body">
						  <span class="card-title">Travellers  <i class="mdi mdi-arrow-down-bold-circle"> </i></span>
						  <div class="table-responsive">
							<table id="recent-purchases-listing" class="table">
									<thead>
											<tr><th scope="col">Title</th>
											<th scope="col">Last Name</th>
											<th scope="col">First Name</th>
											<th scope="col">Date Of Birth</th>
											<th scope="col">Age Group</th></tr>
									</thead>
									<tbody>
										@foreach ($travellers as $traveller)
											<tr>
												<td>{{$titleArray[$traveller->title]}}</td>
												<td>{{$traveller->lastName}}</td>
												<td>{{$traveller->firstName}}</td>
												<td>{{$traveller->dateOfBirth}}</td>
												<td>{{$ageGroupArray[$traveller->ageGroup]}}</td>
											</tr>
										@endforeach
									</tbody>
							</tbody>
							</table>
						  </div>
						</div>
					  </div>
					</div>
				  </div>

				  @if ($flight->status == 'booked')
					 <div class="row" style="margin-top:30px">
					  <div class="col-md-12 stretch-card">
						  <a class="btn btn-danger" style="width:100%;" href="{{action('AdminController@cancelBooking', $flight->id)}}">Cancel Booking</a>
					  </div>
				  </div> 
				  @endif
				  

				  
			
			  


			  @else
	<div class="row">
			<div class="col-md-12 stretch-card">
			  <div class="card">
				<div class="card-body">
				  <p class="card-title">Select a booking Number</p>
				  <select id="bookingSelectNon" class="form-control">
					  <option value="">select booking number</option>
					  @foreach ($flights as $ft)
						  <option value="{{$ft->id}}">Booking Number: {{$ft->bookingNumber}}</option>
					  @endforeach
						
					  </select>
				</div>
			  </div>
			</div>
	</div>
	@endif
</div>
@include('admin.footer')
</div>
@endsection



		

