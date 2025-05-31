<?php
include 'db_connection.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "
        SELECT 
            p.name, p.price, p.description, p.product_images, 
            p.contact_phone, p.contact_email,
            v.first_name
        FROM products p
        LEFT JOIN vendordash v ON p.vendor_id = v.id
        WHERE p.id = $id AND p.status = 'pending'
    ";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Format data
        $name = htmlspecialchars($row['name']);
        $price = number_format($row['price'], 2);
        $desc = nl2br(htmlspecialchars($row['description']));
        $contactPhone = htmlspecialchars($row['contact_phone']);
        $contactEmail = htmlspecialchars($row['contact_email']);
        $vendorName = htmlspecialchars($row['first_name']);

        // Handle product images
        $images = explode(',', $row['product_images']);
        $carouselItems = '';
        $indicators = '';
        foreach ($images as $index => $img) {
            $activeClass = $index === 0 ? 'active' : '';
            $imgPath = trim($img);  // Remove any extra spaces around the image path

            // Ensure the image path is prefixed with 'uploads/' if not already included
            if (strpos($imgPath, 'uploads/') === false) {
                $imgPath = 'uploads/' . $imgPath;
            }

            // Carousel items
            $carouselItems .= "
                <div class='carousel-item $activeClass'>
                    <img src='$imgPath' class='d-block w-100' alt='$name' style='max-height: 300px; object-fit: contain;'>
                </div>";

            // Indicators
            $indicators .= "<li data-target='#productCarousel' data-slide-to='$index' class='$activeClass'></li>";
        }

        // Displaying the modal content
        echo <<<HTML
        <div class="product-modal-body">
            <h4>$name</h4>

            <div id="productCarousel" class="carousel slide mb-3" data-ride="carousel" data-interval="5000">
                <ol class="carousel-indicators">
                    $indicators
                </ol>
                <div class="carousel-inner">
                    $carouselItems
                </div>
                <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <p><strong>Price:</strong> GH₵$price</p>
            <p><strong>Description:</strong><br>$desc</p>
            <hr>
            <p><strong>Vendor Information:</strong></p>
            <p>Name: $vendorName<br>
            Phone: $contactPhone<br>
            Email: $contactEmail</p>
        </div>
HTML;
    } else {
        echo "<p>Product not found or inactive.</p>";
    }
} else {
    echo "<p>Invalid product ID.</p>";
}
?>
