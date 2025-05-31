<?php
require_once 'includes/auth-check.php';
require_once 'includes/db.php';

// Fetch banners for dashboard preview
$query = "SELECT * FROM home_content ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #2c3e50;
            padding-top: 30px;
            border-radius: 0 15px 15px 0;
        }
        .sidebar h4 {
            color: #ecf0f1;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            text-decoration: none;
            color: #bdc3c7;
            padding: 15px 20px;
            display: block;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #34495e;
            color: #fff;
        }
        .sidebar a.active {
            background-color: #1abc9c;
            color: white;
        }

        /* Content Area */
        .content {
            margin-left: 270px;
            padding: 40px;
            min-height: 100vh;
            padding-bottom: 60px; /* Ensure space for footer */
        }
        .content h3 {
            color: #2c3e50;
            font-weight: 600;
        }

        /* Footer Styles */
        .footer {
            position: relative;
            bottom: 0;
            left: 270px;
            width: calc(100% - 270px);
            text-align: center;
            color: #7f8c8d;
            font-size: 14px;
            padding: 10px;
            background-color: #ecf0f1;
        }

        /* Logout Button */
        .logout-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #e74c3c;
            color: #fff;
            padding: 15px 20px;
            border-radius: 50%;
            font-size: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }

        /* Banner Card */
        .banner-card {
            margin-bottom: 20px;
        }

        /* Alert Box Styles */
        .alert .close {
            font-size: 1.2em;
            padding: 0.2rem 0.4rem;
        }

        .ad-banner-area {
            margin-top: 50px;
        }
        .ad-banner-item {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .ad-banner-item img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .ad-banner-item h3 {
            font-size: 24px;
            margin-top: 10px;
            color: #333;
        }
        .ad-banner-item p {
            font-size: 16px;
            color: #777;
        }
        .ad-banner-item .btn-shop-now {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }
        .ad-banner-item .btn-shop-now:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <a href="dashboard.php" class="active">Home</a>
        <a href="about.php">About Us</a>
        <a href="contact-settings.php">Contact</a>
        <a href="blog.php">Blog</a>
        <a href="faq-admin.php">FAQ</a>
    </div>

    <div class="content">
        <!-- Success/Error Alerts -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['success']) ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($_GET['error']) ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <h3>Welcome, <?= $_SESSION['admin'] ?>!</h3>
        <p>Your personalized admin dashboard.</p>

        <h4>Manage Banner Ads</h4>
        <a href="add-banner.php" class="btn btn-success mb-3">Add New Banner</a>
        
        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-4">
                    <div class="card banner-card">
                        <img src="uploads/<?= $row['image'] ?>" class="card-img-top" alt="Banner">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['title'] ?></h5>
                            <p class="card-text"><?= $row['description'] ?></p>
                            <a href="edit-banner.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="delete-banner.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this banner?')">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- HOT DEALS SECTION -->
        <div class="card p-4 mt-4">
            <h2 class="text-xl font-semibold mb-4">🔥 Hot Deals Manager</h2>

            <!-- Current Hot Deals List -->
            <h3 class="text-lg font-semibold mb-2">Current Hot Deals</h3>
            <table class="table-auto w-full border mb-4">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">Product</th>
                        <th class="px-4 py-2">Original Price</th>
                        <th class="px-4 py-2">Deal Price</th>
                        <th class="px-4 py-2">Expires</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'includes/db.php'; // DB connection file

                    $hotDeals = $conn->query("SELECT id, name, price, deal_price, deal_expires FROM products WHERE is_deal = 1");

                    while ($row = $hotDeals->fetch_assoc()):
                    ?>
                    <tr class="border-b">
                        <td class="px-4 py-2"><?= htmlspecialchars($row['name']) ?></td>
                        <td class="px-4 py-2">₵<?= $row['price'] ?></td>
                        <td class="px-4 py-2">₵<?= $row['deal_price'] ?></td>
                        <td class="px-4 py-2"><?= $row['deal_expires'] ?></td>
                        <td class="px-4 py-2">
                            <form method="post" action="remove_hot_deal.php" onsubmit="return confirm('Remove this hot deal?');">
                                <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Remove</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Add Hot Deal Form -->
            <h5 class="mt-4 mb-3">Add a New Hot Deal</h5>
            <form method="post" action="add_hot_deal.php">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Select Product</label>
                        <select name="product_id" required class="form-select">
                            <option value="">-- Choose Product --</option>
                            <?php
                            $products = $conn->query("SELECT id, name FROM products WHERE is_deal = 0");

                            while ($p = $products->fetch_assoc()):
                            ?>
                            <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['name']) ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Deal Price (₵)</label>
                        <input type="number" step="1.00" name="deal_price" required class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" name="deal_expires" required class="form-control">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-2">Add Hot Deal</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
 

    

    <div class="footer">
         <a href="logout.php" class="logout-btn" title="Logout">🔑</a>
        <p>&copy; <?= date("Y") ?> AutoCity Autoparts. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
