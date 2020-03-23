<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\CountryModel;

class CountryController extends Controller
{
    public function country(){
	 try{
	     	return response()->json(CountryModel::get(),200);
	    }
		catch(Exception $e) {
			return response()->json($e->getMessage(),204);
		}
    	
    }


    public function countryByID($id){
    	return response()->json(CountryModel::find($id),200);
    }

    public function countrysave(Request $Request){
    	return response()->json(CountryModel::create($Request->all()),201);
    }

    public function  countryUpdate(Request $request,CountryModel $country){
       $country->update($request->all());
       return response()->json($country,200);
    }

    public function countryDelete(Request $request, CountryModel $country){
        $country->delete();
        return response()->json(null,204);
    }

}
