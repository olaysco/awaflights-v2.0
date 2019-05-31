
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
										<div class="srch-tab-right">
												
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
													<input type="text" name="dept_date"
													 min="{{date("Y-m-d", strtotime("yesterday"))}}"  required class="date-inpt" placeholder="Departure" autocomplete="off"/>
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
								<label>Air company</label>
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
							
							<!-- \\ -->							
							</div>
							<!-- \\ -->
							<div class="clear"></div>
						</div>
						<!-- \\ advanced \\ -->
						</div>
						<footer class="search-footer">
							<button class="srch-btn">Search</button>	
							<span class="srch-lbl">Advanced Search options</span>
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
												<div class="srch-tab-left transformed">
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
													<div class="srch-tab-right">
															
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
																<input type="text" name="dept_date" class="date-inpt" placeholder="Departure" required autocomplete="off"/>
															 <span class="date-icon"></span></div>
															 <label>Arrival</label>
															 <div class="input-a">
																	<input type="text" name="arrival_date" class="date-inpt" placeholder="Arrival" required autocomplete="off"/>
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
											<label>Air company</label>
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
										
										<!-- \\ -->							
										</div>
										<!-- \\ -->
										<div class="clear"></div>
									</div>
									<!-- \\ advanced \\ -->
									</div>
									<footer class="search-footer">
										<button class="srch-btn">Search</button>	
										<span class="srch-lbl">Advanced Search options</span>
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
														<div class="srch-tab-left transformed">
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
															<div class="srch-tab-right">
																	
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
																		<input type="text" name="dept_date1" class="date-inpt" placeholder="Departure" autocomplete="off" required/>
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
				
																<div class="search-large-i" style="float:none;">
																		<div class="srch-tab-line no-margin-bottom">
																			<div class="srch-tab-left">
																					<label>Departure</label>
																					<div class="input-a">
																							<input type="text" name="dept_date2" class="date-inpt" placeholder="Departure" autocomplete="off" required/>
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
													<label>Air company</label>
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
												
												<!-- \\ -->							
												</div>
												<!-- \\ -->
												<div class="clear"></div>
											</div>
											<!-- \\ advanced \\ -->
											</div>
											<footer class="search-footer">
												<button class="srch-btn" type="submit">Search</button>
												<span class="srch-lbl">Advanced Search options</span>
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
					<div class="search-asvanced">
						<!-- // -->
						<div class="search-large-i">
							<!-- // -->
							<div class="srch-tab-line no-margin-bottom">
								<div class="srch-tab-left">
									<label>hotel stars</label>
									<div class="input-a"><input type="text" value="" placeholder="--"></div>	
								</div>
								<div class="srch-tab-right">
									<label>Price</label>
									<div class="input-a"><input type="text" value="" placeholder="--"></div>	
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
								<label>Rating</label>
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
					<b>Popular Destinations</b>
					<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
				</header>
				
				<div class="fly-in mp-popular-row" >
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/offer-big-01.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">Paris, france</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">11 NOV 2014 - 22 NOV 2014</div>
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
									<b>450$</b>
									<span>price</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/offer-big-02.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">amsterdam, netherlands</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">11 NOV 2014 - 22 NOV 2014</div>
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
									<b>756$</b>
									<span>price</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->	
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/offer-big-02.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">london, england</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">11 NOV 2014 - 22 NOV 2014</div>
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
									<b>1200$</b>
									<span>price</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
				</div>
				<div class="clear"></div>						
			</div>

			<div class="mp-popular">
				<header class="fly-in">
					<b>Our travel Agency</b>
					<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</p>
				</header>
				<div class="fly-in advantages-row">
					<div class="advantages-i">
						<div class="advantages-a"><img alt="" src="img/adv-01.png" /></div>
						<div class="advantages-b">we love our clients</div>
						<div class="advantages-c">Perspiciatis unde omnis iste natus doxes sit voluptatem accusantium doloremque la dantiumeaque ipsa.</div>
					</div>
					<div class="advantages-i">
						<div class="advantages-a"><img alt="" src="img/adv-02.png" /></div>
						<div class="advantages-b">brilliant prices</div>
						<div class="advantages-c">Perspiciatis unde omnis iste natus doxes sit voluptatem accusantium doloremque la dantiumeaque ipsa.</div>
					</div>
					<div class="advantages-i">
						<div class="advantages-a"><img alt="" src="img/adv-03.png" /></div>
						<div class="advantages-b">many different tours</div>
						<div class="advantages-c">Perspiciatis unde omnis iste natus doxes sit voluptatem accusantium doloremque la dantiumeaque ipsa.</div>
					</div>
				</div>
			</div>

		</div>
	</div>

  <div style="background:url(img/in2_popular.jpg) center top no-repeat;" class="last-order fly-in">
    <div class="last-order-content">
      <div class="last-order-a fly-in">Ropular Deal</div>
      <div class="last-order-b fly-in">Grand hotel - london, england</div>
      <div class="last-order-c fly-in">Fri 14 Now - Sun 16 Now</div>
      <div class="last-order-d fly-in">300$</div>
      <a href="#" class="last-order-btn fly-in">Book now</a>
    </div>
  </div>
  
  <div class="partners fly-in">
    <a href="#"><img alt="" src="img/partner-01.png" /></a>
    <a href="#"><img alt="" src="img/partner-02.png" /></a>
    <a href="#"><img alt="" src="img/partner-03.png" /></a>
    <a href="#"><img alt="" src="img/partner-04.png" /></a>
    <a href="#"><img alt="" src="img/partner-05.png" /></a>
    <a href="#"><img alt="" src="img/partner-06.png" /></a>
  </div>

	<div class="mp-offesr no-margin">
		<div class="wrapper-padding-a">  
			<div class="offer-slider duble-margin">
				<header class="fly-in page-lbl">
					<div class="offer-slider-lbl">We are Offering the hottest offers</div>
					<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione.</p>
				</header>
				<div class="fly-in offer-slider-c">
					<div id="offers-a" class="owl-slider">
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-01.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
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
									<b>756$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-02.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
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
									<b>900$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-03.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">Park Plaza Westminster</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">Location: Thailand </div>
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
									<b>850$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-04.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">Ermin's Hotel</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">location: england</div>
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
									<b>630$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-01.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
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
									<b>756$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-02.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
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
									<b>900$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-03.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">Park Plaza Westminster</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">Location: Thailand </div>
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
									<b>850$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->
					<!-- // -->
						<div class="offer-slider-i">
							<a class="offer-slider-img" href="#">
								<img alt="" src="img/slide-04.jpg" />
								<span class="offer-slider-overlay">
									<span class="offer-slider-btn">view details</span>
								</span>
							</a>
							<div class="offer-slider-txt">
								<div class="offer-slider-link"><a href="#">Ermin's Hotel</a></div>
								<div class="offer-slider-l">
									<div class="offer-slider-location">location: england</div>
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
									<b>630$</b>
									<span>avg/night</span>
								</div>
								<div class="offer-slider-devider"></div>								
								<div class="clear"></div>
							</div>
						</div>
					<!-- \\ -->

					</div>
				</div>
			</div>  
			</div>
		</div>
    
    <div class="testimonials">
    
      <div class="testimonials-lbl fly-in">what our client say</div>
      <div class="testimonials-lbl-a fly-in">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.</div>  
      
      <div class="testimonials-holder fly-in">
      	<div id="testimonials-slider">
      	<!-- // -->
      	<div class="testimonials-i">
        	<div class="testimonials-a"><img alt="" src="img/testimonial.gif" /></div>
        	<div class="testimonials-b">"Qerspeciatis unde omnis iste natus doxes sit voluptatem accusantium doloremque laudantium, totam aperiam eaque ipsa quae ab illo inventore veritatis et quasi architecto"</div>
        	<div class="testimonials-c">
          	<nav>
            	<ul>
              	<li><a href="#"><img alt="" src="img/ts-star.png" /></a></li>
              	<li><a href="#"><img alt="" src="img/ts-star.png" /></a></li>
              	<li><a href="#"><img alt="" src="img/ts-star.png" /></a></li>
              	<li><a href="#"><img alt="" src="img/ts-star.png" /></a></li>
              	<li><a href="#"><img alt="" src="img/ts-star.png" /></a></li>
            	</ul>
          	</nav>
        	</div>
        	<div class="testimonials-d">Albert Dowson, Company Director</div>
      	</div>
      	<!-- \\ -->
      	</div>
      </div>
      
    </div>
      	
  </div>

</div>
<!-- /main-cont -->
@include('layout.footer')
<!-- // scripts // -->
 