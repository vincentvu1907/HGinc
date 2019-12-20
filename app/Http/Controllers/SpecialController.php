<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Specials\SpecialRepositoryInterface;
use App\Http\Requests\SpecialRequest;
class SpecialController extends Controller
{
    protected $special;
	public function __construct(SpecialRepositoryInterface $special){
		$this->special = $special;
	}

    public function getAll()
    {
    	return view("special.all",[
            "specials"=>$this->special->paginate(15),
        ]);
    }
    public function getEdit($id)
    {
        return view("special.edit",[
            "special"=>$this->special->find($id),
            "special_all_name"=>$this->special->select(["id","name"]),
        ]);
    }

    public function store(SpecialRequest $request)
    {
    	$request->validated();
        $this->special->create($request->all());
        return redirect(route('special.all'));
    	
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "name"=>"required | unique:specials,name,".$id,
            "slug"=>"required | unique:specials,slug,".$id,
        ]);
        $this->special->update($id,$request->all());
        return redirect(route('special.all'));
    }
    public function destroy(Request $request ,$id)
    {
        $this->special->delete($id);
        return redirect(route("special.all"));
    }
}
