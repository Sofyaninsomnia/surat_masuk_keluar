<!--header-->
<!--end-->

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->


            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php $this->load->view('layout/navbar'); ?>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">


                        <!-- Total Revenue -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Surat Masuk</h3>
                                </div>

                                <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                                    <div class="d-flex align-items-end gap-2 flex-wrap">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Tambah
                                        </button>

                                        <form action="<?php echo site_url('Surat_masuk/pdf'); ?>" method="get" target="_blank" class="d-flex align-items-center gap-2">
                                            <div class="d-flex flex-column">
                                                <input type="date" id="start_date" name="start_date" class="form-control form-control" style="min-width: 140px;" />
                                            </div>

                                            <div class="d-flex flex-column">
                                                <input type="date" id="end_date" name="end_date" class="form-control form-control" style="min-width: 140px;" />
                                            </div>

                                            <button type="submit" class="btn btn-success mb-0"><i class="bx bx-printer"></i></button>
                                        </form>
                                    </div>

                                    <form action="<?= base_url('Surat_masuk/search'); ?>" method="post" class="d-flex align-items-center gap-2">
                                        <div class="input-group input-group" style="max-width: 280px;">
                                            <input type="text" name="keyword" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
                                            <button type="submit" class="btn btn-sm btn-outline-primary"><i class="bx bx-search"></i></button>
                                        </div>
                                    </form>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nomor Surat</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Pengirim</th>
                                                <th scope="col">Tujuan</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            if (empty($surat_masuk)) { ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                                </tr>
                                        <?php  }else {

                                            foreach ($surat_masuk as $sm): ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $sm->nomor; ?></td>
                                                    <td><?php echo $sm->judul ?></td>
                                                    <td><?php echo $sm->pengirim ?></td>
                                                    <td><?php echo $sm->tujuan ?></td>
                                                    <td><?php echo $sm->tanggal ?></td>
                                                    <td class="d-flex gap-1"><a href="<?php echo base_url('index.php/Surat_masuk/hapus/' . $sm->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="bx bx-trash"></i></a>
                                                        <a href="<?php echo base_url('index.php/Surat_masuk/detail/' . $sm->id); ?>" class="btn btn-sm btn-warning"><i class="bx bx-show"></i></a>
                                                        <a href="<?php echo base_url('index.php/Surat_masuk/edit/' . $sm->id); ?>" class="btn btn-sm btn-info"><i class="bx bx-edit"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Tambah Surat Masuk</h5>
                                        <button
                                            type="button"
                                            class="btn-close"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="<?php echo base_url('index.php/Surat_masuk/tambah'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col mb-1">
                                                    <label for="judul" class="form-label">Judul</label>
                                                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul surat" value="<?= set_value('judul'); ?>" />
                                                    <?= form_error('judul', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-1">
                                                    <label for="nomor" class="form-label">Nomor Surat</label>
                                                    <input type="text" id="nomor" name="nomor" class="form-control" placeholder="nomor surat" value="<?= set_value('judul'); ?>" />
                                                    <?= form_error('nomor', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                                <div class="col mb-1">
                                                    <label for="jenis" class="form-label">Jenis Surat</label>
                                                    <input type="text" id="jenis" name="jenis" class="form-control" placeholder="Jenis surat" value="<?= set_value('judul'); ?>" />
                                                    <?= form_error('jenis', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-0">
                                                    <label for="pengirim" class="form-label">Pengirim</label>
                                                    <input type="text" id="pengirim" name="pengirim" class="form-control" placeholder="Nama pengirim" value="<?= set_value('pengirim'); ?>" />
                                                    <?= form_error('pengirim', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                                <div class="col mb-0">
                                                    <label for="tujuan" class="form-label">Tujuan</label>
                                                    <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="Tujuan surat" value="<?= set_value('tujuan'); ?>" />
                                                    <?= form_error('tujuan', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                            </div>
                                            <div class="row g-2">
                                                <div class="col mb-1">
                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= set_value('tanggal'); ?>" />
                                                    <?= form_error('tanggal', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                                <div class="col mb-1">
                                                    <label for="file_surat" class="form-label">Upload File</label>
                                                    <input type="file" id="file_surat" name="file_surat" class="form-control" />
                                                    <?php if (isset($error_upload)): ?>
                                                        <div class="text-danger mt-1"><?= $error_upload; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col mb-1">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea id="deskripsi" name="deskripsi" rows="3" class="form-control" placeholder="Deskripsi surat"><?= set_value('deskripsi'); ?></textarea>
                                                    <?= form_error('deskripsi', '<div class="text-danger mt-1">', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->