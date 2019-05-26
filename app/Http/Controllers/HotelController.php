<?php
namespace App\Http\Controllers;

use Validators;
use Illuminate\Http\Request;
use Unirest\Request as req;

class HotelController extends Controller
{

	private $ch;
	private $err;
	private $getHotelLocationUrl = 'http://139.162.210.123:8086/v1/hotel/get-locations';

	public function __construct()
	{

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

	/**
	 * Fetches location of hotel based on
	 * search params
	 * 
	 * @param $request
	 */
	public function fetchHotelLocation(Request $request)
	{
		$term = $request->get('term')['term'];
		$body = ['searchTerm'=>$term, 'maxLimit'=>5];
		var_dump(json_encode($body));
		$response = req::post($this->getHotelLocationUrl,
								array(
									'cache-control' => 'no-cache',
									'Connection' => 'keep-alive',
									'content-length' => '32',
									'accept-encoding' => 'gzip, deflate',
									'cookie' => 'NINJA_SESSION=2ad1f99df648d4d4bed4582900de9c6c885f1627-___TS=1557484450581&___ID=3a1bc3d7-3c96-484f-a5af-e0d380d2c30f',
									'Host' => '139.162.210.123:8086',
									'Content-Type' => 'application/json',
									'accept' => 'application/json',
									'Authorization' => 'eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiI3NjkyODc4IiwiaXNzIjoiMTA1LjExMi4yMy4yMCIsImV4cCI6MTU1NjE1NjQzMSwiaWF0IjoxNTU2MTM0ODMxfQ.BxnECT7923KRSHczlq8PbkDNEf_JOeTARS4p0URWedc'
								),json_encode($body)
					);
		
		var_dump($response->raw_body);

	} 

	public function searchHotel(Request $request){
		var_dump($request->all()); 
	}

}

?>
