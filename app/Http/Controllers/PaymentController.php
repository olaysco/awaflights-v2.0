<?php

namespace App\Http\Controllers;

use App\Flight;
use Validator;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
 
	
	public function updatePayment(Request $request)
	{
		$validate = make::Validator($request->all(),[
			'refrenceNumber'=>'required'
		]);
		if($validate->fails()) {
			return response()->json(['status'=>'error'], 200);
		}
		$flight = Flight::where('referenceNumber', $request->input('referenceNumber'))->firstOrFail();
		$flight->paymentDetails = json_encode(['transactionReference'=>$transactionReference,'status'=>'completed']);
		$flight->save();
		return response()->json(['status'=>'success'], 200);
	}
}
