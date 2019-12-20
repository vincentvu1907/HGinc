<?php
namespace App\Helpers;
use File;
trait FileAdapter
{
	protected $path;

	public function setPath($path){
		$this->path = $path;
	}
	public function uploadAdapter($file){
		$name = $this->ExistFileName($file);
		if ($name) {
			if (File::move($file,$this->path."/".$name)) {
				return $name;
			}
			return "";
		}
		return "";
	}
	public function ExistFileName($file){
		$name = $this->getName($file);
		if (file_exists($this->path."/".$name)) {
			$name = str_random(12).$name;
			return $name;
		}
		return $name;
	}
	public function getName($file){
		return $file->getClientOriginalName();
	}
	public function deleteFile($name){
		if (file_exists($this->path."/".$name)) {
			File::delete($this->path."/".$name);
			return true;
		}
		return false;
	}
}