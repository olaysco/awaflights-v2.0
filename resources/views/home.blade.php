
<!-- \\ authorize \\-->

@include('layout.header')


<!-- main-cont -->

<div class="main-cont">
<div class="">
@include('layout.slider')
	
	<div class="wrapper-a-holder full-width-search">
	<div class="wrapper-a">
		
	
		<!-- // search // -->
		<div class="page-search full-width-search search-type-b" style="">
		  <div class="search-type-padding">
			<nav class="page-search-tabs">
				<div class="search-tab active">flights</div>
				<div class="search-tab">Hotels</div>
				{{-- <div class="search-tab nth">Tours</div> --}}
				<div class="clear"></div>	
			</nav>		
			<div class="page-search-content">
			
				<!-- // tab content tickets // -->
				<div class="search-tab-content">
					<div class="flight_types">
					<label class="container-radio">one-way<input type="radio" name="tripType" value="1" class="tripType"><span class="checkmark"></span></label>
					<label class="container-radio">return<input type="radio" name="tripType" value="2" class="tripType" checked><span class="checkmark"></span></label>
					<label class="container-radio">multi<input type="radio" name="tripType" value="3" class="tripType"><span class="checkmark"></span></label>
					</div>
					@include('layout.errors')
						<div id="oneway-form">
						<form class="custom-form white-form marginbot-clear search-form" id="oneway-form" method="post" action="/home">
							{{ csrf_field() }}
						<div class="page-search-p">
							
								<input type="hidden" name="tripType" value="1" />
							<!-- // -->
							<div class="search-large-i">
							<!-- // -->
							<div class="srch-tab-line no-margin-bottom">
								<div class="srch-tab-left">
									<label>From</label>
									<div class="input-a">
										<input type="text" name="From_ow" class="form-control auto-complete" placeholder="From" required id="from_ow" autocomplete="off"> 
										<img src="{{asset('img/loader.gif')}}" class="search_loader from_ow_loader" style="width:16px;position: absolute;top: 10px;right: -4px;">
										<input name="from_owInput" id="from_owinput" type="hidden" required>
										<div id="optionFrom_ow"></div>
									</div>	
								</div>
								<div class="srch-tab-right">
									<label>to</label>
									<div class="input-a">
											<input type="text" name="To_ow" class="form-control auto-complete" placeholder="To" required id="to_ow" autocomplete="off"> 
											<img src="{{asset('img/loader.gif')}}" class="search_loader to_ow_loader" style="width:16px;position: absolute;top: 10px;right: -4px;">
											<input name="to_owInput" id="to_owinput" type="hidden" required>
											<div id="optionTo_ow"></div>	
									</div>	
								</div>
								<div class="clear"></div>
							</div>
							<!-- \\ -->							
							</div>
							<!-- \\ -->
														<!-- // -->
							<div class="search-large-i">
							<!-- // -->
							<div class="srch-tab-line no-margin-bottom">
								
									<div class="srch-tab-left">
											<label>Departure</label>
											<div class="input-a">
													<input type="text" name="dept_date"
													 min="{{date("Y-m-d", strtotime("yesterday"))}}"  required class="date-inpt" placeholder="mm/dd/yy" autocomplete="off"/>
												 <span class="date-icon"></span></div>
												
										</div>
										
										<div class="srch-tab-right">
												<label>Class</label>
												<div class="select-wrapper">
														<select class="custom-select" name="ticketClass" required >
																<option value="">Choose seat class</option>
																<option value="1" selected>Economy</option>
																<option value="2">Business</option>
																<option value="3">Executive</option>
															</select>
												</div>	
											</div>
								<div class="clear"></div>
							</div>
							
							<!-- \\ -->								
							</div>
							<!-- // -->
							<div class="search-large-i">
							<!-- // -->
							<div class="srch-tab-line no-margin-bottom">
									<div class="srch-tab-3c">
											<label>Adult</label>
											<div class="select-wrapper">
													<select class="custom-select" name="adult" required data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
															<option value="">Adult</option>
															<option value="1" selected>1</option>
															<option value="2">2</option>
															<option value="3">3</option>
															<option value="4">4</option>
															<option value="5">5</option>
															<option value="6">6</option>
														</select>
											</div>	
											
										
										</div>
										<div class="srch-tab-3c">
												
												<div class="select-wrapper">
														<label>Child</label>
														<select class="custom-select" required name="child" data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																<option value="">Children</option>
																<option value="0" selected>0</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="3">3</option>
																<option value="4">4</option>
																<option value="5">5</option>
																<option value="6">6</option>
															</select>
												</div>
											</div>
											<div class="srch-tab-3c">
												<div class="select-wrapper">
														<label>Infant</label>
														<select class="custom-select" name="infant" required data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																<option value="">Infant</option>
																<option value="0" selected>0</option>
																<option value="1">1</option>
																<option value="2">2</option>
																<option value="2">3</option>
																<option value="4">4</option>
															</select>
												</div>
											</div>
								
								<div class="clear"></div>
							</div>
							<!-- \\ -->							
							</div>
							<!-- \\ -->

							<!-- \\ -->
							<div class="clear"></div>
							<!-- // advanced // -->
							
						<!-- \\ advanced \\ -->
						</div>
						<footer class="search-footer">
							<button class="srch-btn" style="float: right;">Search</button>
							<div class="clear"></div>
						</footer>
					</form>
						</div>

						<div id="return-form">
								<form class="custom-form white-form marginbot-clear search-form" id="oneway-form" method="post" action="/home">
									
									{{csrf_field() }}
									<div class="page-search-p">
											<input type="hidden" name="tripType" value="2" />
										<!-- // -->
										<div class="search-large-i">
										<!-- // -->
										<div class="srch-tab-line no-margin-bottom">
											<div class="srch-tab-left">
												<label>From</label>
												<div class="input-a">
														<input type="text" name="From_r" id="from_r" class="form-control auto-complete" placeholder="From" required autocomplete="off">
														<img src="{{asset('img/loader.gif')}}" class="search_loader from_r_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
														<input name="from_rInput" id="from_rinput" type="hidden">
														<div id="optionFrom_r"></div>
												</div>	
											</div>
											<div class="srch-tab-right">
												<label>to</label>
												<div class="input-a">
														<input type="text" name="To_r" id="to_r" class="form-control auto-complete" placeholder="To" required autocomplete="off">
														  <img src="{{asset('img/loader.gif')}}" class="search_loader to_r_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
														  <input name="to_rInput" id="to_rinput" type="hidden">
                                                          <div id="optionTo_r"></div>
												</div>	
											</div>
											<div class="clear"></div>
										</div>
										<!-- \\ -->							
										</div>
										<!-- \\ -->
																				<!-- // -->
										<div class="search-large-i">
										<!-- // -->
										<div class="srch-tab-line no-margin-bottom">
											
												<div class="srch-tab-3c">
														<label>Departure</label>
														<div class="input-a">
																<input type="text" name="dept_date" class="date-inpt" placeholder="mm/dd/yy" required autocomplete="off"/>
															 <span class="date-icon"></span></div>
															
													</div>
													<div class="srch-tab-3c">
															 <label>Arrival</label>
															 <div class="input-a">
																	<input type="text" name="arrival_date" class="date-inpt" placeholder="mm/dd/yy" required autocomplete="off"/>
																  <span class="date-icon"></span></div>
															
													</div>
													
													<div class="srch-tab-3c">
															<label>Class</label>
															<div class="select-wrapper">
																	<select class="custom-select" name="ticketClass" required >
																			<option value="">Choose seat class</option>
																			<option value="1" selected>Economy</option>
																			<option value="2">Business</option>
																			<option value="3">Executive</option>
																		</select>
															</div>	
														</div>
											<div class="clear"></div>
										</div>
										
										<!-- \\ -->								
										</div>
										<!-- // -->
										<div class="search-large-i">
										<!-- // -->
										<div class="srch-tab-line no-margin-bottom">
												<div class="srch-tab-3c">
														<label>Adult</label>
														<div class="select-wrapper">
																<select class="custom-select" name="adult" required data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																		<option value="">Adult</option>
																		<option value="1" selected>1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		<option value="6">6</option>
																	</select>
														</div>	
														
													
													</div>
													<div class="srch-tab-3c">
															
															<div class="select-wrapper">
																	<label>Child</label>
																	<select class="custom-select" required name="child" data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																			<option value="">Children</option>
																			<option value="0" selected>0</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			<option value="6">6</option>
																		</select>
															</div>
														</div>
														<div class="srch-tab-3c">
															<div class="select-wrapper">
																	<label>Infant</label>
																	<select class="custom-select" name="infant" required data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																			<option value="">Infant</option>
																			<option value="0" selected>0</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="2">3</option>
																			<option value="4">4</option>
																		</select>
															</div>
														</div>
											
											<div class="clear"></div>
										</div>
										<!-- \\ -->							
										</div>
										<!-- \\ -->

										<!-- \\ -->
										<div class="clear"></div>
										<!-- // advanced // -->
										
									<!-- \\ advanced \\ -->
									</div>
									<footer class="search-footer">
										<button class="srch-btn" style="float:right">Search</button>
										<div class="clear"></div>
									</footer>
								</form>
					</div>

								<div id="multi-form">
									<div style="height: 34px; margin-right:15px;">
									<button class="add-btn btn-new" type="button" id="add_trip_field"><i class="fa fa-plus"> </i> add</button>	
									<button class="minus-btn btn-new" type="button" id="minus_trip_field"><i class="fa fa-minus"> </i> remove</button>
									</div>
										<form class="custom-form white-form marginbot-clear search-form" id="oneway-form" method="post" action="/home">
									
											{{csrf_field() }}
											<input type="hidden" name="tripType" value="3" />
												<input type="hidden" name="tripNum" id="tripNum" value="2" />
											<div class="page-search-p">
													<input type="hidden" name="tripType" value="3" />
												<!-- // -->
												<div class="search-large-i">
												<!-- // -->
												<div class="srch-tab-line no-margin-bottom">
													<div class="srch-tab-left">
														<label>From</label>
														<div class="input-a">
																<input type="text" name="From_m1" id="from_m1" class="auto-complete" placeholder="From" required autocomplete="off">
																<img src="{{asset('img/loader.gif')}}" class="search_loader from_m1_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
																<input name="from_m1Input" id="from_m1input" type="hidden" class="hidden">
																<div id="optionFrom_m1"></div>	
														</div>	
													</div>
													<div class="srch-tab-right">
														<label>to</label>
														<div class="input-a">
																<input type="text" name="To_m1" id="to_m1" class="auto-complete" placeholder="To" required autocomplete="off">
																<img src="{{asset('img/loader.gif')}}" class="search_loader to_m1_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
																<input name="to_m1Input" id="to_m1input" type="hidden">
																<div id="optionTo_m1"></div>
														</div>	
													</div>
													<div class="clear"></div>
												</div>
												<!-- \\ -->							
												</div>
												<!-- \\ -->
												<!-- // -->
												<div class="search-large-i">
												<!-- // -->
												<div class="srch-tab-line no-margin-bottom">
														<div class="srch-tab-3c">
																<label>Adult</label>
																<div class="select-wrapper">
																		<select class="custom-select" name="adult" required data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																				<option value="">Adult</option>
																				<option value="1" selected>1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				<option value="5">5</option>
																				<option value="6">6</option>
																			</select>
																</div>	
																
															
															</div>
															<div class="srch-tab-3c">
																	
																	<div class="select-wrapper">
																			<label>Child</label>
																			<select class="custom-select" required name="child" data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																					<option value="">Children</option>
																					<option value="0" selected>0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>
																					<option value="6">6</option>
																				</select>
																	</div>
																</div>
																<div class="srch-tab-3c">
																	<div class="select-wrapper">
																			<label>Infant</label>
																			<select class="custom-select" name="infant" required data-jcf='{"wrapNative": false, "wrapNativeOnMobile": false}'>
																					<option value="">Infant</option>
																					<option value="0" selected>0</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="2">3</option>
																					<option value="4">4</option>
																				</select>
																	</div>
																</div>
													
													<div class="clear"></div>
												</div>
												<!-- \\ -->							
												</div>
												<!-- \\ -->
												<!-- // -->
												<div class="search-large-i">
												<!-- // -->
												<div class="srch-tab-line no-margin-bottom">
													
														<div class="srch-tab-left">
																<label>Departure</label>
																<div class="input-a">
																		<input type="text" name="dept_date1" class="date-inpt" placeholder="mm/dd/yy" autocomplete="off" required/>
																	 <span class="date-icon"></span></div>
																	
															</div>
															
															<div class="srch-tab-right">
																	<label>Class</label>
																	<div class="select-wrapper">
																			<select class="custom-select" name="ticketClass" required >
																					<option value="">Choose seat class</option>
																					<option value="1" selected>Economy</option>
																					<option value="2">Business</option>
																					<option value="3">Executive</option>
																				</select>
																	</div>	
																</div>
													<div class="clear"></div>
												</div>
												
												<!-- \\ -->								
												</div>
											<div class="trip-fields">
												<div class="new-trip-field">
														<div class="search-large-i">
																<div class="srch-tab-line no-margin-bottom" style="margin-top:30px;">
																	<div class="srch-tab-left">
																			<label>from</label>
																			<div class="input-a">
																					<input type="text" name="From_m2" id="from_m2" class="auto-complete" placeholder="From" required autocomplete="off">
																					<img src="{{asset('img/loader.gif')}}" class="search_loader from_m2_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
																					<input name="from_m2Input" id="from_m2input" type="hidden" class="hidden">
																					<div id="optionFrom_m2"></div>
																			</div>
																	</div>
																	
																	<div class="srch-tab-right">
																		<label>to</label>
																		<div class="input-a">
																			<input type="text" name="To_m2" id="to_m2" class="form-control auto-complete" placeholder="To" required autocomplete="off">
																			<img src="{{asset('img/loader.gif')}}" class="search_loader to_m2_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
																			<input name="to_m2Input" id="to_m2input" type="hidden">
																			<div id="optionTo_m2"></div>
																		</div>
																	</div>
																	
																	<div class="clear"></div>
																</div>
																</div>
				
																<div class="search-large-i">
																		<div class="srch-tab-line no-margin-bottom" style="margin-top:30px;">
																			<div class="srch-tab-left">
																					<label>Departure</label>
																					<div class="input-a">
																							<input type="text" name="dept_date2" class="date-inpt" placeholder="mm/dd/yy" autocomplete="off" required/>
																						 <span class="date-icon"></span></div>
																						
																				</div>
																			
																			<div class="clear"></div>
																		</div>
																</div>
												</div>

												
											</div>
												<!-- \\ -->
												<div class="clear"></div>
												<!-- // advanced // -->
												
											<!-- \\ advanced \\ -->
											</div>
											<footer class="search-footer">
												<button class="srch-btn" type="submit" style="float:right">Search</button>
												<div class="clear"></div>
											</footer>
										</form>
								</div>
						
					</div>
					<!-- // tab content tickets // -->	
				<!-- // tab content hotels // -->
				
				<!-- // tab content hotels // -->
				<div class="search-tab-content">
					<div class="page-search-p">
					<!-- // -->
						<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<label>Place / hotel name</label>
							<div class="input-a"><input type="text" value="" placeholder="Example:france"></div>
						</div>
						<!-- // -->							
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<div class="srch-tab-left">
								<label>Check in</label>
								<div class="input-a"><input type="text" value="" class="date-inpt" placeholder="mm/dd/yy"> <span class="date-icon"></span></div>	
							</div>
							<div class="srch-tab-right">
								<label>Check out</label>
								<div class="input-a"><input type="text" value="" class="date-inpt" placeholder="mm/dd/yy"> <span class="date-icon"></span></div>	
							</div>
							<div class="clear"></div>
						</div>
						<!-- \\ -->						
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<div class="srch-tab-3c">
								<label>Rooms</label>
								<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
							</div>
							<div class="srch-tab-3c">
								<label>adult</label>
								<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
							</div>
							<div class="srch-tab-3c">
								<label>Child</label>
								<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- \\ -->						
						</div>
					<!-- \\ -->
					<div class="clear"></div>

					<!-- // advanced // -->
					
					<!-- \\ advanced \\ -->
					</div>
					<footer class="search-footer">
						<a href="#" class="srch-btn">Search</a>	
						<div class="clear"></div>
					</footer>
				</div>
				<!-- // tab content hotels // -->
					
				<!-- // tab content tours // -->
				{{-- <div class="search-tab-content">
					<div class="page-search-p">
					
					<!-- // -->
					<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<div class="srch-tab-left">
								<label>Country</label>
								<div class="input-a"><input type="text" value="" placeholder="example: france"></div>	
							</div>
							<div class="srch-tab-right">
								<label>city</label>
								<div class="input-a"><input type="text" value="" placeholder="vienna"></div>	
							</div>
							<div class="clear"></div>
						</div>
						<!-- \\ -->					
					</div>
					<!-- \\ -->
					<!-- // -->
					<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<div class="srch-tab-left">
								<label>Check in</label>
								<div class="input-a"><input type="text" value="" class="date-inpt" placeholder="mm/dd/yy"> <span class="date-icon"></span></div>
							</div>
							<div class="srch-tab-right">
								<label>Check out</label>
								<div class="input-a"><input type="text" value="" class="date-inpt" placeholder="mm/dd/yy"> <span class="date-icon"></span></div>
							</div>
							<div class="clear"></div>
						</div>
						<!-- \\ -->					
					</div>
					<!-- \\ -->
					<!-- // -->
					<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<div class="srch-tab-left transformed">
								<label>hotel stars</label>
								<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>	
							</div>
							<div class="srch-tab-right transformed">
								<label>Peoples</label>
								<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>	
							</div>
							<div class="clear"></div>
						</div>
						<!-- \\ -->						
					</div>
					<!-- \\ -->
					<div class="clear"></div>

					<!-- // advanced // -->
					<div class="search-asvanced">
						<!-- // -->
						<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<label>Price</label>
							<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>	
						</div>
						<!-- \\ -->							
						</div>	
						<!-- \\ -->
						<!-- // -->
						<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<label>Property type</label>
							<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>	
						</div>
						<!-- \\ -->								
						</div>	
						<!-- \\ -->
						<!-- // -->
						<div class="search-large-i">
						<!-- // -->
						<div class="srch-tab-line no-margin-bottom">
							<label>rating</label>
							<div class="select-wrapper">
								<select class="custom-select">
									<option>--</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
							</div>	
						</div>
						<!-- \\ -->								
						</div>	
						<!-- \\ -->
						<div class="clear"></div>		
					</div>
					<!-- \\ advanced \\ -->
						
					</div>
					<footer class="search-footer">
						<a href="#" class="srch-btn">Search</a>	
						<span class="srch-lbl">Advanced Search options</span>
						<div class="clear"></div>
					</footer>
				</div> --}}
				<!-- // tab content tours // -->	
				
										
			</div>
		</div>
		</div>
		<!-- \\ search \\ -->

		<div class="clear"></div>	
	 </div>
	</div>
		
	<div class="mp-pop">
		<div class="wrapper-padding-a">
			<div class="mp-popular popular-destinations">
				<header class="fly-in">
					<b style="font-weight:bold;">Popular Destinations</b>
					
				</header>
				
				<div class="fly-in mp-popular-row" >
					<!-- // -->
						<div class="offer-slider-i bs br-4">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/dubai.jpg" class="br-4" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Dubai, UAE</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">11 NOV 2019 - 22 NOV 2019</div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r align-right">
									{{-- <b>450$</b>
									<span>price</span> --}}
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i bs br-4">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/offer-big-02.jpg" class="br-4" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">amsterdam, netherlands</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">11 NOV 2019 - 22 NOV 2019</div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r align-right">
									{{-- <b>756$</b>
									<span>price</span> --}}
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->	
					<!-- // -->
						<div class="offer-slider-i bs br-4">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/singapore.jpg" class="br-4"/>
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Orchard road, Singapore</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">11 NOV 2019 - 22 NOV 2019</div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r align-right">
									
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
				</div>
				<div class="clear"></div>						
			</div>
