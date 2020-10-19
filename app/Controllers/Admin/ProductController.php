<?php

require_once CORE.'/Controller.php';
require_once CORE.'/Request.php';
require_once MODELS.'/Category.php';
require_once MODELS.'/Product.php';
require_once MODELS.'/Brand.php';
require_once MODELS.'/Picture.php';

class ProductController extends Controller
{
    /**
     * Просмотр всех товаров
     * @return bool
    */
    public function index()
    {
        $products = Product::all();
        $title = 'Products List Page';
        $this->view->render('admin/products/index', compact('title', 'products'), 'admin');
    }

    private function check_file_array($file) {
        return isset($file['error'])
            && !empty($file['name'])
            && !empty($file['type'])
            && !empty($file['tmp_name'])
            && !empty($file['size']);
    }

    /**
     * Добавление товара
     *
     * @return bool
    */

    public function create()
    {
        $title = 'Add New Product ';
        $categories = Category::all();
        $brands = Brand::all();
        $this->view->render('admin/products/create', compact('title', 'categories', 'brands'), 'admin');
    }

    public function store0()
    {
        $request = new Request();
        $status = $request->status ? 1:0;
        $is_new = $request->is_new ? 1:0;
        (new Product())::insert(["name"=>$request->name, "status"=>$status,
        'price'=>$request->price, 'brand_id'=>$request->brand_id, 'category_id'=>$request->category_id, 'description'=>$request->description, 'is_new'=>$is_new]);
        header('Location: /admin/products');
    }

    public function store()
    {
        $request = new Request();
        $status = $request->status ? 1:0;
        $is_new = $request->is_new ? 1:0;
        (new Product())::insert(["name"=>$request->name, "status"=>$status,
        'price'=>$request->price, 'brand_id'=>$request->brand_id, 'category_id'=>$request->category_id, 'description'=>$request->description, 'is_new'=>$is_new]);

        if (!empty($_FILES['images'])) {
            $files = $_FILES['images'];
            // Директория назначения должна существовать
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR.'assets/images/products';
            // Цикл по всем загруженным файлам
            for ($i = 0; $i < count($files["name"]); $i++) {
                $file["name"] = $files["name"][$i];
                $file["tmp_name"] = $files["tmp_name"][$i];
                $file["size"] = $files["size"][$i];
                $file["type"] = $files["type"][$i];
                $file["error"] = $files["error"][$i];
                // Если нет ошибок

                if($this->check_file_array($file)) {
                    // Проверяем загружен ли файл
                    if(is_uploaded_file($file["tmp_name"])) {
       
                        // Если файл загружен успешно
                        // Генерируем уникальное имя файла

                        // mt_rand — Генерирует случайное значение методом с помощью генератора простых чисел на базе Вихря Мерсенна
                        // uniqid() - Генерирует уникальный идентификатор с префиксом, основанный на текущем времени в микросекундах.
                        // sha1 — Возвращает SHA1-хеш строки, вычисленный по алгоритму US Secure Hash Algorithm 1.

                        $filename = sha1(mt_rand(1, 9999) . $file['name'] . uniqid()) . time();
                        $uploaded = $uploadDir .'/'. $filename;
                        // перемещаем файл из временной директории в конечную
                        move_uploaded_file($file["tmp_name"], $uploaded);
                        // Регистрируем файл в таблице изображений
                        (new Picture())::insert(["filename"=>$filename,         'resource_id'=>(int)Product::lastId(), 'resource'=>Product::getResource()]);
                    } else {
                        throw new Exception('Upload: Can\'t upload file.');
                    }
                }
                else {
                    throw new Exception('Upload: Can\'t upload file.');
                }
            }    
        }
        header('Location: /admin/products');
    }
}