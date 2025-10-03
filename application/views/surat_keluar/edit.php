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
                                    <h3>Edit Surat Keluar</h3>
                                </div>
                                <form action="<?= base_url('index.php/Surat_keluar/update/' . $surat_keluar->id) ?>" method="POST">
                                    <input type="hidden" name="id" value="<?= $surat_keluar->id ?>">

                                    <div class="mb-3">
                                        <label for="nomor" class="form-label">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $surat_keluar->nomor ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $surat_keluar->judul ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis" class="form-label">Jenis Surat</label>
                                        <input type="text" class="form-control" id="jenis" name="jenis" value="<?= $surat_keluar->jenis ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $surat_keluar->judul ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $surat_keluar->deskripsi ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="pengirim" class="form-label">Pengirim</label>
                                        <input type="text" class="form-control" id="pengirim" name="pengirim" value="<?= $surat_keluar->pengirim ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tujuan" class="form-label">Tujuan</label>
                                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="<?= $surat_keluar->tujuan ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $surat_keluar->tanggal ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Data</button>
                                    <a href="<?= base_url('index.php/Surat_keluar') ?>" class="btn btn-secondary">Batal</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>