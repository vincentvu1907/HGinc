<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Repositories\Authors\AuthorRepositoryInterface;
class AuthorController extends Controller
{
    protected $author;
	public function __construct(AuthorRepositoryInterface $author){
		$this->author = $author;
	}

    public function getAll()
    {
    	return view("author.all",[
            "authors"=>$this->author->paginate(15),
        ]);
    }
    public function getEdit($id)
    {
        return view("author.edit",[
            "author"=>$this->author->find($id),
        ]);
    }

    public function store(AuthorRequest $request)
    {
    	$request->validated();
        $this->author->create($request->all());
        return redirect(route('author.all'));
    	
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "name"=>"required | unique:authors,name,".$id,
        ]);
        $this->author->update($id,$request->all());
        return redirect(route('author.all'));
    }
    public function destroy(Request $request ,$id)
    {
        $this->author->delete($id);
        return redirect(route("author.all"));
    }
}
