<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\FileAdapter;
use App\Http\Requests\PostRequest;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Tags\TagRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Authors\AuthorRepositoryInterface;
use App\Repositories\Specials\SpecialRepositoryInterface;
use App\Repositories\Products\ProductRepositoryInterface;
class PostController extends Controller
{
    use FileAdapter;
    protected $post;
    protected $category;
    protected $tag;
    protected $author;
    protected $special;
    protected $product;
    public function __construct(
        PostRepositoryInterface $post,
        CategoryRepositoryInterface $category,
        TagRepositoryInterface $tag,
        AuthorRepositoryInterface $author,
        SpecialRepositoryInterface $special,
        ProductRepositoryInterface $product
    )
    {
        $this->post = $post;
        $this->category = $category;
        $this->tag = $tag;
        $this->author = $author;
        $this->special = $special;
        $this->product = $product;
        $this->setPath("upload/posts");
    }
    public function getEdit($id)
    {
        $post = $this->post->find($id);
        // dd($post->products);
    	return view("article.edit",[
            "categories"=>$this->category->getAll(),
            "posts"=>$this->post->select(["title","id"]),
            "authors"=>$this->author->getAll(),
            "specials"=>$this->special->getAll(),
            'products'=>$this->product->getAll(),
            "post"=>$post,
            "tags"=>$post->tags,

        ]);
    }
    public function  getAll()
    {
    	return view("article.all",[
            "posts"=>$this->post->paginate(15)
        ]);
    }
    public function  getNew()
    {
    	return view("article.add",[
            "categories"=>$this->category->getAll(),
            "posts"=>$this->post->select(["title","id"]),
            "authors"=>$this->author->getAll(),
            "specials"=>$this->special->getAll(),
            'products'=>$this->product->getAll(),
        ]);
    }
    public function store(PostRequest $request)
    {
        $request->validated();
        $thumbnail = $this->uploadAdapter($request->file('thumbnail'));
        $data = $request->only("title","description","content","url","author_id","status");
        $data["thumbnail"] = $thumbnail;
        $post_current = $this->post->create($data);
        if (isset($request->category_id)) {
            $post_current->categories()->attach($request->category_id);
        }
        $tags = $request->tag;
        $tags_id = array();
        if (is_array($tags) && count($tags)>0) {
            foreach ($tags as $tag) {
                if (!$this->tag->exists($tag)) {
                    $tag_creator = $this->tag->create(["name"=>$tag]);
                    array_push($tags_id,$tag_creator->id);
                }else{
                    array_push($tags_id,$this->tag->searchByName($tag));
                }
            }
        }

        if (isset($request->special_id)) {
            $post_current->specials()->attach($request->special);
        }
        if (isset($request->product_id)) {
            $post_current->products()->attach($request->product_id);
        }
        $post_current->tags()->attach($tags_id);
        return redirect(route('article.all'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "title"=>"required|unique:posts,title,".$id,
            "content"=>"required",
            "url"=>"required|unique:posts,url,".$id,
            "category_id"=>"required",
            "author_id"=>"required"
        ]);
        $post_current = $this->post->find($id);
        $post_current->update($request->only("title","description","content","url","author_id","status","sticky"));
        if (isset($request->thumbnail)&&$request->thumbnail!="") {
            $thumbnail = $this->uploadAdapter($request->file('thumbnail'));
            $this->deleteFile($post_current->thumbnail);
            $post_current->thumbnail = $thumbnail;
            $post_current->save();
        }
        $tags_id = array();
        if (is_array($request->tag) && count($request->tag)>0) {
            foreach ($request->tag as $tag) {
                if (!$this->tag->exists($tag)) {
                    $tag_creator = $this->tag->create(["name"=>$tag]);
                    array_push($tags_id,$tag_creator->id);
                }else{
                    array_push($tags_id,$this->tag->searchByName($tag));
                }
            }
        }
        if (isset($request->special_id)) {
            // dd($request->special);
            $post_current->specials()->sync($request->special_id);
        }
        if (isset($request->product_id)) {
            $post_current->products()->sync($request->product_id);
        }
        if (isset($request->category_id)) {
            $post_current->categories()->sync($request->category_id);
        }
        $post_current->tags()->sync($tags_id);
        return  redirect(route('article.edit',$post_current->id))->with("msg","ok");

    }
   public function destroy(Request $request,$id)
   {
        $post = $this->post->find($id);
        $this->deleteFile($post->thumbnail);
        $post->delete();
        return redirect(route('article.all'));
   }
   public function changeStatus(Request $request ,$id)
   {
        $post = $this->post->find($id);
        if ($post->status=='draft') {
           $post->status = "publish";
        }else{
            $post->status = "draft";
        }
        $post->save();
        return redirect(route('article.all'));
   }
   public function action(Request $request)
   {
        $request->validate([
            "action"=>"required"
        ]);
        $ids = $request->choose_post;
        switch ($request->action) {
            case 'draft':
                foreach ($ids as $id) {
                    $this->post->find($id)->update([
                        "status"=>"draft"
                    ]);
                }
                break;
            case 'publish':
                foreach ($ids as $id) {
                    $this->post->find($id)->update([
                        "status"=>"publish"
                    ]);
                }
                break;
            case 'unsticky':

                foreach ($ids as $id) {
                    $this->post->find($id)->update([
                        "sticky"=>"0"
                    ]);
                }
                break;
            case 'sticky':
                foreach ($ids as $id) {
                    $this->post->find($id)->update([
                        "sticky"=>"1"
                    ]);
                }
                break;
        }
        return redirect(route("article.all"));
   }
}
