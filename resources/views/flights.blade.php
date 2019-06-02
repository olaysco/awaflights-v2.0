<?php
use Illuminate\Support\Arr;
?>
@include('layout.header')
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
$output = '';
$prices = [];
$airline_itenary = 0;
$numResults = 0;
$outputShow = '';
$moreOptionsShown = false;
if(null !== session('search_results')  && !is_string(session('search_results'))){
	$numResults = session('search_results')->count();
}
$sortedPrices = [0];
$airlineNames = [];
?>
	@if (session('search_results') && $numResults>0)
	<?php $collection = session('search_results');
	 $airlineItineraries = $collection->all();
	 $airlineNames = []; $pricedItinerariesArray = [];
	$pricedItinerariesCount = 0;
	 ?>	
	 @foreach ($airlineItineraries as $airlineItinerary)
	 <?php $airlineNames[] = str_replace(' ','-',$airlineItinerary->airlineName);
			 $airlineOptions = 0;
			 $outputShow = '';
			 $moreOptionsShown = false;

	 ?>
	 @foreach ($airlineItinerary->pricedItineraries as $pricedItineraries) 
		 <?php $options = 0;  $originCount = count($pricedItineraries->originDestinationOptions);
				 $pricedItinerariesArray[$pricedItinerariesCount] = $pricedItineraries; 
				 $airlineOptions++;
		 ?>
	 @foreach ($pricedItineraries->originDestinationOptions as $originDestinationOption)
	 <?php
	 							$airline_itenary = $airline_itenary+1;
							$segCount = count($originDestinationOption->flightSegments); 

							$deptFull = date_helper($originDestinationOption->flightSegments[0]->departureTime); 
							$arrFull = date_helper($originDestinationOption->flightSegments[$segCount-1]->arrivalTime); 
							$firstDepartureAirportCode = $originDestinationOption->flightSegments[0]->departureAirportCode;
							$finalArrivalAirportCode = $originDestinationOption->flightSegments[$segCount-1]->arrivalAirportCode;
							$firstDepartureAirportName = $originDestinationOption->flightSegments[0]->departureAirportName;
							$finalArrivalAirportName = $originDestinationOption->flightSegments[$segCount-1]->arrivalAirportName;
							$deptDay = $deptFull['day'];
							$deptTime = $deptFull['time'];
							$deptMonthDay = $deptFull['month_day'];
							$arrDay = $arrFull['day'];
							$arrTime = $arrFull['time'];
							$arrMonthDay = $arrFull['month_day'];
							$totalDuration = '00:00';
							for($i=0; $i<$segCount; $i++){
								$d = strtotime($totalDuration)+strtotime($originDestinationOption->flightSegments[$i]->journeyDuration)-strtotime('00:00');
								$totalDuration = date('H:i',$d);
							}
							$price =  number_format($pricedItineraries->totalFare/100);
							$unformattedPrice = $pricedItineraries->totalFare/100;
							$prices[] = $unformattedPrice;
							$sortedPrices = Arr::sort($prices);
							$aCode = $airlineItinerary->airlineCode;
							$airlineName = str_replace(' ','-',$airlineItinerary->airlineName);
							
							$stops=$originDestinationOption->stops; 
							if($stops ==1){
								$stop_class = "stop-1";
							}elseif($stops==2){
								$stop_class = "stop-2";
							}elseif($stops==0){
								$stop_class = "stop-0";
							}else{
								$stop_class = "stop-3";
							} 
							// if($airlineOptions>1){
							// 	$outputShow = 'hide';
							// 	$moreOptionsDiv = "<div  class='toggleMoreOptions' data-toggle='${airlineName}More' style='width:100%; text-align:center;'><span>show/hide more options from ${airlineName}</span></div>";
							// }
							if($originCount >1){
									$table = "<div class='flight-details colapse' id='details${airline_itenary}' style='display: none;' aria-expanded='false'>";
								}else{
									$table = "<div class='flight-details collapse'    aria-expanded='false'>
													<table class='table table-dark' style='font-size: 0.8em;'>
														<thead style='min-width:100%;'>
														<tr>
															<th scope='col'  class='alt-info'>Departure</th>
															<th scope='col'  class='alt-info'>Arrival</th>
															<th scope='col'  class='alt-info'>Flight Duration</th>
															<th scope='col'  class='alt-info'>Carrier</th>
														</tr>
														</thead>
														<tbody style='min-width: 100%;'>	";
								}
													
											
											for($i=0; $i<$segCount; $i++){
													$d = $originDestinationOption->flightSegments[$i];
													$dept_time = date_helper($d->departureTime);
													$arr_time = date_helper($d->arrivalTime); 
													$dTime = 	$dept_time['time'];
													$dDay = $dept_time['day'];
													$dMonth = $dept_time['month_day'];
													$aTime = $arr_time['time'];
													$aDay = $arr_time['day'];
													$aMonth = $arr_time['month_day'];
													if($originCount >1){
															$table .= "<div class='flight-details-l'>
                                    <div class='flight-details-a'>$dDay/$dMonth</div>
                                    <div class='flight-details-b'>$dTime $d->departureAirportName</div>
                                  </div>
                                  <div class='flight-details-r'>
                                    <div class='flight-details-a'>$aDay/$aMonth</div>
                                    <div class='flight-details-b'>$aTime $d->arrivalAirportName </div>                             
                                  </div>";
													}else {
														$table .= "<tr>
																<td class='alt-info'> $d->departureAirportName <br> <b>$dTime - $dDay/$dMonth</b></td>
																<td class='alt-info'>$d->arrivalAirportName  <br> <b>$aTime - $aDay/$aMonth </b></td> 
																<td class='alt-info'>$d->journeyDuration</td>
																<td class='alt-info'>$d->airlineName</td>
															</tr>";
													}
										 } 
							if($originCount >1){		 
								$table .="<div class='clear'></div></div>";
							}else{
								$table .= "</tbody></table></div>";
							}
							$csrf = csrf_field();
							$formOpen = "<form method='get' action='/flights-book'>$csrf<input type='hidden' value='$pricedItinerariesCount' name='pricedItineraryPosition' />
								<input type='hidden' value='$airlineName' name='airlineName' />";
							$formClose = "</form>";
							if($originCount >1){
									if($options == 0){
												$output .= "<div class='flight-item fly-in appeared flight-wrapper mix ${airlineName} ${stop_class} '  data-fare='${unformattedPrice}'>$formOpen<div class='flt-i-a'><div class='flt-i-b'>";
										}
										$output .= "<div class='flt-i-bb'><div class='flt-l-a'><div class='flt-l-b'><div class='company'><img alt=''  src='https://daisycon.io/images/airline/?width=100&height=50&&iata={$aCode}'></div>
																</div><div class='flt-l-c'><div class='flt-l-cb'><div class='flt-l-c-padding'><div class='flyght-info-head'>$firstDepartureAirportName - $finalArrivalAirportName</div>
																<div class='flight-line'><div class='flight-line-a'> <b>departure</b><span>$deptTime</span></div><div class='flight-line-d'></div><div class='flight-line-a'><b>arrival</b>
																<span>${arrTime}</span> </div><div class='flight-line-d'></div><div class='flight-line-a'><b>time</b> <span>$totalDuration</span></div>
																<div class='flight-line-b' ><b style='padding-right:8px'>details</b></div><div class='clear'></div> $table </div>
																													</div></div><br class='clear'></div> </div><div class='clear'></div> </div><br class='clear'>";
														
										if($options>=$originCount-1){
												$output .= "</div></div><div class='flt-i-c'><div class='flt-i-padding'> <div class='flt-i-price'>$pricedItineraries->currencyCode $price</div>
											<button type='submit' class=' book-now-btn cat-list-btn'>Book now</button></div> </div><div class='clear'></div>$formClose</div>";
											// if($outputShow === 'hide' && !$moreOptionsShown){
											// 		$output .= "${moreOptionsDiv}";
											// 		$moreOptionsShown = true;
											// }
										}
							}else{
								
								$output .= "<div class='alt-flight fly-in appeared flight-wrapper mix ${airlineName} ${stop_class}' data-fare='${unformattedPrice}'>$formOpen<div class='alt-flight-a'><div class='alt-flight-l'>
							<div class='alt-flight-lb'><div class='alt-center'><div class='alt-center-l'>
							<div class='alt-center-lp'><div class='alt-logo'> <a href='#'><img alt='' src='https://daisycon.io/images/airline/?width=100&height=50&&iata={$aCode}'></a></div></div></div>
							<div class='alt-center-c'><div class='alt-center-cb'><div class='alt-center-cp'><div class='alt-lbl'>$firstDepartureAirportName - $finalArrivalAirportName</div>
							<div class='alt-info'><b>$deptDay/$deptMonthDay - $arrDay/$arrMonthDay</b>$originDestinationOption->stops  way trip</div><div class='alt-devider'></div> <div class='flight-line-b'><b style='padding-right:8px'>details</b>
							</div> <div class='alt-data-i alt-departure'><b>Departure</b>	<span>$deptTime</span></div>
							<div class='alt-data-i alt-arrival'><b>Arrival</b><span>${arrTime}</span></div><div class='alt-data-i alt-time'><b>time</b>
							<span>$totalDuration</span></div><div class='clear'></div></div> </div> <div class='clear'></div></div></div><div class='clear'></div>
							</div><div class='clear'></div></div></div><div class='alt-flight-lr'> <div class='padding'><div class='flt-i-price'>$pricedItineraries->currencyCode $price</div>
							<div class='flt-i-price-b'>avg/person</div><button class='book-now-btn cat-list-btn' type='submit'>Book now</button>  </div> <div class='clear'></div>
							</div><div class='clear'></div><div class='alt-details'>	$table<div class='clear'></div></div> $formClose</div>";
							
							// if($outputShow === 'hide' && !$moreOptionsShown){
							// 		$output .= "${moreOptionsDiv}";
							// 		$moreOptionsShown = true;
							// }
						}
							

							
	  $options++; ?>
	@endforeach
	<?php $pricedItinerariesCount++; ?>
	@endforeach	
	@endforeach	 
	<?php session(['pricedItineraryArray'=>$pricedItinerariesArray]);  ?>
	 @endif
