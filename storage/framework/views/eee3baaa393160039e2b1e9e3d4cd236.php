<?php $__env->startSection('title', 'Edit Stok'); ?>

<?php $__env->startSection('content'); ?>
<div class="mb-4">
    <a href="<?php echo e(route('bahan-makanan.index')); ?>" class="text-decoration-none text-green small">&larr; Kembali ke daftar stok</a>
    <h1 class="h3 fw-bold mt-2 mb-1">Edit Bahan Makanan</h1>
    <p class="text-secondary mb-0">Perbarui informasi atau jumlah persediaan.</p>
</div>

<div class="card p-3 p-md-4">
    <form action="<?php echo e(route('bahan-makanan.update', $bahanMakanan)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <?php echo $__env->make('bahan_makanan._form', ['bahanMakanan' => $bahanMakanan], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
            <a href="<?php echo e(route('bahan-makanan.index')); ?>" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\stok-kos\resources\views/bahan_makanan/edit.blade.php ENDPATH**/ ?>