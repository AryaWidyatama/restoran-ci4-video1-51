<?php namespace App\Controllers\HomePage;
use App\Models\HomePelanggan_M;
use App\Controllers\BaseController;

class Login extends BaseController
{
	public function index()
	{
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

           $model = new HomePelanggan_M();
           $pelanggan = $model->where(['email'=>$email])->first();

           if (empty($pelanggan)) {
            $data['info'] = "Email salah";
           } else {
                if (password_verify($password,$pelanggan['password'])) {
                 $this->setSession($pelanggan);
                 return redirect()->to(base_url("/home"));
                } else {
                 $data['info'] = "Password salah";
                }
               
           }
           
       
          
          
        } else {
            # code...
        }
        
		return view('template/loginp',$data);
    }
    
    public function setSession($pelanggan)
    {
      $data = [
        'pelanggan' => $pelanggan['pelanggan'],
        'email' => $pelanggan['email'],
        'idpelanggan' => $pelanggan['idpelanggan'],
        'logIn' => true
      ];

      session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/home'));
    }

	//--------------------------------------------------------------------

}