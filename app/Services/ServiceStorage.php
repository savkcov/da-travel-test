<?php
namespace App\Services;
use Illuminate\Support\Facades\Storage;

class ServiceStorage{
	
	public $disk='local';
	public $path='public';
	
	
	public function getDirInfo(){
		
		$obgects=array_merge(Storage::disk($this->disk)->directories($this->path), 
		Storage::disk($this->disk)->files($this->path));
		
		$contents_directory=[];
		
		foreach($obgects as $obj){
			
			if(Storage::disk($this->disk)->directoryExists($obj) && !Storage::disk($this->disk)->fileExists($obj)) {
				$type='dir';
			} elseif(!Storage::disk($this->disk)->directoryExists($obj) && Storage::disk($this->disk)->fileExists($obj)) {
				$type='file';
			} else {
				$type='uncnown';;
			}
			$obj_ex=explode('/', $obj);
			$key_last=array_key_last($obj_ex);
			$contents_directory[]=[
				'name'=>$obj_ex[$key_last],
				'type'=>$type,
				'url'=>$obj
			];
			
		}

		return $contents_directory;
	}
	
	
}