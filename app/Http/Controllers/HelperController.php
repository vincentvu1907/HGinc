<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttributePage;
use App\Helpers\FileAdapter;

class HelperController extends Controller
{
    use FileAdapter;
    public function __construct(){
        $this->setPath("upload/homepage");
    }
    public function getMedia()
    {
    	return view("media");
    }
    public function getAttribute()
    {   
        $config = AttributePage::first();
    	return view("config.attribute",[
            "config"=>$config,
            "choose"=>\App\Special::findOrFail($config->special_id),
            "special"=>\App\Special::get(),
        ]);
    }
   
    public function getStatus()
    {
    	
    	return view("config.status");
    }
    public function store(Request $request){
        $request->validate([
            "title"=>"required",
            "quote"=>"required",
            "url"=>"required",
            "description"=>"required","special_id"=>"required"
        ]);
        $config = AttributePage::first();

        if (isset($request->banner)) {
            $banner = $this->uploadAdapter($request->file('banner'));
           
            $this->deleteFile($config->banner);
            $config->banner = $banner;
            $config->save();
        }
        $config->title = $request->title;
        $config->quote = $request->quote;
        $config->url = $request->url;
        $config->description = $request->description;
        $config->save();
        return redirect(route('config.attribute'));
    }
}
