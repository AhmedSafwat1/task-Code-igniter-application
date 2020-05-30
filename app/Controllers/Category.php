<?php namespace App\Controllers;

class Category extends BaseController
{
	public function index()
	{
		$db      = \Config\Database::connect();
		
		$builder = $db->table('categories');
		$builder->select('categories.* , cat2.name as parent_name ');
		$builder->join('categories as cat2', 'cat2.id = categories.parent_id','left');
		$query = $builder->get();
		return view("category/home",[
			"categories" => $query->getResult()
		]);
	}

	public function task(){
		$categoryModel  = new \App\Models\CategoryModel();
		$mainCategories = $categoryModel->where('parent_id', null)
				   ->findAll();

				   
		return view("category/task",[
			"mainCategories" => $mainCategories
		]);
	}

	public function getsubCategory($id){
		$categoryModel  = new \App\Models\CategoryModel();
		$subCategories  = $categoryModel
							->select("id,name")
							->where('parent_id', $id)
							   ->findAll();
	    header('Content-Type: application/json');					   
		echo json_encode($subCategories);
		exit();			   

	}

	//--------------------------------------------------------------------

}
