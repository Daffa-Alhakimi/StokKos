<?php $__env->startSection('title', 'Daftar Stok'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <div>
        <div class="muted-label text-uppercase fw-bold mb-1">Persediaan pribadi</div>
        <h1 class="h3 fw-bold mb-1">Daftar Bahan Makanan</h1>
        <p class="text-secondary mb-0">Pantau bahan makanan yang tersedia di kos.</p>
    </div>
    <a href="<?php echo e(route('bahan-makanan.create')); ?>" class="btn btn-primary px-4 py-2">+ Tambah Bahan</a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="card p-3">
            <div class="muted-label">Total jenis bahan</div>
            <div class="display-6 fw-bold text-green"><?php echo e($totalJenis); ?></div>
            <div class="small text-secondary">Jenis bahan makanan yang tercatat</div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-8">
        <div class="soft-panel h-100 p-3 d-flex align-items-center">
            <div>
                <div class="fw-semibold text-green mb-1">Catatan StokKos</div>
                <div class="small text-secondary">Perbarui jumlah persediaan setiap kali membeli atau menggunakan bahan makanan agar catatan tetap sesuai.</div>
            </div>
        </div>
    </div>
</div>

<div class="card overflow-hidden">
    <div class="p-3 p-md-4 border-bottom d-flex justify-content-between align-items-center">
        <div>
            <h2 class="h5 fw-bold mb-1">Persediaan saat ini</h2>
            <div class="small text-secondary">Daftar bahan makanan yang tersimpan.</div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th class="ps-4">No.</th>
                    <th>Nama Bahan</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Kedaluwarsa</th>
                    <th class="text-end pe-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $bahanMakanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $jumlahTampil = rtrim(rtrim(number_format((float) $item->jumlah, 2, ',', '.'), '0'), ',');
                    ?>
                    <tr>
                        <td class="ps-4 text-secondary"><?php echo e($index + 1); ?></td>
                        <td class="fw-semibold"><?php echo e($item->nama); ?></td>
                        <td><?php echo e($item->kategori); ?></td>
                        <td><?php echo e($jumlahTampil); ?> <?php echo e($item->satuan); ?></td>
                        <td>
                            <?php if($item->tanggal_kedaluwarsa): ?>
                                <?php echo e($item->tanggal_kedaluwarsa->format('d-m-Y')); ?>

                            <?php else: ?>
                                <span class="text-secondary">-</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-end pe-4">
                            <a href="<?php echo e(route('bahan-makanan.edit', $item)); ?>" class="btn btn-sm btn-outline-success">Edit</a>
                            <form action="<?php echo e(route('bahan-makanan.destroy', $item)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Hapus data <?php echo e($item->nama); ?>?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-secondary">Belum ada bahan makanan. Tekan tombol Tambah Bahan untuk mulai mencatat.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\stok-kos\resources\views/bahan_makanan/index.blade.php ENDPATH**/ ?>