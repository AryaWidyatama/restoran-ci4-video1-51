<?php 


namespace App\Models;
use CodeIgniter\Model;

class UserP_M extends Model
{
    protected $table = 'tblpelanggan';
    protected $allowedFields = ['pelanggan','alamat', 'telp', 'email', 'password', 'aktif'];
    protected $primaryKey = 'idpelanggan';

    protected $validationRules    = [
        'user'     => 'alpha_numeric_space|min_length[3]|is_unique[tblpelanggan.pelanggan]',
        'email'     => 'valid_email'
    ];
    protected $validationMessages = [
        'user'        => [
            'alpha_numeric_space' => 'Tidak boleh menggunakan simbol!',
            'min_length' => 'Min 3 huruf!',
            'is_unique' => 'Ada user yang sama!'
        ],
        'email'        => [
            'valid_email' => 'Email Salah !',
            
           
        ]
    ];
   


}


?>