<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <?php $this->load->view('layout/navbar'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Edit Surat Masuk</h3>
                                </div>
                                <form action="<?= base_url('index.php/Surat_masuk/update/' . $surat_masuk->id) ?>" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?= $surat_masuk->id ?>">

                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $surat_masuk->judul ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $surat_masuk->deskripsi ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengirim" class="form-label">Pengirim</label>
                                        <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $surat_masuk->pengirim ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $surat_masuk->tujuan ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $surat_masuk->tanggal ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cover">File surat</label><small class="text-danger"> Kosongkan jika file surat tidak ingin diubah</small><br>
                                        <?php if (!empty($surat_masuk->file_surat)) : ?>
                                            <div class="mb-2">
                                                <a href="<?= base_url('uploads/surat_masuk/' . htmlspecialchars($surat_masuk->file_surat)); ?>" target="_blank">Lihat File</a>
                                            </div>
                                        <?php endif; ?>
                                        <input type="file" name="file_surat" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                    <a href="<?= base_url('index.php/Surat_masuk') ?>" class="btn btn-secondary">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>