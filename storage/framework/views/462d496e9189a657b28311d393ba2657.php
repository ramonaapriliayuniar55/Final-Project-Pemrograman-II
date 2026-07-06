<div class="card mb-3 shadow-sm">

    <div class="card-body">

    <div class="form-check mb-2">
        <input type="checkbox"
               name="selected_books[]"
               value="<?php echo e($buku->id); ?>"
               class="form-check-input book-checkbox">
        <label class="form-check-label">
             Pilih
        </label>
    </div>

        <div class="row align-items-center">

            
            <div class="col-md-2 text-center">

                <i class="bi bi-book text-primary"
                   style="font-size: 4rem;"></i>

                <div class="mt-2">

                    <span class="badge
                        <?php if($buku->kategori == 'Programming'): ?> bg-primary
                        <?php elseif($buku->kategori == 'Database'): ?> bg-success
                        <?php elseif($buku->kategori == 'Web Design'): ?> bg-info
                        <?php elseif($buku->kategori == 'Networking'): ?> bg-warning
                        <?php else: ?> bg-danger
                        <?php endif; ?>">

                        <?php echo e($buku->kategori); ?>


                    </span>

                </div>

            </div>

            
            <div class="col-md-7">

                <h5 class="fw-bold text-primary">
                    <?php echo e($buku->judul); ?>

                </h5>

                <p class="text-muted mb-1">

                    <i class="bi bi-person"></i>
                    <?php echo e($buku->pengarang); ?>


                    |

                    <i class="bi bi-building"></i>
                    <?php echo e($buku->penerbit); ?>


                    |

                    <i class="bi bi-calendar"></i>
                    <?php echo e($buku->tahun_terbit); ?>


                </p>

                <p class="small text-muted mb-2">

                    <i class="bi bi-upc"></i>
                    ISBN: <?php echo e($buku->isbn); ?>


                </p>

                <p class="mb-0">
                    <?php echo e(Str::limit($buku->deskripsi, 100)); ?>

                </p>

            </div>

            
            <div class="col-md-3 text-end">

                <h4 class="text-primary fw-bold">
                    <?php echo e($buku->harga_format); ?>

                </h4>

                <?php if($buku->stok > 0): ?>

                    <span class="badge bg-success">
                        <i class="bi bi-check-circle"></i>
                        Tersedia
                    </span>

                    <div class="small text-muted mt-1">
                        Stok: <?php echo e($buku->stok); ?> buku
                    </div>

                <?php else: ?>

                    <span class="badge bg-danger">
                        <i class="bi bi-x-circle"></i>
                        Habis
                    </span>

                <?php endif; ?>

                <?php if($showActions): ?>

                    <div class="d-grid gap-2 mt-3">

                        <a href="<?php echo e(route('buku.show', $buku->id)); ?>"
                           class="btn btn-sm btn-info text-white">
                            <i class="bi bi-eye"></i>
                            Detail
                        </a>

                        <a href="<?php echo e(route('buku.edit', $buku->id)); ?>"
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i>
                            Edit
                        </a>

                        
                    <button type="button" class="btn btn-sm btn-danger w-100"
                            onclick="hapusBuku(<?php echo e($buku->id); ?>, '<?php echo e(addslashes($buku->judul)); ?>')">
                        <i class="bi bi-trash"></i> Hapus
                    </button>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div><?php /**PATH C:\xampp\htdocs\Pertemuan 15\praktikum-Pertemuan15\resources\views/components/buku-card.blade.php ENDPATH**/ ?>