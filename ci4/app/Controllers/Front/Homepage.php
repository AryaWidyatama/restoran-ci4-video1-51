<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\MenuP_M;
use App\Models\ kategori_M;

class Homepage extends BaseController
{
    
	public function index()
	{
        
		$pager = \Config\Services::pager();
		$model = new MenuP_M();
		
		$data = [
			'judul' => 'DATA MENU',
		
			'menu' => $model->paginate(6,'page'),
            'pager' => $model->pager
		];

		return view("menup/select",$data);
	
	}

	public function read($id = null)
	{
		$pager = \Config\Services::pager();
        if (isset($id)) {
			$model_menu = new MenuP_M();
            $model = new kategori_M();
            $jumlah = $model_menu->where('idkategori', $id)->findAll();
            $count = count($jumlah);

            $tampil = 3;
            $mulai = 0;

            if (isset($_GET['page'])) {
               $page = $_GET['page'];

               $mulai = ($tampil * $page) - $tampil;
            }

           

            $menu = $model_menu->where('idkategori', $id)->findAll($tampil, $mulai);




            $data = [
                'judul' => 'DATA PENCARIAN KATEGORI MENU : ',
                'id' => $id,
                 'kategori' => $model->findALL(),
                 
                'menu' => $menu,
                'pager' => $pager,
                'tampil' => $tampil,
                'total' => $count
            ];
    
            return view("menup/cari",$data);
        }
    }
    
    

	


	//--------------------------------------------------------------------

}
