<?php
if(null === session('flight')){
	header('location: /');
	die();
}

$flight = session('flight');
?>
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
$ticketClasses = ['Economy','PREMIUM ECONOMY', 'BUSINESS', 'FIRST '];
$flightDetails = json_decode($flight->flightDetails); 
$travellers = $flightDetails->travellers;
$pricedItinerary = $flightDetails->pricedItinerary;
$contactDetails = $flightDetails->contactInformation;
$airlineName = session('airlineName');;
$passportRequired = session('passportRequired');
$ticketClass = session('ticketClass');
$limitTime = date_helper($pricedItinerary->ticketLimitTime); 
$totalTravellers = $pricedItinerary->fareBreakDown->numberOfTravellers;	
$adult = $pricedItinerary->fareBreakDown->numberOfAdults;
$children = $pricedItinerary->fareBreakDown->numberOfChildren;
$infants = $pricedItinerary->fareBreakDown->numberOfInfant;
?>
@include('layout.header')


<div class="main-cont">
		<div class="body-wrapper">
		  <div class="wrapper-padding">
				<div class="page-head">
						<div class="page-title">Air Ticket - <span>booking</span></div>
						<div class="breadcrumbs">
						  <a href="#">Home</a> / <a href="#">Flight</a> / Flight Booking<span>/ Payment Methods</span>
						</div>
						<div class="clear"></div>
						  </div>
	  
		  <div class="sp-page">
			  <div class="sp-page-a">
				  <div class="sp-page-l">
						<div class="sp-page-lb">
							<div class="sp-page-p p6">
							  <div class="booking-left bs br-4">
								  <h2 style="text-transform:uppercase; font-weight: bold;">Your flight booking is successful</h2>

								  <div class="comlete-alert">
									  <div class="comlete-alert-a">
										  <b>Thank You. Your Booking is Being processed.</b>
										  <span> Note your flight has only been booked and not yet processed, kindly make payment. </span>
									  </div>
								  </div>
								  
								  <div class="complete-info">
									  <h2>Payment details</h2>
									  <div class="complete-info-table">
										  <div class="complete-info-i" id="bookingNumber" style="display:none">
											  <div class="complete-info-l">Booking Number:</div>
											  <div class="complete-info-r">{{$flight->bookingNumber}}</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i" id="bookingNumber">
												<div class="complete-info-l">Payment Status:</div>
												<div class="complete-info-r" id="paymentStatus">Not yet paid</div>
												<div class="clear"></div>
											</div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Payment Reference Number:</div>
											  <div class="complete-info-r">{{$flight->referenceNumber}}</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Flight Fare</div>
											  <div class="complete-info-r">&#8358;{{number_format($pricedItinerary->fareBreakDown->totalFareInKobo /100)}}</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Other Fare</div>
											  <div class="complete-info-r">&#8358;0</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Total Fare</div>
											  <div class="complete-info-r">&#8358;{{number_format($pricedItinerary->fareBreakDown->totalFareInKobo /100)}}</div>
											  <div class="clear"></div>
										  </div>
									  </div>
									  <div id="all-payment-wrapper">
									  <div class="booking-devider no-margin"></div>	
									  <h2  style="text-transform:uppercase; font-weight: bold;">How would you like to pay?</h2>
									 <div class="payment-wrapper"> 
											 <div class="payment-tabs">
												 <a href="#" class="active">Credit Card <span></span></a>
												 <a href="#">Bank Deposit <span></span></a>
											 </div>
											 <div class="clear"></div>
											 <div class="payment-tabs-content" >
												 
												 <div class="payment-tab" style="display:block;">
													<div class="complete-info-i">
															<div class="complete-inf"> <img src="{{asset('img/paystack.png')}}" style="width:350px; height:auto;" /></div>
															<div class="complete-inf">
																<button style="	margin-top: 20px;
																padding: 8px;
																background-color: #08a5db;
																color: #fff;
																border: none;
																border-radius: 4px;" class="payment_button" onclick="payWithPaystack('{{$flight->email}}','{{$flight->phoneNumber}}', '{{$flight->firstName}}','{{$flight->lastName}}', '{{$flight->referenceNumber}}', '{{$pricedItinerary->fareBreakDown->totalFareInKobo}}' )">Pay with Paystack</button>
															</div>
													</div>
												
												 </div>									
											 
												 <div class="payment-tab" style="display: none;">
														<div class="complete-info-i">
																<div class="complete-inf">
																		<img src="{{asset('img/gtb.jpg')}}"  style="max-width:100px; height:auto"/>
																</div>
																<p><b>Guarantee Trust Bank PLC (GTB)</b></p>
																<p><b>Account Name:   </b> MAVERS TRAVELS AND TOURS</p>
																<p><b>Account Number:  </b> 0470435646</p>
														</div>
														<div class="complete-info-i" style="margin-top:50px">
															<div class="complete-inf">
																	<img src="{{asset('img/fcmb.jpg')}}"  style="max-width:100px; height:auto"/>
															</div>
															<p><b>FIRST CITY MONUMENT BANK PLC</b></p>
															<p><b>Account Name:   </b> MAVERS TRAVELS AND TOURS</p>
															<p><b>Account Number:  </b> 6123028012</p>

														</div>
												 
												 </div>
											 
											 </div>
										 </div>
									  </div>
									  
									  <div class="complete-devider"></div>
									  <h2  style="text-transform:uppercase; font-weight: bold;"> Your Contact Information</h2>
									  <div class="complete-info-table">
										  <div class="complete-info-i">
											  <div class="complete-info-l">First Name:</div>
											  <div class="complete-info-r">{{$flight->firstName}}</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Last Name:</div>
											  <div class="complete-info-r"> {{$flight->lastName}}</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Phone Number:</div>
											  <div class="complete-info-r">{{$flight->phoneNumber}}</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">E-Mail Adress:</div>
											  <div class="complete-info-r">{{$flight->email}}</div>
											  <div class="clear"></div>
										  </div>
									  </div>									  
									  
									 
									  {{-- 
										<h2>Your Personal Information</h2>
									  <div class="complete-info-table">
										  <div class="complete-info-i">
											  <div class="complete-info-l">Booking Number:</div>
											  <div class="complete-info-r"></div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">First Name:</div>
											  <div class="complete-info-r">Roman</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Last Name:</div>
											  <div class="complete-info-r">Polyarush</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">E-Mail Adress:</div>
											  <div class="complete-info-r">weblionmedia@gmail.com</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Country:</div>
											  <div class="complete-info-r">Austria</div>
											  <div class="clear"></div>
										  </div>
										  <div class="complete-info-i">
											  <div class="complete-info-l">Phone Number:</div>
											  <div class="complete-info-r">+8 256 254 25 625</div>
											  <div class="clear"></div>
										  </div>
									  </div> --}}
									  
								  </div>
								  
							  </div>
							</div>
						</div>
						<div class="clear"></div>
				  </div>
			  </div>
	  
			  <div class="sp-page-r bs br-4">
				<div class="checkout-coll">
					@foreach ($pricedItinerary->originDestinationOptions as $originDestinationOption)
					<?php
							$segCount = count($originDestinationOption->flightSegments);
							$airlineName = $originDestinationOption->flightSegments[0]->airlineName;
							$finalArrivalAirportCode = $originDestinationOption->flightSegments[$segCount-1]->arrivalAirportCode;
							$firstDepartureAirportName = $originDestinationOption->flightSegments[0]->departureAirportName;
							$departureCityName = explode('-', $firstDepartureAirportName)[0];
							$finalArrivalAirportName = $originDestinationOption->flightSegments[$segCount-1]->arrivalAirportName;
							$arrivalCityName = explode('-', $finalArrivalAirportName)[0];
							$airlineCode = $originDestinationOption->flightSegments[0]->airlineCode;

					?>
				<div class="checkout-head">
					<div class="checkout-headl">
					<a href="#"><img alt='' src='https://daisycon.io/images/airline/?width=100&height=50&&iata={{$airlineCode}}'></a>
					</div>
					<div class="checkout-headr">
  						<div class="checkout-headrb">
  							<div class="checkout-headrp">
    							<div class="chk-left">
										<div class="chk-lbl"><a>{{$departureCityName}} - {{$arrivalCityName}}</a></div>
										@if ($segCount<2)
												<div class="chk-lbl-a">{{$segCount}} Stop</div>
										@else
											<div class="chk-lbl-a">{{$segCount}} Stops</div>
										@endif
										
    							</div>
    							<div class="chk-right">
    								{{-- <a href="#"><img alt="" src="img/chk-edit.png"></a> --}}
    							</div>
    							<div class="clear"></div>
  							</div>
  						</div>
  						<div class="clear"></div>
					</div>
				</div>
				@endforeach

				<div class="chk-lines">
						@foreach ($pricedItinerary->originDestinationOptions as $originDestinationOption)
						<?php
						$segCount = count($originDestinationOption->flightSegments); 
						for($i=0; $i<$segCount; $i++){
							$d = $originDestinationOption->flightSegments[$i];
							$dept_time = date_helper($d->departureTime);
							$arr_time = date_helper($d->arrivalTime); 
						?>
						<div class="chk-line chk-fligth-info">
								<div class="chk-departure" style="max-width:35%;">
									<span>{{ $d->departureAirportName }}</span>
									
								</div>
								
								<div class="chk-arrival" style="max-width:35%;">
									<span>{{ $d->arrivalAirportName }}</span>
								</div>
								<div class="clear"></div>
						</div>
						<div class="chk-line chk-fligth-info">
								<div class="chk-departure">
									<span>Departure</span>
									<b>{{$dept_time['time']}}<br>{{$dept_time['day'].','.$dept_time['month_day'] }}</b>
								</div>
								<div class="chk-fligth-devider"></div>
								<div class="chk-fligth-time"><img alt="" src="img/icon-nights.png"></div>
								<div class="chk-fligth-devider"></div>
								<div class="chk-arrival">
									<span>Arrival</span>
									<b>{{$arr_time['time']}}<br>{{$arr_time['day'].' '.$arr_time['month_day']}}</b>
								</div>
								<div class="clear"></div>
							</div>
					<?php } ?>
					@endforeach	
				</div>
				
				
				<div class="chk-details">
					<h2>Details</h2>
					<div class="chk-detais-row">
						<div class="chk-line">
							<span class="chk-l">Airline</span>
							<span class="chk-r">{{$airlineName}}</span>
							<div class="clear"></div>
						</div>
						<div class="chk-line">
							<span class="chk-l">FLIGHT TYPE:</span>
							<span class="chk-r">{{$ticketClasses[$ticketClass-1]}}</span>
							<div class="clear"></div>
						</div>
						<div class="chk-line">
							<span class="chk-l">Base Price</span>
							<span class="chk-r">&#8358;{{number_format($pricedItinerary->fareBreakDown->baseFareInKobo /100)}}</span>
							<div class="clear"></div>
						</div>
						<div class="chk-line">
							<span class="chk-l">Tax</span>
							<span class="chk-r">&#8358;{{number_format($pricedItinerary->fareBreakDown->totalTaxInKobo /100)}}</span>
							<div class="clear"></div>
						</div>
					</div>
					<div class="chk-total">
						<div class="chk-total-l">Total Price</div>
						<div class="chk-total-r">&#8358;{{number_format($pricedItinerary->fareBreakDown->totalFareInKobo /100)}}</div>
						<div class="clear"></div>
					</div>					
				</div>
				
			</div>
					<div class="h-help">
							<div class="h-help-lbl">Need Awaflights help?</div>
							<div class="h-help-lbl-a">We are always availble to answer your request day or night. we put our customers first.</div>
							<div class="h-help-phone"><i class="fa fa-phone about-fa"> </i> +2348120252353</div>
							<div class="h-help-email">info@awaflights.com</div>
						</div>
				  {{-- <div class="h-reasons">
					  <div class="h-liked-lbl">Reasons to Book with us</div>
					  <div class="h-reasons-row">
					  <!-- // -->
						  <div class="reasons-i">
						  <div class="reasons-h">
							  <div class="reasons-l">
								  <i class="fas fa-headset about-fa"></i>
							  </div>
							  <div class="reasons-r">
								<div class="reasons-rb">
								  <div class="reasons-p">
									  <div class="reasons-i-lbl">24/7 Customer support</div>
									  <p>We are always availble to answer your request day or night. we put our customers first.</p>
								  </div>
								</div>
								<br class="clear">
							  </div>
						  </div>
						  <div class="clear"></div>
						  </div>
					  <!-- \\ -->	
					  <!-- // -->
						  <div class="reasons-i">
						  <div class="reasons-h">
							  <div class="reasons-l">
									<i class="fas fa-smile-wink about-fa"></i>
							  </div>
							  <div class="reasons-r">
								<div class="reasons-rb">
								  <div class="reasons-p">
									  <div class="reasons-i-lbl">Smooth booking process</div>
									  <p>Our booking process is compared to non, as it is smooth and direct.</p>
								  </div>
								</div>
								<br class="clear">
							  </div>
						  </div>
						  <div class="clear"></div>
						  </div>
					  <!-- \\ -->	
					  <!-- // -->
						  
					  <!-- \\ -->				
					  </div>
				  </div> --}}
				  
			  </div>
			  <div class="clear"></div>
		  </div>
	  
		  </div>	
		</div>  
	  </div>

@include('layout.footer')
<script src="https://js.paystack.co/v1/inline.js"></script>
<script src="{{asset('js/pay.js')}}"></script>
