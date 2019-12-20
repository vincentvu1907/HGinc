<?php  
namespace App\Repositories\Authors;

use App\Repositories\Authors\AuthorRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * 
 */
class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
	public function getModel()
	{
		return \App\Author::class;
	}
}