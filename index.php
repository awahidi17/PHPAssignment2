<?php
require __DIR__ . '/views/header.php';
?>

<div class="text-center mb-5">
    <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill glass soft-shadow mb-3">
        <span class="icon-badge"><i class="bi bi-shield-check"></i></span>
        <span class="fw-semibold">Admin + Support Portal</span>
    </div>

    <h1 class="fw-bold display-6 mb-2">SportsPro Technical Support</h1>
    <p class="text-muted mb-0">Product management and technical support system</p>
</div>

<!-- Administrators -->
<div class="card glass soft-shadow border-0 rounded-4 mb-4">
    <div class="card-header border-0 bg-transparent pt-4 px-4">
        <div class="d-flex align-items-center gap-3">
            <span class="icon-badge"><i class="bi bi-gear-fill"></i></span>
            <div>
                <h4 class="mb-0">Administrators</h4>
                <small class="text-muted">Manage products, customers, and incidents</small>
            </div>
        </div>
    </div>

    <div class="card-body px-0 pb-4 pt-3">
        <div class="list-group list-group-flush">
            <a href="<?= $base_url ?>/views/admin/manage_products.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                <i class="bi bi-box-seam"></i>
                <span class="flex-grow-1">Manage Products</span>
                <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="<?= $base_url ?>/views/admin/manage_technicians.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                <i class="bi bi-people"></i>
                <span class="flex-grow-1">Manage Technicians</span>
                <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="<?= $base_url ?>/customers/index.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                <i class="bi bi-person-vcard"></i>
                <span class="flex-grow-1">Manage Customers</span>
                <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="<?= $base_url ?>/incidents/create_incident.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                <i class="bi bi-plus-circle"></i>
                <span class="flex-grow-1">Create Incident</span>
                <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="<?= $base_url ?>/incidents/assign_incident.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                <i class="bi bi-person-workspace"></i>
                <span class="flex-grow-1">Assign Incident</span>
                <i class="bi bi-chevron-right text-muted"></i>
            </a>

            <a href="<?= $base_url ?>/incidents/index.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                <i class="bi bi-list-check"></i>
                <span class="flex-grow-1">Display Incidents</span>
                <i class="bi bi-chevron-right text-muted"></i>
            </a>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Technicians -->
    <div class="col-lg-6">
        <div class="card glass soft-shadow border-0 rounded-4 h-100">
            <div class="card-header border-0 bg-transparent pt-4 px-4">
                <div class="d-flex align-items-center gap-3">
                    <span class="icon-badge" style="background: rgba(255,193,7,.15);">
                        <i class="bi bi-tools"></i>
                    </span>
                    <div>
                        <h4 class="mb-0">Technicians</h4>
                        <small class="text-muted">Work on assigned incidents</small>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pb-4 pt-3">
                <div class="list-group list-group-flush">
                    <a href="<?= $base_url ?>/technicians/update_incident.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                        <i class="bi bi-wrench-adjustable"></i>
                        <span class="flex-grow-1">Update Incident</span>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Customers -->
    <div class="col-lg-6">
        <div class="card glass soft-shadow border-0 rounded-4 h-100">
            <div class="card-header border-0 bg-transparent pt-4 px-4">
                <div class="d-flex align-items-center gap-3">
                    <span class="icon-badge" style="background: rgba(25,135,84,.15);">
                        <i class="bi bi-person-check"></i>
                    </span>
                    <div>
                        <h4 class="mb-0">Customers</h4>
                        <small class="text-muted">Register products for support</small>
                    </div>
                </div>
            </div>

            <div class="card-body px-0 pb-4 pt-3">
                <div class="list-group list-group-flush">
                    <a href="<?= $base_url ?>/registrations/register_product.php" class="list-group-item list-group-item-action d-flex align-items-center gap-3 px-4 py-3">
                        <i class="bi bi-clipboard2-check"></i>
                        <span class="flex-grow-1">Register Product</span>
                        <i class="bi bi-chevron-right text-muted"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/views/footer.php'; ?>
