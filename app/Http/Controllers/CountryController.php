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

    

}
