
			$('.search-form').on('submit', function(e){
				$('.srch-overlay').show();
			});

            var containerEl = document.querySelector('.catalog-row');
            var stopFilter = document.querySelector('.stop-filter');
            var priceSort = document.querySelector('.price-sort');

			var mixer = mixitup(containerEl);
			
			mixer.sort('fare:asc');

            stopFilter.addEventListener('change', function() {
                var selector = stopFilter.value;

                mixer.filter(selector);
            });

            priceSort.addEventListener('change', function() {
                var order = priceSort.value;
				console.log(order);
                mixer.sort(order);
			});
			var checkboxGroup = document.querySelector('.checkbox-group');
            var checkboxes = checkboxGroup.querySelectorAll('.airlineCheck');
            var allCheckbox = checkboxGroup.querySelector('.allAirlineCheck');

            var mixer = mixitup(containerEl);

            checkboxGroup.addEventListener('change', function(e) {
                var selectors = [];
                var checkbox;
                var i;

                if (e.target === allCheckbox && e.target.checked) {
                    // If the "all" checkbox was checked, uncheck all other checkboxes

                    for (i = 0; i < checkboxes.length; i++) {
                        checkbox = checkboxes[i];

                        if (checkbox !== allCheckbox) checkbox.checked = false;
                    }
                } else {
                    // Another checkbox was changed, uncheck "all".

                    allCheckbox.checked = false;
                }

                // Iterate through all checkboxes, pushing the
                // values of those that are checked into an array

                for (i = 0; i < checkboxes.length; i++) {
                    checkbox = checkboxes[i];

                    if (checkbox.checked) selectors.push(checkbox.value);
                }

                // If there are values in the array, join it into a string
                // using your desired logic, and send to the mixer's .filter()
                // method, otherwise filter by 'all'

                var selectorString = selectors.length > 0 ?
                    selectors.join(',') : // or '.' for AND logic
                    'all';

                mixer.filter(selectorString);
            });
     
		$(document).ready(function(){
		$('.date-inpt').datepicker({
			minDate:'1'
		});
		$('.adult-date-inpt').datepicker({
			modal:true,
			maxDate:('-12Y-1D'),
			changeMonth:true,
			changeYear:true,
			yearRange:("c-70:c+10")
		});
		$('.child-date-inpt').datepicker({
			maxDate:('-2Y-1D'),
			minDate:('-12Y'),
			yearRange:("c-12:c+1"),
			changeMonth:true,
			changeYear:true
		});
		$('.infant-date-inpt').datepicker({
			maxDate:('-1'),
			minDate:('-2Y'),
			changeMonth:true,
			changeYear:true
		});
		$('.contact-date-inpt').datepicker({
			modal:true,
			maxDate:('-12Y'),
			changeMonth:true,
			changeYear:true,
			yearRange:("c-70:c+1")
		});

		$(document).on('click','#add_trip_field',function(){
			$('.date-inpt').datepicker({
				minDate:'1'
			});
		});

		$('.custom-select').customSelect();
	  $slideHover();
		  $(function() {
				$(document.body).on('appear', '.fly-in', function(e, $affected) {
				  $(this).addClass("appeared");
				});
				$('.fly-in').appear({force_process: true});
		  });
		  
		  $('#testimonials-slider').bxSlider({
			  infiniteLoop: true,
			  speed: 600,
			  minSlides: 1,
			  maxSlides: 1,
			  moveSlides: 1,
			  auto: false,
			  slideMargin: 0      
		  });
		
		   $(".owl-slider").owlCarousel({
			  loop:true,
			  margin:28,
			  responsiveClass:true,
			  responsive:{
		  0:{
			  items:1,
			  nav:true
		  },
		  620:{
			  items:2,
			  nav:true
		  },
		  900:{
			  items:3,
			  nav:false
		  },
		  1120:{
			  items:4,
			  nav:true,
			  loop:false
		  }
		  }
		  });
		  
		  $slideHover();
		
		});

 
   
 
  
	  var input = document.querySelector('#phoneNumber');
		var iti = window.intlTelInput(input,{
			nationalMode: true,
			initialCountry: "NG",
  			utilsScript: "{{asset('js/intltelinput/utils.js')}}"
			});

			$('#phoneNumber').on('change',function(){
			if(iti.isValidNumber()){
			$('#phoneNumber').val(iti.getNumber());
			$('#completeBookingBtn').removeAttr('disabled').removeClass('has-error');
			}else{
				$('#phoneNumber').addClass('has-error');
				$('#completeBookingBtn').attr('disabled','true');
			}
		});	


		$(document).ready(function(){
			let dropdown = $('.country-code');

				dropdown.empty();
				
				dropdown.append('<option selected="true" disabled>Country</option>');
				dropdown.prop('selectedIndex', 0);
				const url = '{{asset('country_code.json')}}';
				$.getJSON(url, function (data) {
				$.each(data, function (key, entry) {
					dropdown.append($('<option></option>').attr('value', entry.Code).text(entry.Name));
				})
				});

				$('.country-code').select2();
		});
		



	
		$(document).ready(function(){
			
			
			@if(null !== old('tripType')) 
			let type = "{!! old('tripType') !!}";
				$("input.tripType").filter("input[value="+type+"]").attr("checked", true);
			@endif
			var tripType =  ($('input.tripType').filter(':checked').val() != undefined)?$('input.tripType').filter(':checked').val():'';
			//tripType = getUrlParameter('tripType');
			//console.log(tripType);
			let showReturn = function (){
					$('#return-form').show('easeOutBounce');
					$('#multi-form').hide();
					$('#oneway-form').hide();
					
			}
			let showOneWay = function (){
					$('#return-form').hide();
					$('#multi-form').hide();
					$('#oneway-form').show('easeOutBounce');
			}
			let showMulti = function(){
					$('#return-form').hide();
					$('#multi-form').show('fadeIn');
					$('#oneway-form').hide();
			}
			let tripShow = function(tripType){
				return (tripType==='1')?showOneWay():((tripType==='3')?showMulti():showReturn());
			}
			tripShow(tripType);

			$('input.tripType').on('change', function(e){
				tripShow($(this).val());
			});
				
			

		});

		$(document).ready(function(){
			$('.search_loader').hide();
			$('#minus_trip_field').hide();
			var tripNum = 2;
			var loaderImgLocation = '{{asset('img/loader.gif')}}';
			var tripsContainer = $('.trip-fields');
			var tripNumField = $('#tripNum');

			$('#add_trip_field').on('click', (e)=>{
				++tripNum; 
				trip_input = '<div class="new-trip-field"><div class="search-large-i"><div class="srch-tab-line no-margin-bottom"  style="margin-top:30px;">'+
							'<div class="srch-tab-left"><label>from</label><div class="input-a"><input type="text" name="From_m'+tripNum+'" id="from_m'+tripNum+'" class="auto-complete" placeholder="From" required autocomplete="off">'+
							'<img src="'+loaderImgLocation+'" class="search_loader from_m'+tripNum+'_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> '+
							'<input name="from_m'+tripNum+'Input" id="from_m'+tripNum+'input" type="hidden" class="hidden"><div id="optionFrom_m'+tripNum+'"></div>'+
							'</div></div><div class="srch-tab-right"><label>to</label><div class="input-a">'+
							'<input type="text" name="To_m'+tripNum+'" id="to_m'+tripNum+'" class="form-control auto-complete" placeholder="To" required autocomplete="off">'+
							'<img src="'+loaderImgLocation+'" class="search_loader to_m'+tripNum+'_loader" style="width:16px;position: absolute;top: 10px;right: -4px;"> '+
							'<input name="to_m'+tripNum+'Input" id="to_m'+tripNum+'input" type="hidden"><div id="optionTo_m'+tripNum+'"></div></div></div>'+
							'<div class="clear"></div></div></div><div class="search-large-i" style="float:none;"><div class="srch-tab-line no-margin-bottom">'+
							'<div class="srch-tab-left"><label>Departure</label><div class="input-a"><input type="text" name="dept_date'+tripNum+'" class="date-inpt" placeholder="Departure" autocomplete="off" required/>'+
							'<span class="date-icon"></span></div></div><div class="clear"></div></div></div></div>';
				tripsContainer.append(trip_input);
				$('.search_loader').hide();
				tripNumField.val(tripNum);
				$('#minus_trip_field').show();
			});
			$('#minus_trip_field').on('click', (e)=>{
				if(tripNum>2){
					tripsContainer.children().last().remove();
					--tripNum;
					tripNumField.val(tripNum);
					(tripNum==2)?$('#minus_trip_field').hide():'';
				}
				
			});
		});

		$(document).ready(function(){
			var cur = '';
			$('.search_loader').hide();
			$(document).on('keyup','.auto-complete',function(){
			cur = $(this).attr('name');
			var query = $(this).val();
			if(query != '' && query.length>2)
			{
				$('.'+cur.toLowerCase()+'_loader').show();
				console.log('about to make request');
				var token = $('input[name="_token"]').val();
				$.ajax({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
				},
				url:"{{ 'fetch' }}",
				method:"POST",
				data: {'query':query},
				success: function(data){
					$('#option'+cur).fadeIn();
					$('.'+cur.toLowerCase()+'_loader').hide();
					$('#option'+cur).html(data);
				}
				});
			}else{
				$('.'+cur.toLowerCase()+'_loader').hide();
			}
			});
			
			$(document).on('click','li.airports', function(){
			$('#'+cur.toLowerCase()).val($(this).html());
			$('#'+cur.toLowerCase()+'input').val($(this).attr('role-c'));
			$('#option'+cur).fadeOut();
			});

			@if(null !== old('adult')) 
			let adult = "{!! old('adult') !!}";
				$("select[name='adult'] option[value="+adult+"]").attr("selected", true)
			@endif
			@if(null !== old('child')) 
			let child = "{!! old('child') !!}";
				$("select[name='child'] option[value="+child+"]").attr("selected", true)
			@endif
			@if(null !== old('infant')) 
			let infant = "{!! old('infant') !!}";
				$("select[name='infant'] option[value="+infant+"]").attr("selected", true)
			@endif
			@if(null !== old('ticketClass')) 
			let className = "{!! old('ticketClass') !!}";
				$("select[name='ticketClass'] option[value="+className+"]").attr("selected", true)
			@endif
			

  		});
