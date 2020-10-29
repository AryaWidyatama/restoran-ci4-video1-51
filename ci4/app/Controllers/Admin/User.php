<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class User extends BaseController
{

    protected $session=null;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

	public function index()
	{
		echo "user";
    }
    
    public function create()
    {
        $tbluser = [
            'user'  => 'adi',
            'email' => 'adi1@gmail.com',
            'level' => 'koki'
    ];
    
    $this->session->set($tbluser);
    }

    public function read()
    {
        $session = \Config\Services::session();
       echo $this->session->get('user');
       echo "<br>";
       echo $this->session->get('email');
       echo "<br>";
       echo $this->session->get('level');
    }

    public function delete()
    {
        $this->session->remove('email');
    }

    public function destroy()
    {
        $this->session->destroy();
    }

	

}
