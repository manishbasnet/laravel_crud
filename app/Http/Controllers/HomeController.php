<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

use Illuminate\Support\Facades\Input;

use App\Http\Requests;
use App\model\membersmodel;
use App\Http\Controllers\DB;





use App\Http\Controllers\Controller;

class HomeController extends Controller
{



	public function ExportClients()
    {
		$member = new membersmodel();





        Excel::create('clients',function($excel){

            $excel->sheet('clients',function($sheet){
            $sheet->loadView('home\clients');

            });

		})->export('xlsx');
		return view('home.clients', compact($member));
		return view('home.clients')->with('member',$member); 
    }



	//For Retrieve data
    public function index()
    {
    	$member = membersmodel::all();
    	return view('home.index')->with('member',$member); 
	}
	
	public function read()
    {
    	$member = membersmodel::all();
    	return view('home.read')->with('member',$member); 
    }

    //For Insert Data
    public function insertdata(Request $request)
    {
    	$member = new membersmodel();
    	$member->name = $request->name;
		$member->gender = $request->gender;
		$member->phone = $request->phone;
    	$member->email = $request->email;
		$member->address = $request->address;
		$member->nationality = $request->nationality;
		$member->birth = $request->birth;
		$member->education = $request->education;
		$member->modeofcontact = $request->modeofcontact;
    	$member->save();
    	return response()->json($member);
    }

    //For Update Data
    public function updatedata(Request $request)
    {
    	$member = membersmodel::find($request->id);
    	$member->name = $request->name;
    	$member->age = $request->age;
    	$member->email = $request->email;
    	$member->address = $request->address;
    	$member->save();
    	return response()->json($member);
    }

    //For Delete Data
    public function deletedata(Request $request)
    {
    	membersmodel::where('id',$request->id)->delete();
    	return response()->json();
    }
}
