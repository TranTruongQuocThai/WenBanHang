<?php foreach ($categories as $category): ?>
<option value="<?php echo $category->id; ?>" <?php echo $category->id

== $product->category_id ? 'selected' : ''; ?>>

<?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8');

?>

</option>
<?php endforeach; ?>
</select>
</div>
<button type="submit" class="btn btn-primary">Lưu thay đổi</button>
</form>
<a href="/wenbanhang/Product/list" class="btn btn-secondary mt-2">Quay lại danh sách
sản phẩm</a>
<?php include 'app/views/shares/footer.php'; ?>