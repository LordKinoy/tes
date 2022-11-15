<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller
{

    protected $username;
    protected $id_user;
    protected $password;

    public function index(){
        // Masuk
        return view("login/login");
    }

    public function processlogin(Request $request)
    {
        $this->username = $request->username;
        $this->id_user = $request->id_user;
        $this->password = $request->password;

        return view('gudang/index', [
            "username" => $this->username
        ]);
    }
}



?>