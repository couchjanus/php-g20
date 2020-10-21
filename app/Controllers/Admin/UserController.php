<?php
/**
 * UserController.php
 * Контроллер для управления users
 */
require_once CORE.'/Controller.php';

require_once MODELS.'/User.php';
require_once MODELS.'/Role.php';
require_once CORE.'/Request.php';

class UserController extends Controller
{
    private $costs = [
        'cost' => 12,
    ];

    /**
     * Главная страница управления users
     *
     * @return bool
     */
    public function index()
    {
        $users = User::all();
        $title = 'User List Page';
        $this->view->render('admin/users/index', compact('users', 'title'), 'admin');
    }

    /**
     * Добавление user
     *
     * @return bool
     */

    public function create()
    {
        $title = 'Create User';
        $roles = Role::all();
        $this->view->render('admin/users/create', compact('title', 'roles'), 'admin');
    }

    public function store()
    {
        $request = new Request();
        $hash = password_hash($request->password, PASSWORD_BCRYPT, $this->costs);
        (new User())::insert(["name"=>$request->name, 'password'=>$hash,'email'=>$request->email, 'role_id'=>$request->role_id]);
        header('Location: /admin/users');
    }

    public function edit($vars)
    {
        extract($vars);
        $user = (new User())::getByPrimaryKey($id);
        $roles = Role::all();
        $title = 'Edit User';
        $this->view->render('admin/users/edit', compact('title', 'user', 'roles'), 'admin');
    }

    public function patch()
    {
        $request = new Request();
        $hash = password_hash($request->password, PASSWORD_BCRYPT, $this->costs);
        $status = $request->status ? 1:0;
        (new User())::update($request->id, ["name"=>$request->name, "email"=>$request->email, "status"=>$status, "password"=>$hash, "role_id"=>$request->role_id]);
        header('Location: /admin/users');
    }

    public function delete($vars)
    {
        extract($vars);
        $title = 'Delete User';
        $user = (new User())::getByPrimaryKey($id);
        $this->view->render('admin/users/delete', compact('title', 'user'), 'admin');
    }
    public function destroy()
    {
        $request = new Request();
        if (isset($_POST['submit'])) {
            (new User())::destroy($request->id);
            header('Location: /admin/users');
        } else {
            header('Location: /admin/users');
        }
    }  
}