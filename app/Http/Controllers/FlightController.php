<?php

namespace App\Http\Controllers;

use Mail;
use App\Flight;
use Validator;
use Illuminate\Http\Request;
use Unirest\Request as req;

class FlightController extends Controller
{
    //

    /**
     * Fetch airports from search request
     *
     * @param illuminate/Http/Request $request
     * @return string $output 
     */

	private $ch;
	private $err;
	private $token = '';
	private $flight_search = 'http://139.162.210.123:8086/v1/flight/process-flight-search';
	private $flight_book = 'http://139.162.210.123:8086/v1/flight/create-affiliate-booking';


	public function __construct(){

	}

    public function fetchAirport(Request $request){
        $query = $request->get('query');
		$response = req::get('http://api.travelden.com:9000/flight/airports?city='.$query, 
			array(
				'X-Api-Key'=>'d79fe700-21e9-462b-b8c3-df7e5b7c68a5',
    			'X-Auth-Token'=> 'tok-hkft25smd'
    		)
		);
		$json_response = json_decode($response->raw_body);	
		$output = '<ul class="dropdown-menu show flight-search " style="top:auto; 
		left:auto; max-height:300px; overflow:auto; list-style:none; padding:0;" >';
		foreach ($json_response as $key => $value) {
 			$output .= '
                <li class="dropdown-item airports" style="cursor:pointer; 
                " role-c="'.$value->code.'" role-an="'.$value->airportName.'">'.$value->countryName.'-'.$value->airportName.'('.$value->code.')</li>
    			';
		}
		$output .='</ul>';
		echo $output;
	}

	/**
	 * 
	 * 
	 */
	public function processRequest(Request $request)
	{
		$tripType = $request->get('tripType');

		if($tripType == 1){
				$msg = [
					'from_owInput.required'=>'A valid origin location is required',
					'to_owInput.required'=>'A valid destination is required'
				];
				$validation = Validator::make($request->all(),[
				'from_owInput'=>'required|string|min:1',
				'to_owInput'=>'required|string|min:1'],$msg
				);
			if($validation->fails()){
				return redirect()->back()->withErrors($validation)->withInput();
			}else{
				return $this->processOneway($request);
			}
		}else if($tripType == 2){
			$msg = [
				'from_rInput.required'=>'A valid origin location is required',
				'to_rInput.required'=>'A valid destination is required'
			];
			$validation = Validator::make($request->all(),[
			'from_rInput'=>'required|string|min:1',
			'to_rInput'=>'required|string|min:1'],$msg
			);
		if($validation->fails()){
			return redirect()->back()->withErrors($validation)->withInput();
		}else{
			return $this->processReturn($request);
		}
	}elseif($tripType ==  3){
			$tripNum = $request->get('tripNum');
			$msg = [];
			$validate_array = [];
			for($i =1; $i <= $tripNum; $i++){
				$msg['to_m'.$i.'Input.required'] = 'A valid destination location is required for trip '.$i;
				$msg['from_m'.$i.'Input.required'] = 'A valid origin location is required for trip '.$i;
				$validate_array['from_m'.$i.'Input'] = 'required|string|min:1';
				$validate_array['to_m'.$i.'Input'] = 'required|string|min:1';
			}
			$validation = Validator::make($request->all(),$validate_array,$msg);
			if($validation->fails()){
				return redirect()->back()->withErrors($validation)->withInput();
			}else{
				return $this->processMulti($request);
			}
	}else{
			//thinking of what to do
	}
}

	/**
	 * Processes one way flight request 
	 *  
	 * @param iluminate/Http/Request 
	 * 
	 * @return response
	 */
	public function processOneway(Request $request)
	{
		$collection = '';
		$this->ch = curl_init();
		curl_setopt_array($this->ch, array(
			CURLOPT_URL => $this->flight_search,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_HTTPHEADER => array(
			  "Content-Type: application/json",
			  "Authorization:eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI3NjkyODc4IiwiaXNzIjoiMTA1LjExMi4yMy4yMCIsImV4cCI6MTU1NjE1NjQzMSwiaWF0IjoxNTU2MTM0ODMxfQ.BxnECT7923KRSHczlq8PbkDNEf_JOeTARS4p0URWedc"
			),
		  ));
			

		  $request_data =["tripType"=>$request->get('tripType'),"ticketClass"=>$request->get('ticketClass'),
					"travellerDetail"=>[
						"adults"=>$request->get('adult'),
					"children"=>$request->get('child'),
					"infants"=>$request->get('infant')],
				  "flightItineraryDetail"=>
					[["originAirportCode"=>$request->get('from_owInput'),
					"destinationAirportCode"=>$request->get('to_owInput'),
					"departureDate"=>$this->dateFormat($request->get('dept_date'))]]];
				  
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($request_data));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		//var_dump($request_data);
		if ($this->err) {
		  echo false;
		} else {
			$result = json_decode($output);
			//var_dump($output);
			//var_dump($request_data);
			if(isset($result->data->airlineItineraries)){
			$data = $result->data->airlineItineraries;
			session(['ticketClass'=>$request->get('ticketClass')]);
			session(['passportRequired'=>$result->data->passportRequired]);
			$collection = collect($data);
			}
		}
	
