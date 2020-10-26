<?php
/**
 * RegisterController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';
require_once CORE.'/Auth.php';
require_once CORE.'/Request.php';

class RegisterController extends Auth
{
    private $costs = [
        'cost' => 12,
    ];
	    
    public function __construct()
	{
        parent::__construct();
	}

    public function signup()
    {
        $request = new Request();
        $password = $request->password;
        $confirmpassword = $request->confirmpassword;
        
        if (self::is_valid_passwords($password, $confirmpassword)){
            list($name, $domain) = explode('@', $request->email);
            $hash = password_hash($password, PASSWORD_BCRYPT, $this->costs);
            (new User())::insert(["name"=>$name, "email"=>$request->email, "password" => $hash]);
            header('Location: /sign');
        } else {
            $this->error = "Your passwords do not match. Please type carefully.";
            Session::set('error', $this->error);
            header('Location: /sign');
        }
    }

    // method for password verification
    static private function is_valid_passwords($password, $confirmpassword) 
    {
        // Your validation code.
        if ($password != $confirmpassword) {
            return false;
        }
        // passwords match
        return true;
    }
}