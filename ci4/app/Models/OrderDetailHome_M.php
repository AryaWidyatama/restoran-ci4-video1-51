<?php 


namespace App\Models;
use CodeIgniter\Model;

class OrderDetailHome_M extends Model
{
    protected $table = 'tblorderdetail';
    
    protected $allowedFields = ['idorder', 'idmenu', 'jumlah', 'hargajual'];
  


}

?>