		return redirect()->route('flights')->with('search_results',$collection)->withInput();
	
	}

	/**
	 * Processes return flight request 
	 *  
	 * @param iluminate/Http/Request 
	 * 
	 * @return response
	 */
	public function processReturn(Request $request)
	{
		$collection = '';
		$this->ch = curl_init();
		curl_setopt_array($this->ch, array(
			CURLOPT_URL => $this->flight_search,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_HTTPHEADER => array(
			  "Content-Type: application/json",
			  "Authorization:eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI3NjkyODc4IiwiaXNzIjoiMTA1LjExMi4yMy4yMCIsImV4cCI6MTU1NjE1NjQzMSwiaWF0IjoxNTU2MTM0ODMxfQ.BxnECT7923KRSHczlq8PbkDNEf_JOeTARS4p0URWedc"
			),
		  ));

		  $request_data =["tripType"=>$request->get('tripType'),"ticketClass"=>$request->get('ticketClass'),
					"travellerDetail"=>[
						"adults"=>$request->get('adult'),
					"children"=>$request->get('child'),
					"infants"=>$request->get('infant')],
				  "flightItineraryDetail"=>
					[
						["originAirportCode"=>$request->get('from_rInput'),
					"destinationAirportCode"=>$request->get('to_rInput'),
					"departureDate"=>$this->dateFormat($request->get('dept_date'))],
					["originAirportCode"=>$request->get('to_rInput'),
					"destinationAirportCode"=>$request->get('from_rInput'),
					"departureDate"=>$this->dateFormat($request->get('arrival_date'))]
					]];
				  
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($request_data));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		if ($this->err) {
		  echo false;
		} else {
			$result = json_decode($output);
			//var_dump($output);
		//	var_dump($request_data);
			if(isset($result->data->airlineItineraries)){
			$data = $result->data->airlineItineraries;
			session(['ticketClass'=>$request->get('ticketClass')]);
			session(['passportRequired'=>$result->data->passportRequired]);
			$collection = collect($data);
			}
		}
	
		return redirect()->route('flights')->with('search_results',$collection)->withInput();
	}

	/**
	 * Processes multi flight request 
	 *  
	 * @param iluminate/Http/Request 
	 * 
	 * @return response
	 */
	public function processMulti(Request $request)
	{
		$collection = '';
		$this->ch = curl_init();
		curl_setopt_array($this->ch, array(
			CURLOPT_URL => $this->flight_search,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_HTTPHEADER => array(
			  "Content-Type: application/json",
			  "Authorization:eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI3NjkyODc4IiwiaXNzIjoiMTA1LjExMi4yMy4yMCIsImV4cCI6MTU1NjE1NjQzMSwiaWF0IjoxNTU2MTM0ODMxfQ.BxnECT7923KRSHczlq8PbkDNEf_JOeTARS4p0URWedc"
			),
		  ));
			$flightDetail = [];
			$i = 1;
			
			for($i=1; $i<=$request->get('tripNum'); $i++){
				$flightDetail[] = ["originAirportCode"=>$request->get('from_m'.$i.'Input'),
				"destinationAirportCode"=>$request->get('to_m'.$i.'Input'),
				"departureDate"=>$request->get('dept_date'.$i)];
			}
		  $request_data =["tripType"=>$request->get('tripType'),"ticketClass"=>$request->get('ticketClass'),
					"travellerDetail"=>[
						"adults"=>$request->get('adult'),
					"children"=>$request->get('child'),
					"infants"=>$request->get('infant')],
				  "flightItineraryDetail"=>
							$flightDetail
				];
				  
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($request_data));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		//var_dump($output);
		//var_dump(json_encode($request_data));
		if ($this->err) {
		  echo false;
		} else {
			$result = json_decode($output);
			//var_dump($output);
		//var_dump(json_encode($request_data));
			if(isset($result->data->airlineItineraries)){
			$data = $result->data->airlineItineraries;
		
			session(['passportRequired'=>$result->data->passportRequired]);
			session(['ticketClass'=>$request->get('ticketClass')]);
			$collection = collect($data);
			}
		}
	
		return redirect()->route('flights')->with('search_results',$collection)->withInput();
	}
	

	public function getBookingForm(Request $request)
	{
		$pricedItineraries = session('pricedItineraryArray');
		$position = $request->get('pricedItineraryPosition');
		if (isset($position)) {
			$selPricedItinerary = $pricedItineraries[$position];
			$airlineName = $request->get('airlineName');
			session(['selPricedItinerary'=>$selPricedItinerary]);
			session(['airlineName'=>$airlineName]);
		}else {
			$selPricedItinerary = session('selPricedItinerary');
			$airlineName = 	session('airlineName');
		}
		
		$passportRequired = session('passportRequired');
		$ticketClass = session('ticketClass');
		
		return view('complete-flight')->with(compact('selPricedItinerary','passportRequired','ticketClass','airlineName'));
		
	}

	public function completeBooking(Request $request){
		$numberOfTraveller = $request->get('numberOfTraveller');
		$passportRequired = session('passportRequired');
		$msg = [];
		$validate_array = [];

		$validate_array['contactTitle'] = 'required|string|min:1';
		$validate_array['contactLastName'] = 'required|string|min:1';
		$validate_array['contactFirstName'] = 'required|string|min:1';
		$validate_array['contactEmail'] = 'required|string|min:1';
		$validate_array['contactPhoneNumber'] = 'required|string|min:1';
		$validate_array['contactDateOfBirth'] = 'required|string|min:1';
		$validate_array['contactAddress'] = 'required|string|min:1';
		$validate_array['contactCity'] = 'required|string|min:1';
		$validate_array['contactCountryCode'] = 'required|string|min:1';

		$msg['contactTitle.required'] = 'Contact title is required';
		$msg['contactLastName.required'] = 'Contact last name is required';
		$msg['contactFirstName.required.required'] = 'Contact first name is required';
		$msg['contactEmail.required'] = 'Contact email is required';
		$msg['contactPhoneNumber.required'] = 'Contact phone number is required';
		$msg['contactDateOfBirth.required'] = 'Contact date of birth is required';
		$msg['contactAddress.required'] = 'Contact address is required';
		$msg['contactCity.required'] = 'Contact city is required';
		$msg['contactCountryCode.required'] = 'Contact country code is required';

		for($i = 1; $i<=$numberOfTraveller; $i++){
			$msg['title'.$i.'.required'] = 'traveller '.$i.' title is required';
			$msg['firstName'.$i.'.required'] = 'traveller '.$i.'first name is required';
			$msg['lastName'.$i.'.required'] = 'traveller '.$i.' last nameis required';
			$msg['dateOfBirth'.$i.'.required'] = 'traveller '.$i.' date of birth is required';
			$msg['ageGroup'.$i.'.required'] = 'traveller '.$i.' age group is required';

			$validate_array['title'.$i.''] = 'required|string|min:1';
			$validate_array['firstName'.$i] = 'required|string|min:1';
			$validate_array['lastName'.$i] = 'required|string|min:1';
			$validate_array['dateOfBirth'.$i] = 'required|string|min:1';
			$validate_array['ageGroup'.$i] = 'required|string|min:1';

			if($passportRequired){
				$validate_array['passportNumber'.$i] = 'required|string|min:1';
				$validate_array['passportExpiryDate'.$i] = 'required|string|min:1';
				$validate_array['passportIssuingCountryCode'.$i] = 'required|string|min:1';

				$msg['passportNumber'.$i.'.required'] = 'traveller '.$i.' passport number is required';
				$msg['passportExpiryDate'.$i.'.required'] = 'traveller '.$i.' passport number is required';
				$msg['passportIssuingCountryCode'.$i.'.required'] = 'traveller '.$i.' passport issuing country is required';
			}
			
		}

		$validate = Validator::make($request->all(),$validate_array, $msg);

		if ($validate->fails()){
			return redirect()->back()->withErrors($validate)->withInput();
		}
		return $this->submitBookingRequest($request);
		
	}

	/**
	 * 
	 * 
	 */
	public function submitBookingRequest(Request $request)
	{
		$output = [];
		$selPricedItinerary = session('selPricedItinerary');
		$passportRequired = session('passportRequired');
		  $this->ch = curl_init();
		  curl_setopt_array($this->ch, array(
			CURLOPT_URL => $this->flight_book,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_HTTPHEADER => array(
			  "Content-Type: application/json",
			  "Authorization:eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI3NjkyODc4IiwiaXNzIjoiMTA1LjExMi4yMy4yMCIsImV4cCI6MTU1NjE1NjQzMSwiaWF0IjoxNTU2MTM0ODMxfQ.BxnECT7923KRSHczlq8PbkDNEf_JOeTARS4p0URWedc"
			),
			));
			
			$flightDetail = [];
			for($i=1; $i<=$request->get('numberOfTraveller'); $i++){
				$flightDetail[] = ["originAirportCode"=>$request->get('from_m'.$i.'Input'),
				"destinationAirportCode"=>$request->get('to_m'.$i.'Input'),
				"departureDate"=>$request->get('dept_date'.$i)];
			}
			$contactInformation = [
														"title"=>$request->get('contactTitle'),
														"firstName"=>$request->get('contactFirstName'),
														"lastName"=>$request->get('contactLastName'),
														"dateOfBirth"=>$this->dateFormat($request->get('contactDateOfBirth')),
														"email"=>$request->get('contactEmail'),
														"phoneNumber"=>$request->get('contactPhoneNumber'),
														"address"=>$request->get('contactAddress'),
														"city"=>$request->get('contactCity'),
														"countryCode"=>$request->get('contactCountryCode')	
														];
			
			$travellers = [];
			if (!$passportRequired){
				for ($i = 1; $i <= $request->get('numberOfTraveller'); $i++ ){
					$travellers[] = [
													"firstName"=>$request->get('firstName'.$i),
													"lastName"=>$request->get('lastName'.$i),
													"dateOfBirth"=>$this->dateFormat($request->get('dateOfBirth'.$i)),
													"title"=>$request->get('title'.$i),
													"ageGroup"=>$request->get('ageGroup'.$i)
													];
				}
			} else{
				for ($i = 1; $i <= $request->get('numberOfTraveller'); $i++ ){
				$travellers[] = [
												"firstName"=>$request->get('firstName'.$i),
												"lastName"=>$request->get('lastName'.$i),
												"dateOfBirth"=>$this->dateFormat($request->get('dateOfBirth'.$i)),
												"title"=>$request->get('title'.$i),
												"ageGroup"=>$request->get('ageGroup'.$i),
												"passportNumber"=>$request->get('passportNumber'.$i),
												"passportIssuingCountryCode"=>$request->get('passportIssuingCountryCode'.$i),
												"passportExpiryDate"=>$this->dateFormat($request->get('passportExpiryDate'.$i))
												];
											}
			}

		  $request_data =[
										"pricedItinerary"=>$selPricedItinerary,
										"contactInformation"=>$contactInformation,
										"travellers"=>$travellers
										];
				  
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($request_data));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		var_dump($output);
//		echo json_encode($request_data);
		if ($this->err) {
			echo json_encode(['data'=>['successful'=>false]]);
		} else {
			$result = json_decode($output);
			$success = $result->data->successful??'false';
			if($success == "true"){
				$flight = new Flight();
				$flight->bookingNumber = $result->data->bookingNumber;
				$flight->referenceNumber = $result->data->referenceNumber;
				$flight->ticketLimitDate = $result->data->ticketLimitDate;
				$flight->email = $request->get('contactEmail');
				$flight->firstName = $request->get('contactFirstName');
				$flight->lastName = $request->get('contactLastName');
				$flight->phoneNumber = $request->get('contactPhoneNumber');
				$flight->flightDetails = json_encode($request_data);


				
			// 	$email = $request->get('contactEmail');
			// 	Mail::send('emails.reserve', ['flight'=>$flight], function ($message) use ($email){
			// 		$message->from('reservations@awaflights.com', 'Awaflights');
			// 		$message->to($email)->cc('a.johnson@awaflights.com');
			// 		$message->subject('Flight Reservation info');
			// });
					$flight->save();
					session(['flight'=>$flight]);
					return redirect('/checkout')->with(compact('flight'));
			}else{
				return redirect()->back()->with('data', json_decode($output))->withInput();
				//var_dump(json_decode($output));
			}
		}
	}

	public function savePayment()
	{

	}

	/**
	 * 
	 * This function formats date 
	 * to dd/MM/yyyy format
	 */
	public function dateFormat($inputDate)
	{
		$date = new \DateTime($inputDate);
		return $date->format('d/m/Y');

	}
}


