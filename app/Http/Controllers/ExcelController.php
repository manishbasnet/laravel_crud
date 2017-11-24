<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\model\membersmodel;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExcelController extends Controller
{
    //

    public function ExportClients()
    {
        $member = membersmodel::all();
    	
        Excel::create('clients',function($excel){

            $excel->sheet('clients',function($sheet){
            $sheet->loadView('home\Exportclients');

            });

        })->export('xlsx');

        return view('home.ExportClients')->with('member',$member); 
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





    
    public function upload()
    {

        return view('home\upload');
    }

    public function ImportClients()
    {
        $file = Input::file('file');
        $file_name = $file->getClientOriginalName();
        $file->move('files',$file_name);
        $results = Excel::load('files/'.$file_name,function($reader)
        {
            $reader->all();


        })->get();

        return view('home\clients',['clients'=>$results]);
    }

}
