<div id="return-form">
		<form class="custom-form white-form marginbot-clear"  method="post" action="/home">
			
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
								<input type="text" name="From_r" id="from_r" value="{{ old('From_r') }}" class="form-control auto-complete" placeholder="From" required autocomplete="off">
								<img src="{{asset('img/loader.gif')}}" class="search_loader from_r_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
								<input name="from_rInput" id="from_rinput" value="{{ old('from_rInput') }}"  type="hidden">
								<div id="optionFrom_r"></div>
						</div>	
					</div>
					<div class="srch-tab-right">
						<label>to</label>
						<div class="input-a">
								<input type="text" name="To_r" id="to_r"  value="{{ old('To_r') }}"  class="form-control auto-complete" placeholder="To" required autocomplete="off">
								  <img src="{{asset('img/loader.gif')}}" class="search_loader to_r_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> 
								  <input name="to_rInput" id="to_rinput" value="{{ old('to_rInput') }}" type="hidden">
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
										<input type="text" name="dept_date"  value="{{ old('dept_date') }}" class="date-inpt" placeholder="Departure" required autocomplete="off"/>
									 <span class="date-icon"></span></div>
									 <label>Arrival</label>
									 <div class="input-a">
											<input type="text" name="arrival_date" value="{{ old('arrival_date') }}"  class="date-inpt" placeholder="Arrival" required autocomplete="off"/>
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
