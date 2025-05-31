<?php
include('db_connection.php');
session_start();
$vendor_id = $_SESSION['vendor_id'] ?? 0;

// Fetch product data
$product_query = "SELECT * FROM products WHERE vendor_id = ?";
$stmt = $conn->prepare($product_query);
$stmt->bind_param("i", $vendor_id);
$stmt->execute();
$product_result = $stmt->get_result();

// Summary counts
$total_products = $product_result->num_rows;
$low_stock = 0;
$pending_products = 0;
$products = [];

while ($row = $product_result->fetch_assoc()) {
    $products[] = $row;
    if ((int)$row['quantity'] < 15) $low_stock++; // low stock products
    if ($row['status'] === 'pending') $pending_products++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Vendor Dashboard</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
body { font-family: 'Segoe UI', sans-serif; background-color: #1e1e2f; color: #f8f9fa; }
.sidebar { height: 100vh; background-color: #12121c; color: #fff; }
.sidebar .nav-link { color: #ccc; }
.sidebar .nav-link.active, .sidebar .nav-link:hover { background-color: #ffc400; color: #000; }
.table thead th { vertical-align: middle; color: #ffc400; }
.status-badge { padding: 5px 10px; border-radius: 20px; font-size: 0.8rem; }
.badge-online { background-color: #28a745; color: white; }
.badge-pending { background-color: #ffc107; color: black; }
.badge-draft { background-color: #6c757d; color: white; }
.card-summary { background-color: #2c2c3a; border: none; color: #ffc400; }
.modal-content { background-color: #1e1e2f; color: #f8f9fa; border: 1px solid #444; }
</style>
</head>
<body>

       <!-- Begin Loading Area -->
                <div class="loading">
                    <div class="text-center middle">
                        <div class="lds-ellipsis">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
                <!-- Loading Area End Here -->

  <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message']['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['message']['text']) ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['message']); endif; ?>


<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block sidebar py-4">
      <div class="sidebar-sticky">
        <div id="vendor-name" class="px-3 py-2 text-warning font-weight-bold"></div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#"><i class="fas fa-box"></i> Products</a>
          </li>
          
        </ul>
      </div>
    </nav>
    <main class="col-md-10 ml-sm-auto px-4 py-4">
      <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-<?= $_SESSION['message']['type'] === 'success' ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['message']['text']) ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php unset($_SESSION['message']); endif; ?>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="color:#ffc400;">Your Dashboard</h2>
        <button class="btn btn-warning" data-toggle="modal" data-target="#postAdModal"><i class="fas fa-plus"></i> Add New Product</button>
      </div>
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card card-summary p-3">
            <h5>Total Products</h5>
            <h3><?= $total_products ?></h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-summary p-3">
            <h5>Low Stock Items</h5>
            <h3><?= $low_stock ?></h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-summary p-3">
            <h5>Active Products</h5>
            <h3><?= $pending_products ?></h3>
          </div>
        </div>
      </div>
      <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th></th>
            <th>Product Name</th>
            <th>Stock</th>
            <th>Price</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product): ?>
          <tr data-product-id="<?= $product['id'] ?>">
            <td>
                <?php
                    $imagePath = htmlspecialchars($product['product_images']);
                    $imagePath = explode(',', $product['product_images'])[0];
                    echo "<img src='$imagePath' width='50' height='50' style='object-fit:cover; border-radius:4px'>";
                ?>
            </td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['quantity']) ?></td>
            <td>₵<?= number_format($product['price'], 2) ?></td>
            <td>
              <?php
                $status = strtolower($product['status']);
                $badge = 'badge-draft';
                if ($status === 'online') $badge = 'badge-online';
                elseif ($status === 'pending') $badge = 'badge-online';
              ?>
              <span class="status-badge <?= $badge ?>"><?= ucfirst($status) ?></span>
            </td>
            <td>
              <button class="btn btn-sm btn-primary" onclick='openEditModal(<?= json_encode(array_map("htmlspecialchars", $product)) ?>)'>Edit</button>
              <button class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
  </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade ad-modal" id="postAdModal" tabindex="-1" role="dialog" aria-labelledby="postAdModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="postAdModalLabel">Post New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="vendor_product_handler.php?action=add" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" id="ad-id" name="ad_id">
          
          <!-- Product Name -->
          <div class="form-group">
            <label for="product-name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="product-name" name="product_name" required>
          </div>
          
          <div class="row">
            <div class="col-md-6">
              <!-- Product Category -->
              <div class="form-group">
                <label for="product-category" class="form-label">Category</label>
                <select class="form-control" id="product-category" name="product_category" required>
                  <option value="">Select Category</option>
                  <option value="10">Engine & Performance</option>
                  <option value="17">Suspension & Steering</option>
                  <option value="10">Interior</option>
                  <option value="20">Wheels & Rims</option>
                  <option value="10">Fluids</option>
                  <option value="10">Exterior & Cosmetics</option>
                </select>
              </div>
              
              <!-- Product Price -->
              <div class="form-group">
                <label for="product-price" class="form-label">Price (GHC)</label>
                <input type="number" class="form-control" id="product-price" name="product_price" step="0.50" min="0" required>
              </div>
              
              <!-- Product Quantity -->
              <div class="form-group">
                <label for="product-quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="product-quantity" name="product_quantity" required>
              </div>
              
              <!-- Product Condition -->
              <div class="form-group">
                <label for="product-condition" class="form-label">Condition</label>
                <select class="form-control" id="product-condition" name="product_condition">
                  <option value="new">New</option>
                  <option value="used">Used</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <!-- Product Description -->
              <div class="form-group">
                <label for="product-description" class="form-label">Description</label>
                <textarea class="form-control" id="product-description" name="product_description" rows="4" required></textarea>
              </div>
              
              <!-- Product Images -->
              <div class="form-group">
                <label for="product-images" class="form-label">Images</label>
                <input type="file" class="form-control-file" id="product-images" name="product_images[]" multiple required>
              </div>
              
              <!-- Product Brand (New field) -->
              <div class="form-group">
                <label for="product-brand" class="form-label">Product Brand</label>
                <input type="text" class="form-control" id="product-brand" name="product_brand" required>
              </div>
              
              <!-- Dealer Contact Phone -->
              <div class="form-group">
                <label for="contact-phone" class="form-label">Contact Phone</label>
                <input type="tel" class="form-control" id="contact-phone" name="contact_phone" pattern="\+233[0-9]{9}" placeholder="e.g. +233241234567" required>
              </div>
              
              <!-- Dealer Contact Email -->
              <div class="form-group">
                <label for="contact-email" class="form-label">Contact Email</label>
                <input type="email" class="form-control" id="contact-email" name="contact_email" placeholder="e.g. vendor@example.com" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Save Product</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content bg-dark text-light">
      <div class="modal-header">
        <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit-product-form" method="POST" action="vendor_product_handler.php?action=edit" enctype="multipart/form-data">
        <input type="hidden" name="product_id" id="edit-product-id">
        <input type="hidden" name="action" value="edit">

        <!-- Product Name -->
        <div class="form-group">
          <label for="edit-product-name">Product Name</label>
          <input type="text" class="form-control" id="edit-product-name" name="product_name" required>
        </div>

        <!-- Product Category -->
        <div class="form-group">
          <label for="edit-product-category">Category</label>
          <select class="form-control" id="edit-product-category" name="product_category" required>
            <option value="">Select Category</option>
            <option value="10">Engine & Performance</option>
            <option value="17">Suspension & Steering</option>
            <option value="20">Brakes</option>
          </select>
        </div>

        <!-- Product Price -->
        <div class="form-group">
          <label for="edit-product-price">Price (GHC)</label>
          <input type="number" class="form-control" id="edit-product-price" name="product_price" step="0.50" min="0" required>
        </div>

        <!-- Product Quantity -->
        <div class="form-group">
          <label for="edit-product-quantity">Quantity</label>
          <input type="number" class="form-control" id="edit-product-quantity" name="product_quantity" required>
        </div>

        <!-- Product Condition -->
        <div class="form-group">
          <label for="edit-product-condition">Condition</label>
          <select class="form-control" id="edit-product-condition" name="product_condition" required>
            <option value="new">New</option>
            <option value="used">Used</option>
          </select>
        </div>

        <!-- Product Description -->
        <div class="form-group">
          <label for="edit-product-description">Description</label>
          <textarea class="form-control" id="edit-product-description" name="product_description" rows="4" required></textarea>
        </div>

        <!-- Product Images (Multiple Uploads) -->
        <div class="form-group">
          <label for="edit-product-images">Images</label>
          <input type="file" class="form-control-file" id="edit-product-images" name="product_images[]" multiple>
          <small class="form-text text-muted">Select images to upload (you can upload multiple images).</small>
        </div>

        <!-- Status -->
        <div class="form-group">
          <label for="edit-status">Status</label>
          <select class="form-control" id="edit-status" name="status" required>
            <option value="online">Online</option>
            <option value="pending">Pending</option>
            <option value="draft">Draft</option>
          </select>
        </div>

        <!-- Contact Phone -->
        <div class="form-group">
          <label for="edit-contact-phone">Contact Phone</label>
          <input type="tel" class="form-control" id="edit-contact-phone" name="contact_phone" pattern="\+233[0-9]{9}" placeholder="e.g. +233241234567" required>
        </div>

        <!-- Contact Email -->
        <div class="form-group">
          <label for="edit-contact-email">Contact Email</label>
          <input type="email" class="form-control" id="edit-contact-email" name="contact_email" placeholder="e.g. vendor@example.com" required>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Update Product</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Sticky Footer -->
<footer style="position: fixed; bottom: 0; width: 100%; background-color: #12121c; color: #ffc400; text-align: center; padding: 10px 0; font-size: 14px; z-index: 1000;">
  © 2025 AutoCity Autoparts. All rights reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    fetch("vendor_data_handler.php?action=get_vendor_info")
      .then(response => response.json())
      .then(data => {
        if (data.status === "success") {
          document.getElementById("vendor-name").textContent = data.data.name;
        } else {
          document.getElementById("vendor-name").textContent = "Vendor";
        }
      })
      .catch(() => {
        document.getElementById("vendor-name").textContent = "Vendor";
      });
  });
</script>

<script>
  function openEditModal(product) {
    // Populate the modal fields with the product data
    document.getElementById('edit-product-id').value = product.id;
    document.getElementById('edit-product-name').value = product.name;
    document.getElementById('edit-product-category').value = product.category_id;
    document.getElementById('edit-product-price').value = product.price;
    document.getElementById('edit-product-quantity').value = product.quantity;
    document.getElementById('edit-product-condition').value = product.condition;
    document.getElementById('edit-product-description').value = product.description;
    document.getElementById('edit-status').value = product.status;
    document.getElementById('edit-contact-phone').value = product.contact_phone;
    document.getElementById('edit-contact-email').value = product.contact_email;

    // Open the modal
    $('#editProductModal').modal('show');
}

</script>

<!-- Delete Confirmation Script -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".btn-danger").forEach(button => {
      button.addEventListener("click", function () {
        const row = this.closest("tr");
        const productName = row.querySelector("td:nth-child(2)").innerText;
        const confirmDelete = confirm(`Are you sure you want to delete '${productName}'?`);
        if (confirmDelete) {
          const productId = row.dataset.productId;

          fetch('vendor_product_handler.php?action=delete', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `id=${productId}`
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              alert("Product deleted successfully.");
              row.remove();  // Remove the row from the table
            } else {
              alert("Failed to delete product.");
            }
          });
        }
      });
    });
  });
</script>

</body>
</html>
