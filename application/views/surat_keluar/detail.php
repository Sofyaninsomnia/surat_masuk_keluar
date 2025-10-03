<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <?php $this->load->view('layout/navbar'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-center mb-4">
                                    <h3>Detail Surat: <?php echo $surat_keluar->judul ?></h3>
                                </div>
                                <hr class="my-4">
                                
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <dl class="row">
                                            <dt class="col-sm-4 text-nowrap">Nomor Surat</dt>
                                            <dd class="col-sm-8">: <?php echo $surat_keluar->nomor ?></dd>

                                            <dt class="col-sm-4 text-nowrap">Judul</dt>
                                            <dd class="col-sm-8">: <?php echo $surat_keluar->judul ?></dd>

                                            <dt class="col-sm-4 text-nowrap">Jenis Surat</dt>
                                            <dd class="col-sm-8">: <?php echo $surat_keluar->jenis ?></dd>
                                        </dl>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <dl class="row">
                                            <dt class="col-sm-4 text-nowrap">Pengirim</dt>
                                            <dd class="col-sm-8">: <?php echo $surat_keluar->pengirim ?? 'N/A' ?></dd> 
                                            <dt class="col-sm-4 text-nowrap">Tujuan</dt>
                                            <dd class="col-sm-8">: <?php echo $surat_keluar->tujuan ?? 'N/A' ?></dd>
                                            <dt class="col-sm-4 text-nowrap">Tanggal Surat</dt>
                                            <dd class="col-sm-8">: <?php echo $surat_keluar->tanggal ?? 'N/A' ?></dd>
                                            </dl>
                                    </div>
                                </div>

                                Deskripsi Surat
                                
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <p class="text-muted">
                                            <?php echo $surat_keluar->deskripsi ?? 'Tidak ada deskripsi yang tersedia untuk surat ini.' ?>
                                            </p>
                                    </div>
                                </div>

                                File Surat

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="alert alert-info" role="alert">
                                            File surat akan ditampilkan di sini. 
                                            <a href="<?= base_url('uploads/surat_keluar/' . htmlspecialchars($surat_keluar->file_surat)); ?>" target="_blank" class="alert-link">Lihat File (contoh)</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <a href="<?= base_url('index.php/surat_keluar'); ?>" class="btn btn-secondary">Kembali</a>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>