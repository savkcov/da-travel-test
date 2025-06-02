<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceStorage as ServiceStorage;

class StorageController extends Controller
{
    
	
	public function index(Request $request, ServiceStorage $storage){

		$path=$request->path;
		
		$storage->disk = 'custom';
		$storage->path = $path;
		
		$dir_objects=$storage->getDirInfo();

		return view('pages.index', ['path'=>$path, 'dir_objects'=>$dir_objects]);
		
	}

}
