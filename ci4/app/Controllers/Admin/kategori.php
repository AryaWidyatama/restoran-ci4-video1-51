<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\kategori_M;

class kategori extends BaseController
{
	public function index()
	{
		// return view('welcome_message');

		echo "belajar";
	}

	public function read()
	{

		$pager = \Config\Services::pager();
		$model = new kategori_M();
		
		$data = [
			'judul' => 'DATA KATEGORI',
		
			'kategori' => $model->paginate(3,'page'),
            'pager' => $model->pager
		];

		return view("kategori/select",$data);
		
	}

	public function create()
	{
		
		return view("kategori/insert");
		
	}

	public function insert()
	{
	
		$model = new kategori_M();

		if ($model-> insert($_POST)===false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/Admin/kategori/create"));
		} else {
			return redirect()->to(base_url("/Admin/kategori"));
		}
		
		

		
	}

	public function find($id = null)
	{
		$model = new kategori_M();
		$kategori = $model ->find($id);

		$data = [
			'judul' => 'UPDATE DATA ',
			'kategori' => $kategori
		];
		return view("kategori/update",$data);
	}

	public function update()
	{
		
		$model = new kategori_M();
		$id = $_POST['idkategori'];
		

		if ($model->save($_POST)===false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/Admin/kategori/find/$id"));
		} else {
			return redirect()->to(base_url("/Admin/kategori"));
		}
	}

	public function delete($id = null)
	{
		$model = new kategori_M();
		$model-> delete($id);
		return redirect()->to(base_url("/Admin/kategori"));

		
	}

	

}
