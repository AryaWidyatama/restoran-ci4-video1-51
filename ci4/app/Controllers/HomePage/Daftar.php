<?php namespace App\Controllers\HomePage;
use App\Models\HomePelanggan_M;

use App\Controllers\BaseController;

class Daftar extends BaseController
{

    
    
    public function index()
    {
        $pager = \Config\Services::pager();
		$model = new HomePelanggan_M();
		
		$data = [
			'judul' => 'DATA USER',
            
			
            'pager' => $model->pager
		];

		return view('template/daftar',$data);
    }

    public function create()
    {
        $data = [
            'email' => $_POST['email'],
            'password' =>password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        return view("pelanggan/insert",$data);
    }

    public function insert()
    {
      

      

        if (isset($_POST['password'])) {
            $data = [
                'pelanggan' => $_POST['pelanggan'],
                'alamat' => $_POST['alamat'],
                'telp' => $_POST['telp'],
                'email' => $_POST['email'],
                'password' =>password_hash($_POST['password'], PASSWORD_DEFAULT),
                'aktif' => 1
               
               
            ];

          
            $model = new HomePelanggan_M();

            if ($model-> insert($data)===false) {
                $error = $model->errors();
                session()->setFlashdata('info', $error);
                return redirect()->to(base_url("/home"));
            } else {
                
            return redirect()->to(base_url("/HomePage/login"));
            }
            
          
        }
        }
        

    public function delete($id = null)
	{
		$model = new User_M();
		$model-> delete($id);
		return redirect()->to(base_url("/Admin/user"));

		
    }
    
    public function update($id=null,$isi=1)
    {
        $model = new User_M();

        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }

        $data = [
            'aktif' => $isi
        ];

        $model->update($id,$data);
        return redirect()->to(base_url("/Admin/User"));
        
    }

    public function find($id = null)
	{
		$model = new User_M();
		$user = $model ->find($id);

		$data = [
			'judul' => 'UPDATE DATA',
            'user' => $user,
            'level' => ['Admin', 'Koki', 'Kasir', 'Gudang']
		];
		return view("user/update",$data);
    }
    
    public function ubah()
    {
       $id = $_POST['iduser'];

       $data = [
            'email' => $_POST['email'],
            'level' => $_POST['level'],
       ];

       $model = new User_M();
        $model->update($id,$data);

        return redirect()->to(base_url("/Admin/User"));
    }

}
