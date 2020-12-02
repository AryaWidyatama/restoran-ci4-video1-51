<?php namespace App\Controllers\Front;

use App\Controllers\BaseController;
use App\Models\kategori_M;
use App\Models\Menu_M;
use App\Models\OrderDetail_M;
use App\Models\OrderDetailHome_M;

class Beli extends BaseController
{
	public function index($id = null)
	{
    
        $pager = \Config\Services::pager();
        $model = new kategori_M();
        $model_M = new Menu_M();
        $total = 0;

       
        if (isset($id)) {
            $this->isi($id);
            return redirect()->to(base_url('/Front/beli'));
        }else {
          
            foreach  (session()->get() as $key => $value) {
             
                
             if ($key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan' 
             && $key <> 'email' && $key <>'idpelanggan' && $key <> 'LoggedIn' && $key <>'password' && $key <> 'logIn'){
                 
                 $id = substr($key, 1);
                 $menu[] = $model_M->where('idmenu', $id)->findALL();
                 $jumlah[] = $value;
             }
            }
            
                

                if (!isset($menu)) {
                    $menu = [];
                    $jumlah = [];
                }
                $data = [
                    'judul' => 'Daftar Belanja',
                    'kategori' => $model->findALL(),
                    'menu' => $menu,
                    'jumlah' => $jumlah,
                    'total' => $total,
            
                ];
                return view("home/beli",$data);
            }
        }
          

        

        
         public function isi($id)
         {
           
            if (session()->has('_' . $id)){
                session()->set('_' . $id, session()->get('_' . $id) + 1);
            }else {
                session()->set('_' . $id, 1);
            }
            var_dump($_SESSION);
         }
        
         public function checkout($total = null)
         {
             $db = \Config\Database::connect();
             if(isset($total)){
                 $idorder = $this->idorder();
                 $idpelanggan = session()->get('idpelanggan');
                 $tgl = date('Y-m-d');
                 $sql = "SELECT * FROM tblorder WHERE idorder=$idorder";
                 $result = $db->query($sql);
                 $detail = $result->getResult('array');
                 $count = count($detail);
               
                 if ($count == 0){
                     $this->insertOrder($idorder, $idpelanggan, $tgl, $total);
                     $this->insertDetail($idorder);

                 }else {
                     $this->insertDetail($idorder);
                 }
                

                 $this->kosongkanSession();
              return redirect()->to(base_url('/Front/homepage'));
                }else {
                    $id = $this->idorder() - 1;
                    $model = new kategori_M();
                    $model_OD = new OrderDetail_M();
                    $data = [
                        'judul' => 'Terimakasih Telah Berbelanja',
                        'kategori' => $model->findALL(),
                        'order' => $model_OD->where('idorder', $id)->findALL(),
                        'id' => $id

                    ];
                    return view('home,beli', $data);
                }
         }

         public function kosongkanSession()
         {
            foreach  (session()->get() as $key => $value) {
             
                
                if ($key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan' 
                && $key <> 'email' && $key <>'idpelanggan' && $key <> 'LoggedIn' && $key <>'password' && $key <> 'logIn'){
                   
                  
                    session()->remove($key);
                }
            }
         }

         public function idorder()
         {
            $db =  \Config\Database::connect();
            $sql = "SELECT idorder FROM tblorder ORDER BY idorder DESC";
            $result = $db->query($sql);
            $detail = $result->getResult('array');
            $jumlah = count($detail);
            if ($jumlah == 0){
                $id = 1;
            }else {
                $id = $jumlah + 1;
            }
            return $id;
         }

         public function insertOrder($idorder, $idpelanggan, $tgl, $total)
         {
          $db = $db =  \Config\Database::connect();
          $sql = "INSERT INTO tblorder VALUES ($idorder, $idpelanggan, '$tgl', $total, 0, 0, 0)";
          $db->query($sql);
         }

        

         public function insertDetail($idorder)
         {
            $model = new Menu_M();
            $model_OH = new OrderDetailHome_M();
            foreach (session()->get() as $key => $value){
                if ($key <> '__ci_last_regenerate' && $key <> '_ci_previous_url' && $key <> 'pelanggan' 
                && $key <> 'email' && $key <>'idpelanggan' && $key <> 'LoggedIn' && $key <>'password' && $key <> 'logIn'){
                    
                    $id = substr($key, 1);
                    $row = $model->where('idmenu', $id)->findALL();
                    foreach ($row as $r){
                        $idmenu = $r['idmenu'];
                        $harga = $r['harga'];
                        $data = [
                            'idorder' => $idorder,
                            'idmenu' => $idmenu,
                            'jumlah' => $value,
                            'hargajual' => $harga
                        ];
                        $model_OH->insert($data);
                    }
            }
         }
        }
		
	

	
    
   
    }
