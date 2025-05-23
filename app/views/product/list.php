<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
  <h1 class="mb-4">Danh sách sản phẩm</h1>
  <a href="/wenbanhang/Product/add" class="btn btn-success mb-3">Thêm sản phẩm mới</a>

  <?php if (!empty($products)): ?>
    <ul class="list-group">
      <?php foreach ($products as $product): ?>
        <li class="list-group-item">
          <h4>
            <a href="/wenbanhang/Product/show/<?php echo $product->id; ?>">
              <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
            </a>
          </h4>

          <p><?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?></p>
          <p><strong>Giá:</strong> <?php echo number_format($product->price, 0, ',', '.'); ?>₫</p>
          <p><strong>Danh mục:</strong> <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?></p>

          <a href="/wenbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning btn-sm me-2">Sửa</a>
          <a href="/wenbanhang/Product/delete/<?php echo $product->id; ?>" 
             class="btn btn-danger btn-sm"
             onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
            Xóa
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <div class="alert alert-info">Chưa có sản phẩm nào được thêm.</div>
  <?php endif; ?>
</div>

<?php include 'app/views/shares/footer.php'; ?>
