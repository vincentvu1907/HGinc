<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Repositories\Tags\TagRepositoryInterface;
class TagController extends Controller
{
    protected $tag;
	public function __construct(TagRepositoryInterface $tag){
		$this->tag = $tag;
	}

    public function getAll()
    {
    	return view("tag.all",[
            "tags"=>$this->tag->paginate(15),
        ]);
    }
    public function getEdit($id)
    {
        return view("tag.edit",[
            "tag"=>$this->tag->find($id),
        ]);
    }

    public function store(TagRequest $request)
    {
    	$request->validated();
        $this->tag->create($request->all());
        return redirect(route('tag.all'));
    	
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "name"=>"required | unique:tags,name,".$id,
        ]);
        $this->tag->update($id,$request->all());
        return redirect(route('tag.all'));
    }
    public function destroy(Request $request ,$id)
    {
        $this->tag->delete($id);
        return redirect(route("tag.all"));
    }

    public function getSuggestTag(Request $request)
    {
        $suggest = $request->tag;
        $data = $this->tag->where('name','LIKE',"%".$suggest."%");
        return response()->json(["tag"=>$data]);
    }
}
