<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\model\membersmodel;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;




use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;




    public function ExportClients()
    {

        $member = membersmodel::all();

        Excel::create('clients',function($excel){

            $excel->sheet('clients',function($sheet){
            $sheet->loadView('home\ExportClients');

            });

        })->export('xlsx');
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
