<?php
/**
 * RegisterController.php
 * Контроллер для authetication users
 */
require_once MODELS.'/User.php';
require_once CORE.'/Session.php';
require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';

class Auth extends Controller
{
    protected $logged_in = false;
    protected $user_id = NULL;
    
    // array to hold all of the errors 
    protected $error = NULL;
    protected $message = NULL;

    //The user's userinfo in an array
	public $user = NULL;
	    
    public function __construct()
	{
        parent::__construct();
        Session::init();
		
        if($userId=Session::get('userId')){
            $this->user = User::getByPrimaryKey($userId);
            if( $this->user != NULL ) {
                $this->logged_in = true;
                $this->user_id = $userId;
            }
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
}