<?php  
namespace App\Repositories\Specials;

use App\Repositories\Specials\SpecialRepositoryInterface;
use App\Repositories\BaseRepository;
/**
 * 
 */
class SpecialRepository extends BaseRepository implements SpecialRepositoryInterface
{
	public function getModel()
	{
		return \App\Special::class;
	}
}