</div>
		<div class="our-travel-agency">
			<div class="mp-popular"  >
				<header class="fly-in">
					<b style="color:#fff">Why book with Awaflights?</b>
				</header>
				<div class="fly-in advantages-row">
					<div class="advantages-i">
						<div class="advantages-a"><i class="fa fa-search icon-circle icon-mandy fa-2x icon-search"></i></div>
						<div class="advantages-b">Search/Find</div>
						<div class="advantages-c">
							Find the best deals and save money on your Flights and Hotel around the world
							.</div>
					</div>
					<div class="advantages-i">
						<div class="advantages-a"><i class="fa fa-check icon-circle icon-primary fa-2x icon-search"></i></div>
						<div class="advantages-b">Choose</div>
						<div class="advantages-c">
							Select from our cutting edge deals that won’t dig deep into your pockets
							.</div>
					</div>
					<div class="advantages-i">
						<div class="advantages-a"><i class="fa fa-plane icon-circle icon-picton fa-2x icon-buy"></i></div>
						<div class="advantages-b">Buy & Travel</div>
						<div class="advantages-c">
							Paying for your chosen deals is no more a rocket science. Easy and seamless
							.</div>
					</div>
				</div>
			</div>
		</div>

		<!-- </div> -->
	</div>

  {{-- <div style="background:url(img/in2_popular.jpg) center top no-repeat;" class="last-order fly-in">
    <div class="last-order-content">
      <div class="last-order-a fly-in">Ropular Deal</div>
      <div class="last-order-b fly-in">Grand hotel - london, england</div>
      <div class="last-order-c fly-in">Fri 14 Now - Sun 16 Now</div>
      <div class="last-order-d fly-in">300$</div>
      <a href="#" class="last-order-btn fly-in">Book now</a>
    </div>
  </div> --}}
  
  <div class="partners fly-in">
    <a href="#"><img alt="" src="img/amadeus.png" alt="amadeus" /></a>
	<a href="#"><img alt="" src="img/paystack.png" alt="paystack"/></a>
	<a href="#"><img alt="" src="img/mavers.png" alt="mavers"/></a>
	<!-- amadeus -->
	<!-- paystack -->
	<!-- travelbeta -->
  </div>

	<div class="mp-offesr no-margin">
		<div class="wrapper-padding-a">  
			<div class="offer-slider duble-margin">
				<header class="fly-in page-lbl">
					<div class="offer-slider-lbl">We are Offering the hottest offers</div>
					
				</header>
				<div class="fly-in offer-slider-c">
					<div id="offers-a" class="owl-slider owl-carousel owl-theme p6">
					<!-- // -->
						<div class="offer-slider-i bs br-4 item">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/slide-09.jpg" class="br-4"/>
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Eko Hotel & suites</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">Location: Lagos </div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r">
									
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i bs item br-4">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/slide-07.jpg"  class="br-4"/>
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Campanile Cracovie</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">location: poland</div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r">
									
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i bs item br-4">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/slide-10.jpg" class="br-4" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Intercontinental Hotel</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">Location: Lagos </div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r">
									
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i bs br-4 item" >
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/slide-11.jpg" class="br-4" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Presidential Hotel</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">location: Abuja</div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r">
									{{-- <b>630$</b>
									<span>avg/night</span> --}}
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i bs br-4 item">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/slide-01.jpg" class="br-4" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Andrassy Thai Hotel</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">Location: Thailand </div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r">
									{{-- <b>756$</b>
									<span>avg/night</span> --}}
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i bs br-4 item">
							<a class="offer-slider-img br-4" href="#">
								<img alt="" src="img/slide-05.jpg" class="br-4"/>
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">coming soon</span>
								</span>
							</a>
							<div class="offer-slider-txt br-4">
								<div class="offer-slider-link"><a href="#">Lobster </a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">location: Texas</div>
									<nav class="stars">
										<ul>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-b.png" /></a></li>
											<li><a href="#"><img alt="" src="img/star-a.png" /></a></li>
										</ul>
										<div class="clear"></div>
									</nav>
								</div>
								<div class="offer-slider-r">
									{{-- <b>900$</b>
									<span>avg/night</span> --}}
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->


					<!-- \\ -->

					</div>
				</div>
			</div>  
			</div>
		</div>
    
    
      	
  </div>

</div>
<!-- /main-cont -->
@include('layout.footer')
<!-- // scripts // -->
 