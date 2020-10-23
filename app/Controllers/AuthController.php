<?php
/**
 * AuthController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';
require_once CORE.'/Controller.php';

class AuthController extends Controller
{
    private $logged_in = false;
    private $email;
    private $user_id;

    private $costs = [
        'cost' => 12,
    ];
    
    // array to hold all of the errors 
    private $error = NULL;
    private $message = NULL;

    //The user's userinfo in an array
	public $user = NULL;
   
    //a string holding the cookie prefix
	private $cookie_prefix = '';
	    
    public function __construct()
	{
        parent::__construct();
        $session_id = Session::init();
		
        if($userId=Session::get('userId')){
            $this->user = User::getByPrimaryKey($userId);
            if( $this->user != NULL )
                $this->logged_in = true;
                $this->user_id = $userId;
		}
		
		// session failed, try cookies
		if($this->logged_in === false && isset($_COOKIE[$this->cookie_prefix.'ID'])){
			$id = intval($_COOKIE[$this->cookie_prefix.'ID']);
			$email = strval($_COOKIE[ $this->cookie_prefix.'UserEmail']);
							
			if($id && $email)
                $this->signin();
		}
	}

    /**
     * страница signup
     *
     * @return bool
     */
    public function signForm()
    {
        $this->view->render('auth/index', [], 'auth');
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

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    function signin()
	{
        if ($this->logged_in === true) {
            header('Location: /profile'); // перенаправляем в личный кабинет
        }
        $request = new Request();
        $userId = (new User())::checkUser($request->email, $request->password);
        if ($userId === false) {
            $this->error = "Пользователя с таким email или паролем не существует";
            Session::set('error', $this->error);
            header('Location: /sign');
        } else {
            $this->user = User::getByPrimaryKey($userId);
            $this->logged_in = true;
            $this->message = "You Are Logged";
            Session::set('success', $this->message);
            Session::set('userId', $this->user->id);
            setcookie($this->cookie_prefix.'Logged', $this->logged_in); 
 
            $remember_me = $request->remember_me ? 1:0;
            if($remember_me && !isset($_COOKIE[$this->cookie_prefix.'ID'])){
                setcookie($this->cookie_prefix.'ID', $this->user->id, TIME_NOW + COOKIE_TIMEOUT, ''); 
                setcookie($this->cookie_prefix.'UserEmail', $this->user->email, TIME_NOW + COOKIE_TIMEOUT, ''); 
            }
            header('Location: /profile'); // перенаправляем в личный кабинет
        }
	}
    
    /**
     * Выход из учетной записи
     *
     * @return bool
     */
    function logout()
	{
		//destroy the cookies
        if( isset($_COOKIE[$this->cookie_prefix.'ID']) )
		{	
			//Set cookies to one ago. Browser will auto-purge them.
			setcookie( $this->cookie_prefix.'ID', '', TIME_NOW - 3600 );	//User ID
			setcookie( $this->cookie_prefix.'UserEmail', '', TIME_NOW - 3600 ); //User Email
            setcookie($this->cookie_prefix.'Logged', '', TIME_NOW - 3600); 
		}
        Session::destroy('userId');
        $this->logged_in = FALSE;
        setcookie($this->cookie_prefix.'Logged', $this->logged_in, TIME_NOW - 3600); 
		Helper::redirect('/');
    }
}