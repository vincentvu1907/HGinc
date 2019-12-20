<?php  
namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
	
	
    protected $model;

   
    public function __construct()
    {
        $this->setModel();
    }
  
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
    
    public function find($id)
    {
        $result = $this->model->find($id);

        return $result;
    }
    
    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }
    
    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
    
    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
    public function paginate($total,$orderby="",$crement="DESC")
    {
        if ($orderby=="") {
            return $this->model->paginate($total);
        }else{
            return $this->model->orderBy($orderby,$crement)->paginate($total);
        }
    }
    public function select($param = [])
    {
        return $this->model->select($param)->get();
    }
    public function where($column,$operator,$value)
    {
        return $this->model->where($column,$operator,$value)->get();
    }
}
