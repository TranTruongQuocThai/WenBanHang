<?php
require_once 'app/config/database.php';
require_once 'app/models/ProductModel.php';
require_once 'app/models/CategoryModel.php';

class ProductController
{
    private $productModel;
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->productModel = new ProductModel($this->db);
    }

    // Danh sách sản phẩm
    public function index()
    {
        $products = $this->productModel->getProducts();
        include 'app/views/product/list.php';
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = $this->productModel->getProductById($id);
        if ($product) {
            include 'app/views/product/show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    // Hiển thị form thêm sản phẩm
    public function add()
    {
        $categories = (new CategoryModel($this->db))->getCategories();
        include 'app/views/product/add.php';
    }

    // Lưu sản phẩm mới
    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            $result = $this->productModel->addProduct($name, $description, $price, $category_id);

            if (is_array($result)) {
                $errors = $result;
                $categories = (new CategoryModel($this->db))->getCategories();
                include 'app/views/product/add.php';
            } else {
                header('Location: /wenbanhang/Product');
                exit;
            }
        }
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = $this->productModel->getProductById($id);
        $categories = (new CategoryModel($this->db))->getCategories();

        if ($product) {
            include 'app/views/product/edit.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    // Cập nhật sản phẩm
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;

            $updated = $this->productModel->updateProduct($id, $name, $description, $price, $category_id);

            if ($updated) {
                header('Location: /wenbanhang/Product');
                exit;
            } else {
                echo "Đã xảy ra lỗi khi lưu sản phẩm.";
            }
        }
    }

    // Xóa sản phẩm
    public function delete($id)
    {
        if ($this->productModel->deleteProduct($id)) {
            header('Location: /wenbanhang/Product');
            exit;
        } else {
            echo "Đã xảy ra lỗi khi xóa sản phẩm.";
        }
    }
}
?>