<div class="main-cont">
		<div class="body-wrapper">
		  <div class="wrapper-padding">
		  <div class="page-head">
			<div class="page-title">Flights - <span>Page</span></div>
			<div class="breadcrumbs">
			  <a href="#">Home</a> / <span>Flight page</span>
			</div>
			<div class="clear"></div>
		  </div>
		  <div class="two-colls">
			<div class="two-colls-left">
			  
			  <div class="srch-results-lbl fly-in appeared">
				<span>{{$numResults }} <?php if($numResults>1){ echo 'Airline results'; }else{ echo 'Airline result'; } ?> found.</span>
			  </div> 
				 
			  <div class="side-block fly-in appeared">
				<div class="side-block-search">
					<span class="refine-search side-lbl hidden"> refine search  <i class="chevron"></i></span>
				  <div class="page-search-p page-search-filter hide" >
							<div class="flight_types">
									<label class="container-radio inline">one-way<input type="radio" name="tripType" value="1" class="tripType"><span class="checkmark"></span></label>
									<label class="container-radio inline">return<input type="radio" name="tripType" value="2" class="tripType" checked><span class="checkmark"></span></label>
									<label class="container-radio inline">multi<input type="radio" name="tripType" value="3" class="tripType"><span class="checkmark"></span></label>
									</div>
								<!-- // -->
								<div class="forms refine-search-form">
										@include('forms.oneway')
										@include('forms.return')
										@include('forms.multi')
							  </div>  
						 
				</div>          
				</div>
			  </div>
	  
			  <!-- // side // -->
			  <div class="side-block fly-in appeared">
				<div class="side-price">
				  <div class="side-padding">
					<div class="side-lbl">Price</div>
					<div class="price-ranger">
					  <div id="" class="" aria-disabled="false">
								<input type="text" id="range" value="" name="range" min ="{{head($sortedPrices)}}" max="{{last($sortedPrices)}}"/>
							
						</div>              
					</div>
					<div class="price-ammounts">
					  <input type="text" id="ammount-from" readonly="">
					  <input type="text" id="ammount-to" readonly="">
					  <div class="clear"></div>
					</div>              
				  </div>
				</div>  
			  </div>
			  <!-- \\ side \\ -->
	  
			  <!-- // side // -->
			  <div class="side-block fly-in appeared">
				<div class="side-stars">
				  <div class="side-padding">
					<div class="side-lbl">Airlines</div>  
						<div class="checkbox-group">
								<div class="checkbox">
										<label>
										<input type="checkbox" value="all" class="allAirlineCheck" checked>
												All Airline
										</label>
									</div>
					@foreach ($airlineNames as $airlineName)
						<div class="checkbox">
								<label>
								<input type="checkbox" value=".{{$airlineName}}" class="airlineCheck">
										{{$airlineName}}
								</label>
							</div> 						
					@endforeach
						</div>
				  </div>
				</div>  
			  </div>
			  <!-- \\ side \\ -->
			  <!-- // side // -->
			 
			  <!-- \\ side \\ -->
			  <!-- // side // -->
			  {{-- <div class="side-block fly-in appeared">
				<div class="side-stars">
				  <div class="side-padding">
					<div class="side-lbl">Flight times</div>  
					
					<div class="side-time-holder">
					  <div class="side-lbl-a">Departure flight</div>
					  <div class="side-time">
						<div class="time-ammounts">
						  departure time <span class="time-from">3</span>:00 up to <span class="time-to">20</span>:00
						</div> 
						<div class="time-ranger">
						  <div class="time-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 12.5%; width: 70.8333%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 12.5%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 83.3333%;"></a></div>              
						</div>                                
					  </div>
					  <div class="side-time">
						<div class="time-ammounts">
						  arrival time <span class="time-from">3</span>:00 up to <span class="time-to">20</span>:00
						</div> 
						<div class="time-ranger">
						  <div class="time-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 12.5%; width: 70.8333%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 12.5%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 83.3333%;"></a></div>              
						</div>                                
					  </div>
					</div>
					<div class="side-time-holder">
					  <div class="side-lbl-a">return flight</div>
					  <div class="side-time">
						<div class="time-ammounts">
						  departure time <span class="time-from">3</span>:00 up to <span class="time-to">20</span>:00
						</div> 
						<div class="time-ranger">
						  <div class="time-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 12.5%; width: 70.8333%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 12.5%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 83.3333%;"></a></div>              
						</div>                                
					  </div>
					  <div class="side-time">
						<div class="time-ammounts">
						  arrival time <span class="time-from">3</span>:00 up to <span class="time-to">20</span>:00
						</div> 
						<div class="time-ranger">
						  <div class="time-range ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 12.5%; width: 70.8333%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 12.5%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 83.3333%;"></a></div>              
						</div>                                
					  </div>
					</div>
					
				  </div>
				</div>  
			  </div> --}}
			  <!-- \\ side \\ -->
			  
			</div>
			<div class="two-colls-right">
			  <div class="two-colls-right-b">
				<div class="padding">
				
				  <div class="catalog-head fly-in appeared">
					<label>Sort results by:</label>
					<div class="search-select controls">
									  <select class="price-sort">
												<option value="all">price</option>
										  <option value="fare:asc">lowest</option>
										  <option value="fare:desc">highest</option>
									  </select>
							  </div>
					<div class="search-select controls">
									  <select class="stop-filter">
												<option value="all">stops</option>
										  <option value=".stop-0">direct flight</option>
										  <option value=".stop-1">one-stop</option>
											<option value=".stop-2">2 stops</option>
											<option value=".stop-3">3+ stops</option>
									  </select>
							  </div>
					{{-- <a href="#" class="show-list"></a>               --}}
					<a class="show-thumbs chosen" href="#"></a> 
					<div class="clear"></div>
				  </div>
				  
				  <div class="catalog-row alternative">
					  
					  <!-- \\ alt-flight \\ -->
					  <!-- \\ alt-flight \\ -->								
								<?php echo $output; ?>											 
				  </div>
				  
				  <div class="clear"></div>
				  
				  {{-- <div class="pagination">
					<a class="active" href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<div class="clear"></div>
				  </div>             --}}
				</div>
			  </div>
			  <br class="clear">
			</div>
		  </div>
		  <div class="clear"></div>
		  
		  </div>	
		</div>  
	  </div>

@include('layout.footer')
<script>
	$(document).ready(function(e){
		(function ($) {
					"use strict";
				var $range = $("#range");
				let min = parseInt($range.attr('min'));
				let max = parseInt($range.attr('max')); 

				$range.ionRangeSlider({
						type: "double",
						min: min-100,
						max: max+100,
						from: min,
						to: max,
						prefix: 'NGN',
						onFinish: function (num) {
								$('.flight-wrapper').hide().filter(function() {
										var price = parseInt($(this).data("fare"), 10);
										return price >= num.from && price <= num.to;
								}).show();
						}
				});
				}(jQuery));

				$('.refine-search').on('click', function(e){
						$('.page-search-filter').toggleClass('hide');
						$('.refine-search').toggleClass('hidden');
				});

				$('.price-sort').val('fare:asc').change();
	});
</script>
