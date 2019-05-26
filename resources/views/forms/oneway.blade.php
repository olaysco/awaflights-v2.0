<div id="oneway-form">
		<form class="custom-form white-form marginbot-clear" method="post" action="/home">
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
						<input type="text" name="From_ow" value="{{ old('From_ow') }}" class="form-control auto-complete" placeholder="From" required id="from_ow" autocomplete="off"> 
						<img src="{{asset('img/loader.gif')}}" class="search_loader from_ow_loader" style="width:16px;position: absolute;top: 10px;right: -4px;">
					<input name="from_owInput" value="{{ old('from_owInput') }}" id="from_owinput" type="hidden" required>
						<div id="optionFrom_ow"></div>
					</div>	
				</div>
				<div class="srch-tab-right">
					<label>to</label>
					<div class="input-a">
							<input type="text" name="To_ow" value="{{ old('To_ow') }}" class="form-control auto-complete" placeholder="To" required id="to_ow" autocomplete="off"> 
							<img src="{{asset('img/loader.gif')}}" class="search_loader to_ow_loader" style="width:16px;position: absolute;top: 10px;right: -4px;">
							<input name="to_owInput" value="{{ old('to_owInput') }}" id="to_owinput" type="hidden" required>
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
									 min="{{date("Y-m-d", strtotime("yesterday"))}}" value="{{ old('dept_date') }}" required class="date-inpt" placeholder="Departure" autocomplete="off"/>
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
			
			<div class="clear"></div>
		</footer>
	</form>
		</div>
