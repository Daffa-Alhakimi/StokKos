<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'StokKos'); ?> - StokKos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --green: #426b55; --green-dark: #2f503f; --cream: #f7f5ed; --ink: #28352d; }
        body { background: #f5f7f4; color: var(--ink); font-family: Arial, sans-serif; }
        .navbar-stok { background: var(--green-dark); }
        .brand-mark { width: 34px; height: 34px; border-radius: 11px; display: inline-grid; place-items: center; background: #e1eadf; color: var(--green-dark); font-weight: 800; }
        .page-wrap { max-width: 1120px; }
        .card { border: 1px solid #e6ebe5; border-radius: 16px; box-shadow: 0 5px 18px rgba(34, 62, 44, .045); }
        .btn-primary { background: var(--green); border-color: var(--green); }
        .btn-primary:hover { background: var(--green-dark); border-color: var(--green-dark); }
        .text-green { color: var(--green-dark); }
        .table thead th { background: #edf3ec; color: #405747; font-size: .86rem; font-weight: 700; border-bottom: 0; }
        .table td { vertical-align: middle; }
        .muted-label { color: #78867c; font-size: .82rem; }
        .form-control, .form-select { border-color: #dce4dc; border-radius: 10px; padding: .68rem .8rem; }
        .form-control:focus, .form-select:focus { border-color: #86a991; box-shadow: 0 0 0 .2rem rgba(66,107,85,.12); }
        .soft-panel { background: var(--cream); border: 1px solid #eee9d8; border-radius: 14px; }
        @media (max-width: 700px) { .table { min-width: 700px; } }
    </style>
</head>
<body>
<nav class="navbar navbar-dark navbar-stok py-3">
    <div class="container page-wrap">
        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="<?php echo e(route('bahan-makanan.index')); ?>">
            <span class="brand-mark">S</span><span>StokKos</span>
        </a>
        <span class="navbar-text text-white-50 small">Catatan persediaan bahan makanan</span>
    </div>
</nav>

<main class="container page-wrap py-4 py-md-5">
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    <?php endif; ?>

    <?php echo $__env->yieldContent('content'); ?>
</main>

<footer class="container page-wrap pb-4 text-center text-secondary small">
    StokKos &middot; Sistem Pencatatan Persediaan Bahan Makanan Anak Kos
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\stok-kos\resources\views/layouts/app.blade.php ENDPATH**/ ?>