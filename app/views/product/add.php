<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
  <h1 class="mb-4">Thêm sản phẩm mới</h1>

  <!-- Hiển thị lỗi nếu có -->
  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <ul class="mb-0">
        <?php foreach ($errors as $error): ?>
          <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

  <form method="POST" action="/wenbanhang/Product/save" onsubmit="return validateForm();">
    <div class="form-group mb-3">
      <label for="name">Tên sản phẩm:</label>
      <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="form-group mb-3">
      <label for="description">Mô tả:</label>
      <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
    </div>

    <div class="form-group mb-3">
      <label for="price">Giá:</label>
      <input type="number" id="price" name="price" class="form-control" step="0.01" required>
    </div>

    <div class="form-group mb-4">
      <label for="category_id">Danh mục:</label>
      <select id="category_id" name="category_id" class="form-control" required>
        <?php foreach ($categories as $category): ?>
          <option value="<?php echo $category->id; ?>">
            <?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    <a href="/webbanhang/Product/list" class="btn btn-secondary ms-2">Quay lại danh sách</a>
  </form>
</div>

<!-- Script kiểm tra đơn giản -->
<script>
function validateForm() {
  const name = document.getElementById("name").value.trim();
  const description = document.getElementById("description").value.trim();
  const price = parseFloat(document.getElementById("price").value);
  const errors = [];

  if (name.length < 5 || name.length > 100) {
    errors.push("Tên sản phẩm phải từ 5 đến 100 ký tự.");
  }

  if (description.length === 0) {
    errors.push("Mô tả không được để trống.");
  }

  if (isNaN(price) || price <= 0) {
    errors.push("Giá phải là số dương lớn hơn 0.");
  }

  if (errors.length > 0) {
    alert(errors.join("\n"));
    return false;
  }

  return true;
}
</script>

<?php include 'app/views/shares/footer.php'; ?>
