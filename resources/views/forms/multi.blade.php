<div id="multi-form">
		<div style="height: 34px; margin-right:15px; margin-top:5px;">
		<button class="add-btn btn-new" type="button" id="add_trip_field"><i class="fa fa-plus"> </i> add</button>	
		<button class="minus-btn btn-new" type="button" id="minus_trip_field"><i class="fa fa-minus"> </i> remove</button>
		</div>
			<form class="custom-form white-form marginbot-clear search-form"  method="post" action="/home">
		
				{{csrf_field() }}
				<input type="hidden" name="tripType" value="3" />
					<input type="hidden" name="tripNum" id="tripNum" value="2" />
				<div class="page-search-p">
						<input type="hidden" name="tripType" value="2" />
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
														<input type="text" name="From_m3" id="from_m3" class="auto-complete" placeholder="From" required autocomplete="off">
														<img src="{{asset('img/loader.gif')}}" class="search_loader from_m3_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
														<input name="from_m3Input" id="from_m3input" type="hidden" class="hidden">
														<div id="optionFrom_m3"></div>
												</div>
										</div>
										
										<div class="srch-tab-right">
											<label>to</label>
											<div class="input-a">
												<input type="text" name="To_m3" id="to_m3" class="form-control auto-complete" placeholder="To" required autocomplete="off">
												<img src="{{asset('img/loader.gif')}}" class="search_loader to_m3_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
												<input name="to_m3Input" id="to_m3input" type="hidden">
												<div id="optionTo_m3"></div>
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
																<input type="text" name="dept_date" class="date-inpt" placeholder="Departure" autocomplete="off" required/>
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
