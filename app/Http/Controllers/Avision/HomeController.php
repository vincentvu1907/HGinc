<?php

namespace App\Http\Controllers\Avision;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Authors\AuthorRepositoryInterface;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Tags\TagRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Http\Resources\PostStickyResource;
class HomeController extends Controller
{
	protected $author,$post,$tag,$category;
    public function __construct(
    	AuthorRepositoryInterface $author,
    	PostRepositoryInterface $post,
    	TagRepositoryInterface $tag,
    	CategoryRepositoryInterface $category
    )
    {
    	$this->post = $post;
    	$this->author = $author;
    	$this->tag = $tag;
    	$this->category = $category;
    }
   public function getStickyHeader()
   {
   		// return abort(500);
   		return response()->json([
        "post"=>$this->post->getPostSticky(),
        "products"=>$this->post->getPostSticky()->products,
      ]);
   }

}
