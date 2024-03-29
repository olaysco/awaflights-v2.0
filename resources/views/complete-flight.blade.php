

<?php
if(null === session('selPricedItinerary') ){
	header('location: /');
	die();
}
setlocale(LC_MONETARY, 'en_NG');



function date_helper($datetime){
		$date = new \DateTime(str_replace('/','-',$datetime));
		$time = $date->format('H:i');
		$day = $date->format('D');
		$month_day = $date->format('M,j');
		$year = $date->format('Y');
		return compact('time','day','month_day','year');
		
}

$limitTime = date_helper($selPricedItinerary->ticketLimitTime); 
$totalTravellers = $selPricedItinerary->fareBreakDown->numberOfTravellers;	
$adult = $selPricedItinerary->fareBreakDown->numberOfAdults;
$children = $selPricedItinerary->fareBreakDown->numberOfChildren;
$infants = $selPricedItinerary->fareBreakDown->numberOfInfant;
$ticketClasses = ['Economy','PREMIUM ECONOMY', 'BUSINESS', 'FIRST '];
$j = 0;

?>
@include('layout.header')


<!-- main-cont -->
<div class="main-cont">
  <div class="body-wrapper">
    <div class="wrapper-padding">
    <div class="page-head">
      <div class="page-title">Air Ticket - <span>booking</span></div>
      <div class="breadcrumbs">
				<a href="#">Home</a> / <a href="#">Flight</a> / <span>flight booking</span>
			
      </div>
      <div class="clear"></div>
		</div>
		
	<div class="sp-page">
		<div class="sp-page-a">
			<div class="sp-page-l">
  				<div class="sp-page-lb">
  					<div class="sp-page-p p6">
								@include('layout.errors')
								<?php
								if(null !== session('success')){
									if(session('success') === "false"){
								?>
								<div class="payment-alert" >
										<span>An unknown error while booking this flight, try refreshing <b>or</b> booking another flight option.</span>
										<div class="payment-alert-close"><a href="#"><img alt="" src="img/alert-close.png"></a></div>
									</div>
										<?php
									}
								}	
								?>
						<form method="POST" action="/complete-booking" id="completeBookingForm">
					{{ csrf_field() }}
					<input name="numberOfTraveller" type="hidden" value="{{$totalTravellers}}">
						<div class="booking-left bs br-4">
								
							<h2><b>Passenger(s) Information</b></h2>
							<?php  for($i =1; $i<=$adult; $i++){  $j++;?>
							<div class="booking-form adult">
								<input type="hidden" name="ageGroup{{$j}}" id="ageGroup{{$j}}" data-num="{{$j}}" value="3" required/>
									<h3>Adult {{$i}} Information</h3>
											<div class="booking-form-i">
													<label>First Name:</label>
													<div class="input"><input type="text" value="{{old('firstname'.$j)}}" name="firstName{{$j}}" aria-required="true" required/></div>
												</div>
												<div class="booking-form-i">
													<label>Last Name:</label>
													<div class="input"><input type="text" name="lastName{{$j}}"  value="" required aria-required="true"/></div>
												</div>
											<div class="clear"></div>	
											<div class="bookin-two-coll">
												<div class="booking-form-i">
														<div class="form-calendar-a" style="width:100%;">
															<label>Title</label>
																<select class="custom-select" name="title{{$j}}" required>
																		<option></option>
																		<option value="4">Mr. </option>
																		<option value="3">Mrs. </option>
																		<option value="2">Master </option>
																		<option value="1">Ms. </option>
																</select>
															</div>
												</div>
												<div class="booking-form-i">
													<label>Date of birth:</label>
														<div class="input-a">
																<input type="text" class="adult-date-inpt" id="dateOfBirth{{$j}}" name="dateOfBirth{{$j}}" required />
														<span class="date-icon"></span>
													</div>
												</div>
											</div>	
												<div class="clear"></div>
												@if ($passportRequired)
												<div class="bookin-three-coll">
													<div class="booking-form-i">
														<label>Passport Number:</label>
														<div class="input"><input type="text" value="" id="passportNumber{{$j}}"name="passportNumber{{$j}}" placeholder="Passport Number" required/></div>
													</div>
													<div class="booking-form-i">
														<div class="form-calendar-a" style="width:100%;">
															<label>Issuing country:</label>
																<select class=" country-code" style="width:100% !important" id="passportIssuingCountryCode{{$j}}" name="passportIssuingCountryCode{{$j}}" data-live-search="true" required>
																		<option></option>
																		<option value="4">Mr. </option>
																		<option value="3">Mrs. </option>
																		<option value="2">Master </option>
																		<option value="1">Ms. </option>
																</select>
														</div>
													</div>
													<div class="booking-form-i">
														<label>Expiry date:</label>
														<div class="form-calendar-a" style="width:100%;">
																<div class="input"><input type="text" class="date-inpt" placeholder="Passport exp. date" value="" id="passportExpiryDate{{$j}}" name="passportExpiryDate{{$j}}" required/></div>
														
															</div>
														
														<div class="clear"></div>
													</div>
												<div class="clear"></div>
										</div>
										@endif
								
								
								
								
              					<div class="checkbox">
                					<label>
                  						<input type="checkbox" value="" />
                  							Save Personal Info
                					</label>
              					</div> 		
              					<div class="booking-devider"></div>						
							</div>
						<?php } ?>

						<?php  for($i =1; $i<=$children; $i++){ $j++;?>
							<div class="booking-form child">
									<input type="hidden" name="ageGroup{{$j}}" id="ageGroup{{$j}}" data-num="{{$j}}" value="2" required/>
									<h3>Child {{$i}} Information</h3>
											<div class="booking-form-i">
													<label>First Name:</label>
													<div class="input"><input type="text" value="" name="firstName{{$j}}" aria-required="true" required/></div>
												</div>
												<div class="booking-form-i">
													<label>Last Name:</label>
													<div class="input"><input type="text" name="lastName{{$j}}"  value="" required aria-required="true"/></div>
												</div>
											<div class="clear"></div>	
											<div class="bookin-two-coll">
												<div class="booking-form-i">
														<div class="form-calendar-a" style="width:100%;">
															<label>Title</label>
																<select class="custom-select" name="title{{$j}}" required>
																		<option></option>
																		<option value="4">Mr. </option>
																		<option value="3">Mrs. </option>
																		<option value="2">Master </option>
																		<option value="1">Ms. </option>
																</select>
															</div>
												</div>
												<div class="booking-form-i">
													<label>Date of birth:</label>
														<div class="input-a">
																<input type="text" class="child-date-inpt" id="dateOfBirth{{$j}}" name="dateOfBirth{{$j}}" required/>
														<span class="date-icon"></span>
													</div>
												</div>
											</div>	
												<div class="clear"></div>
												@if ($passportRequired)
												<div class="bookin-three-coll">
													<div class="booking-form-i">
														<label>Passport Number:</label>
														<div class="input"><input type="text" value="" id="passportNumber{{$j}}"name="passportNumber{{$j}}" placeholder="Passport Number" required/></div>
													</div>
													<div class="booking-form-i">
														<div class="form-calendar-a" style="width:100%;">
															<label>Issuing country:</label>
																<select class="country-code" style="width:100% !important" id="passportIssuingCountryCode{{$j}}" name="passportIssuingCountryCode{{$j}}" data-live-search="true" required>
																		<option></option>
																		<option value="4">Mr. </option>
																		<option value="3">Mrs. </option>
																		<option value="2">Master </option>
																		<option value="1">Ms. </option>
																</select>
														</div>
													</div>
													<div class="booking-form-i">
														<label>Expiry date:</label>
														<div class="form-calendar-a" style="width:100%;">
																<div class="input"><input type="text" class="date-inpt" value="" id="passportExpiryDate{{$j}}" name="passportExpiryDate{{$j}}" required/></div>
														
															</div>
														
														<div class="clear"></div>
													</div>
												<div class="clear"></div>
										</div>
										@endif
								
								
								
								
              					<div class="checkbox">
                					<label>
                  						<input type="checkbox" value="" />
                  							Save Personal Info
                					</label>
              					</div> 		
              					<div class="booking-devider"></div>						
							</div>
						<?php } ?>

							<?php  for($i =1; $i<=$infants; $i++){ $j++;?>
							<div class="booking-form infant">
									<input type="hidden" name="ageGroup{{$j}}" id="ageGroup{{$j}}" data-num="{{$j}}" value="1" required/>
									<h3>Infant {{$i}} Information</h3>
											<div class="booking-form-i">
													<label>First Name:</label>
													<div class="input"><input type="text" value="" name="firstName{{$j}}" aria-required="true" required/></div>
												</div>
												<div class="booking-form-i">
													<label>Last Name:</label>
													<div class="input"><input type="text" name="lastName{{$j}}"  value="" required aria-required="true"/></div>
												</div>
											<div class="clear"></div>	
											<div class="bookin-two-coll">
												<div class="booking-form-i">
														<div class="form-calendar-a" style="width:100%;">
															<label>Title</label>
																<select class="custom-select" name="title{{$j}}" required>
																		<option></option>
																		<option value="4">Mr. </option>
																		<option value="3">Mrs. </option>
																		<option value="2">Master </option>
																		<option value="1">Ms. </option>
																</select>
															</div>
												</div>
												<div class="booking-form-i">
													<label>Date of birth:</label>
														<div class="input-a">
																<input type="text" class="infant-date-inpt" id="dateOfBirth{{$j}}" name="dateOfBirth{{$j}}" required/>
														<span class="date-icon"></span>
													</div>
												</div>
											</div>	
												<div class="clear"></div>
												@if ($passportRequired)
												<div class="bookin-three-coll">
													<div class="booking-form-i">
														<label>Passport Number:</label>
														<div class="input"><input type="text" value="" id="passportNumber{{$j}}"name="passportNumber{{$j}}" placeholder="Passport Number" required/></div>
													</div>
													<div class="booking-form-i">
														<div class="form-calendar-a" style="width:100%;">
															<label>Issuing country:</label>
																<select class=" country-code" style="width:100% !important" id="passportIssuingCountryCode{{$j}}" name="passportIssuingCountryCode{{$j}}" data-live-search="true" required>
																		<option></option>
																		<option value="4">Mr. </option>
																		<option value="3">Mrs. </option>
																		<option value="2">Master </option>
																		<option value="1">Ms. </option>
																</select>
														</div>
													</div>
													<div class="booking-form-i">
														<label>Expiry date:</label>
														<div class="form-calendar-a" style="width:100%;">
																<div class="input"><input type="text" class="date-inpt" value="" id="passportExpiryDate{{$j}}" name="passportExpiryDate{{$j}}" required/></div>
														
															</div>
														
														<div class="clear"></div>
													</div>
												<div class="clear"></div>
										</div>
										@endif
								
								
								
								
              					<div class="checkbox">
                					<label>
                  						<input type="checkbox" value="" />
                  							Save Personal Info
                					</label>
              					</div> 		
              					<div class="booking-devider"></div>						
							</div>
							<?php } ?>

							<h2>Contact Information</h2>
							
							<div class="booking-form">
								<div class="booking-form-i">
									<label>First Name:</label>
									<div class="input"><input type="text" value="" name="contactFirstName" id="firstname" placeholder="First Name" required></div>
								</div>
								<div class="booking-form-i">
									<label>Last Name:</label>
									<div class="input"><input type="text" value="" id="surname" name="contactLastName" placeholder="Last name" required></div>
								</div>
								<div class="booking-form-i">
										<div class="form-calendar-a" style="width:100%;">
												<label>Title</label>
													<select class="custom-select" name="contactTitle" required>
															<option></option>
															<option value="4">Mr. </option>
															<option value="3">Mrs. </option>
															<option value="2">Master </option>
															<option value="1">Ms. </option>
													</select>
												</div>
								</div>
								<div class="booking-form-i">
									<label>Email Adress:</label>
									<div class="input"><input type="email" value="" id="contactEmail" name="contactEmail" placeholder="email" required></div>
								</div>
								<div class="booking-form-i">
										<label>Date of birth:</label>
										<div class="input-a">
													<input type="text"  name="contactDateOfBirth" required class="contact-date-inpt" placeholder="Date of birth" autocomplete="off"/>
										<span class="date-icon"></span>
									</div>
									</div>
									<div class="booking-form-i">
										<label>Preferred Phone Number:</label>
										<div class="input"><input type="tel" id="phoneNumber" name="contactPhoneNumber" required></div>
									</div>
									<div class="bookin-three-coll">
								<div class="booking-form-i">
									<label>Address:</label>
									<div class="input"><input type="text" value=""  id="address" name="contactAddress" placeholder="address" required></div>
								</div>
								<div class="booking-form-i">
									<label>City:</label>
									<div class="input"><input type="text" value="" id="city" name="contactCity" placeholder="city" required></div>
								</div>
								<div class="booking-form-i">
										<div class="form-calendar-a" style="width:100%;">
												<label>Country code:</label>
													<select class="selectpicker country-code" style="width:100% !important" id="countryCode" name="contactCountryCode" data-live-search="true" required>
															<option> country </option>
													</select>
												</div>
									</div>
								<div class="clear"></div>
								</div>
							</div>
							{{-- <div class="booking-devider no-margin"></div>	
							 <h2>How would you like to pay?</h2>
							<div class="payment-wrapper"> 
									<div class="payment-tabs">
										<a href="#" class="active">Credit Card <span></span></a>
										<a href="#">Bank Deposit <span></span></a>
									</div>
									<div class="clear"></div>
									<div class="payment-tabs-content" >
										
										<div class="payment-tab" style="display:block;">
												<div id="paystackEmbedContainer"></div>
										</div>									
									
										<div class="payment-tab" style="display: none;">
											<div class="payment-alert">
												<span>Please note that direct bank payment is not currently available use <b>PAYSTACK</b>.</span>
												<div class="payment-alert-close"><a href="#"><img alt="" src="img/alert-close.png"></a></div>
											</div>
										
										</div>
									
									</div>
								</div> --}}
							
							<div class="booking-complete">
								<h2>Review and book your trip</h2>
								<p>Kindly ensure that all the information you provided above is correct and valid for your flight processing. </p>	
								<button class="booking-complete-btn" id="completeBookingBtn" type="submit">COMPLETE BOOKING</button>
							</div>
							
						</div>
						</form>
  					</div>
  				</div>
  				<div class="clear"></div>
			</div>
		</div>

		<div class="sp-page-r bs br-4">
			<div class="checkout-coll">
					@foreach ($selPricedItinerary->originDestinationOptions as $originDestinationOption)
					<?php
							$segCount = count($originDestinationOption->flightSegments);
							$firstDepartureAirportCode = $originDestinationOption->flightSegments[0]->airlineName;
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
						@foreach ($selPricedItinerary->originDestinationOptions as $originDestinationOption)
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
							<span class="chk-r">&#8358;{{number_format($selPricedItinerary->fareBreakDown->baseFareInKobo /100)}}</span>
							<div class="clear"></div>
						</div>
						<div class="chk-line">
							<span class="chk-l">Tax</span>
							<span class="chk-r">&#8358;{{number_format($selPricedItinerary->fareBreakDown->totalTaxInKobo /100)}}</span>
							<div class="clear"></div>
						</div>
					</div>
					<div class="chk-total">
						<div class="chk-total-l">Total Price</div>
						<div class="chk-total-r">&#8358;{{number_format($selPricedItinerary->fareBreakDown->totalFareInKobo /100)}}</div>
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
<!-- /main-cont -->
@include('layout.footer')

<script src="https://js.paystack.co/v1/inline.js"></script>


{{-- <script>
  PaystackPop.setup({
   key: 'pk_test_88ebec70543462de18dee01e88d2109689e21061',
   email: 'olaysoft@gmail.com',
   amount: {{$selPricedItinerary->fareBreakDown->totalFareInKobo}},
   container: 'paystackEmbedContainer',
   callback: function(response){
        alert('successfully paid. transaction ref is ' + response.reference);
    },
  });
</script> --}}
