<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-primary text-white text-center">
      <h2 class="mb-0">Chi tiết sản phẩm</h2>
    </div>
    <div class="card-body">
      <?php if ($product): ?>
        <div class="row">
          <!-- Hình ảnh sản phẩm -->
          <div class="col-md-6 d-flex justify-content-center align-items-center mb-4 mb-md-0">
            <?php if ($product->image): ?>
              <img 
                src="/wenbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>"
                class="img-fluid rounded shadow-sm product-image" 
                alt="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" 
                style="max-height: 350px; object-fit: contain;">
            <?php else: ?>
              <img 
                src="/wenbanhang/images/no-image.png" 
                class="img-fluid rounded shadow-sm" 
                alt="Không có ảnh" 
                style="max-height: 350px; object-fit: contain;">
            <?php endif; ?>
          </div>

          <!-- Thông tin sản phẩm -->
          <div class="col-md-6">
            <h3 class="card-title text-primary fw-bold mb-3">
              <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
            </h3>

            <p class="card-text" style="white-space: pre-line;">
              <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <p class="text-danger fw-bold display-6 my-4">
              💰 <?php echo number_format($product->price, 0, ',', '.'); ?> VND
            </p>

            <p>
              <strong>Danh mục:</strong>
              <span class="badge bg-info text-white">
                <?php echo !empty($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Chưa có danh mục'; ?>
              </span>
            </p>

            <div class="mt-4 d-flex flex-wrap gap-2">
              <a href="/wenbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-success px-4">
                ➕ Thêm vào giỏ hàng (chưa hoạt động)
              </a>
              <a href="/wenbanhang/Product/list" class="btn btn-secondary px-4">
                Quay lại danh sách
              </a>
            </div>
          </div>
        </div>
      <?php else: ?>
        <div class="alert alert-danger text-center my-5">
          <h4>Không tìm thấy sản phẩm!</h4>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Style ảnh hover -->
<style>
  .product-image:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
  }
</style>

<?php include 'app/views/shares/footer.php'; ?>
