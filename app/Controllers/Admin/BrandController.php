<?php
// CategoryController.php
require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Brand.php';

class BrandController extends Controller
{
    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function index()
    {
        $brands = Brand::all();
        $title = 'Brand List Page';
        $this->view->render('admin/brands/index', compact('title', 'brands'), 'admin');
    }

    /**
     * Добавление категории
     *
     * @return bool
     */

    public function create()
    {
        $title = 'Add New Brand ';
        $this->view->render('admin/brands/create', compact('title'), 'admin');
    }

    public function store()
    {
        $request = new Request();
        $status = $request->status ? 1:0;
        (new Brand())::insert(["name"=>$request->name, "description"=>$request->description, 'status'=>$status]);
        $lastId = header('Location: /admin/brands');
    }
}
