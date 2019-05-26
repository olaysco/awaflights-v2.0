<?php

namespace App\Http\Controllers;

use App\Flight;
use Unirest\Request as req;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	//
	private $ch;
	private $cancelBookingUrl = 'http://139.162.210.123:8086/v1/flight/cancel-reservation';
	private $ticketIssueUrl = 'http://139.162.210.123:8086/v1/affiliate/flight-ticket-issue-request';
	private $rsvStatusUrl = 'http://139.162.210.123:8086/v1/booking/get-flight-reservation-status';
	
	public function __construct()
	{

	}

	public function index()
	{
		$flights = Flight::all();
		return view('admin.summary', compact('flights'));
	}

	public function getFlightDetail(Flight $flight)
	{
		$flights = Flight::all();
		return view('admin.detail', ['flight'=>$flight,'flights'=>$flights]);
	}

	public function getFlightDetails()
	{
		$flights = Flight::all();
		return view('admin.detail', compact('flights'));
	}

	public function cancelBooking(Flight $flight)
	{
		$this->initCURL($this->cancelBookingUrl);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode(["bookingNumber"=>$flight->bookingNumber]));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		if ($this->err) {
			return redirect()->action('AdminController@getFlightDetail',$flight->id)
			 ->with(['errors' => 'An error occured while processing your request']);
		}else{
			$result = json_decode($output);
			$success = $result->data->successful??'false';
			if($success){
				$flight->status = 'cancelled';
				$flight->save();
				return redirect()->action('AdminController@getFlightDetail',$flight->id) 
				->with(['success' => 'Reservation cancelled successfully']);
			}
			return redirect()->action('AdminController@getFlightDetail', $flight->id) 
			->with(['errors' => 'An error occured while processing your request',
					'msg'=>$result->data->message]);
		}
	}

	public function issueTicketForm()
	{
		$flights = Flight::all();
		return \view('admin.issue',compact('flights'));
	}

	/**
	 * 
	 * 
	 */
	public function issueTicket(Request $request)
	{
		$flight = Flight::find($request->get('bookingId'));
		$hash = sha1($request->get('walletPasscode').'+2398743D786701FFBD1D6F1114F032F3');
		$this->initCURL($this->ticketIssueUrl);
		$request = [
			"bookingNumber"=>$flight->bookingNumber,
			"walletPasscode"=>$request->get('walletPasscode'),
			"hash"=>$hash
		];
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($request));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		if ($this->err) {
			return redirect()->action('AdminController@issueTicketForm')
			->with(['errorMsg'=>'An error occured while processing your request']);
		}else{
			$result = json_decode($output);
			if($result->status == -1){
				return redirect()->action('AdminController@issueTicketForm')
				->with(['errorMsg'=>$result->message]);
			}else{
				$flight->status = $result->data->bookingStatus;
				return redirect()->action('AdminController@issueTicketForm')
				->with(['message'=>$result->data->message,
						'bookingStatus'=>$result->data->bookingStatus,
						'success'=>$result->data->success
					]);
			}
		}

	}

	/**
	 * 
	 * 
	 */
	public function checkReservationForm()
	{
		$flights = Flight::all();
		return \view('admin.reservation',compact('flights'));		
	}

	public function checkReservation(Request $request)
	{
		$flight = Flight::find($request->get('bookingId'));
		$this->initCURL($this->rsvStatusUrl);
		$request = [
			"bookingNumber"=>$flight->bookingNumber
		];
		curl_setopt($this->ch, CURLOPT_POSTFIELDS,json_encode($request));
		curl_setopt($this->ch, CURLOPT_ENCODING,  '');
		$output = curl_exec($this->ch);
		$this->err = curl_error($this->ch);
		if ($this->err) {	
			return redirect()->action('AdminController@checkReservationForm')
			->with(['errorMsg'=>'An error occured while processing your request']);
		}else{
			$result = json_decode($output);
			return redirect()->action('AdminController@checkReservationForm')
			->with(['bookingStatus'=>$result->data->bookingStatus,
					'bookingNumber'=> $result->data->bookingNumber,
					'ticketDownloadLink'=>$result->data->ticketDownloadLink,
					'flightId' => $flight->id
					]);
		}
	}

	public function saveFlightStatus(Request $request)
	{
		$flightStatus = $request->get('flightStatus');
		$flightId = $request->get('flightId');
		$flight = Flight::find($flightId);
		$flight->status = $flightStatus;
		$flight->save();
		return redirect()->action('AdminController@checkReservationForm')
			->with([
					'message'=>'the flight with booking number '.$flight->bookingNumber.' has been updated to '.$flight->status,
					'success'=>true]);
	}

	/**
	 * initializes new CURL object 
	 * for REST 
	 * 
	 * @param string $url
	 */
	public function initCURL($url)
	{
		$this->ch = curl_init();
		curl_setopt_array($this->ch, array(
			CURLOPT_URL => $url,
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
	}
}
