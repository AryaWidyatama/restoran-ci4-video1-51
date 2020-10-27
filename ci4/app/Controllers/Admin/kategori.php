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

	public function select()
	{

		$model = new kategori_M();
		$kategori = $model ->findALL();

		$data = [
			'judul' => 'SELECT DATA DARI controller',
			'kategori' => $kategori
		];

		
		return view("kategori/select",$data);
		
	}

	public function selectWhere($id = null)
	{
		echo "<h1>menampilkan data yang dipilih $id</h1>";
	}

	public function formInsert()
	{
		
		return view("kategori/forminsert");
		
	}

	public function formUpdate($id = null)
	{
		echo view("template/header");
		echo view("kategori/update");
		echo view("template/footer");
	}

	public function update($id = null)
	{
		echo "proses update data";
	}

	public function delete($id = null)
	{
		echo "proses delete data";
	}

	

}
