<?php
/**
 * RoleController.php
 * Контроллер для управления roles
 */
require_once CORE.'/Request.php';
require_once CORE.'/Controller.php';
require_once MODELS.'/Role.php';


class RoleController extends Controller
{
    /**
     * Главная страница управления roles
     *
     * @return bool
     */
    public function index()
    {
        $roles = Role::all();
        $title = 'Roles List Page ';
        $this->view->render('admin/roles/index', compact('title', 'roles'), 'admin');
    }

    /**
     * Добавление role
     *
     * @return bool
     */
    public function create()
    {
        $title = 'Add New Role';
        $this->view->render('admin/roles/create', compact('title'), 'admin');
    }

    public function store()
    {
        $request = new Request();
        
        (new Role())::insert(["name"=>$request->name]);
        header('Location: /admin/roles');
    }

    public function edit($vars)
    {
        extract($vars);
        $role = (new Role())::getByPrimaryKey($id);
        $title = 'Edit Role';
        $this->view->render('admin/roles/edit', compact('title', 'role'), 'admin');
    }

    public function patch()
    {
        $request = new Request();
        (new Role())::update($request->id, ["name"=>$request->name]);
        header('Location: /admin/roles');
    }

    public function delete($vars)
    {
        extract($vars);
        $title = 'Delete Role ';
        $role = (new Role())::getByPrimaryKey($id);
        $this->view->render('admin/roles/delete', compact('title', 'role'), 'admin');
    }
    public function destroy()
    {
        $request = new Request();
        if (isset($_POST['submit'])) {
            (new Role())::destroy($request->id);
            header('Location: /admin/roles');
        } else {
            header('Location: /admin/roles');
        }
    }  
   
}