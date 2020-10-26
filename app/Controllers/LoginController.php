<?php
/**
 * LoginController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';
require_once CORE.'/Auth.php';
require_once CORE.'/Request.php';

class LoginController extends Auth
{
    private $email;
    //a string holding the cookie prefix
	private $cookie_prefix = '';
	    
    public function __construct()
	{
        parent::__construct();
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
            Session::set('message', $this->message);
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