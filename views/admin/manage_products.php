<?php
// views/admin/manage_products.php
require __DIR__ . '/../../db/database.php';

// Fetch products
$sql = "SELECT productCode, name, version, releaseDate FROM products ORDER BY productCode";
$products = $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

include __DIR__ . '/../header.php';
?>

<h2 class="mb-3">Manage Products</h2>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Product Code</th>
            <th>Name</th>
            <th>Version</th>
            <th>Release Date</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['productCode']) ?></td>
            <td><?= htmlspecialchars($product['name']) ?></td>
            <td><?= htmlspecialchars($product['version']) ?></td>
            <td><?= $product['releaseDate'] ? date('Y-m-d', strtotime($product['releaseDate'])) : '' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a class="btn btn-secondary" href="<?= $base_url ?>/index.php">Back to Home</a>

<?php include __DIR__ . '/../footer.php'; ?>
