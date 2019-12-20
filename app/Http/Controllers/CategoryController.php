<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Categories\CategoryRepositoryInterface;

class CategoryController extends Controller
{
	protected $category;
	public function __construct(CategoryRepositoryInterface $category){
		$this->category = $category;
	}

    public function getAll()
    {
    	return view("category.all",[
            "categories"=>$this->category->paginate(15),
            "category_all_name"=>$this->category->select(["id","name"]),
        ]);
    }
    public function getEdit($id)
    {
        return view("category.edit",[
            "category"=>$this->category->find($id),
            "category_all_name"=>$this->category->where("id","<",6),
        ]);
    }

    public function store(CategoryRequest $request)
    {
    	$request->validated();
        $this->category->create($request->all());
        return redirect(route('category.all'));
    	
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "name"=>"required | unique:categories,name,".$id,
            "url"=>"required | unique:categories,url,".$id,
        ]);
        $this->category->update($id,$request->all());
        return redirect(route('category.all'));
    }
    public function destroy(Request $request ,$id)
    {
        $this->category->delete($id);
        return redirect(route("category.all"));
    }
    public function action(Request $request)
   {
        $request->validate([
            "action"=>"required"
        ]);
        $ids = $request->choose_cate;
        switch ($request->action) {
            case 'unsticky':

                foreach ($ids as $id) {
                    $this->category->find($id)->update([
                        "sticky"=>"0"
                    ]);
                }
                break;
            case 'sticky':
                foreach ($ids as $id) {
                    $this->category->find($id)->update([
                        "sticky"=>"1"
                    ]);
                }
                break;
        }
        return redirect(route("category.all"));
    }
}
