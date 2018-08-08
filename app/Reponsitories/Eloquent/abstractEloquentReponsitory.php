<?php
namespace App\Reponsitories\Eloquent;
use Illuminate\Http\Request;
use App\Reponsitories\Contracts\ReponsitoryInterface;


abstract class abstractEloquentReponsitory implements ReponsitoryInterface
{
	protected $model;

    public function __construct()
    {
        $this->setModel();
    }

  	//Truyen model thich hop
    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make( $this->getModel() );
            
    }
    public function getAll()
    {	

    	return $this->model->paginate(5);
    }
    public function findID($id=null)
    {
    	return $this->model->where('id',$id)->paginate(10);

    }
    public function delete($id = null)
    {
        return $this->model->destroy($id);

    }
    public function Edit(Request $rq)
    {   
        
        $id_edit=$rq->input('id_text');
        $title_edit=$rq->input('title_area');
        $description_edit=$rq->input('des_area');
        $link_edit=$rq->input('link_area');
        $Edit= $this->model->find($id_edit);
        $Edit->title=$title_edit;
        $Edit->description=$description_edit;
        $Edit->link=$link_edit;
        $Edit->save();
        
    }

}


?>