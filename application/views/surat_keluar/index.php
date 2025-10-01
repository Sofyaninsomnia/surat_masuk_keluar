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


                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h3>Surat Keluar</h3>
                                </div>
                                <div class="d-flex justify-content-between align-items-end flex-wrap gap-2 mb-3">
                                    <div class="d-flex align-items-end gap-2 flex-wrap">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Tambah
                                        </button>

                                        <form action="<?php echo site_url('Surat_keluar/pdf'); ?>" method="get" target="_blank" class="d-flex align-items-center gap-2">
                                            <div class="d-flex flex-column">
                                                <input type="date" id="start_date" name="start_date" class="form-control form-control" style="min-width: 140px;" />
                                            </div>

                                            <div class="d-flex flex-column">
                                                <input type="date" id="end_date" name="end_date" class="form-control form-control" style="min-width: 140px;" />
                                            </div>

                                            <button type="submit" class="btn btn-success mb-0"><i class="bx bx-printer"></i> Cetak PDF</button>
                                        </form>
                                    </div>

                                    <div class="input-group input-group" style="max-width: 280px;">
                                        <span class="input-group-text" id="basic-addon-search31">
                                            <i class="bx bx-search"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31">
                                    </div>
                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Judul</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Pengirim</th>
                                            <th scope="col">Tujuan</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($surat_keluar as $sm): ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $sm->judul ?></td>
                                                <td><?php echo $sm->deskripsi ?></td>
                                                <td><?php echo $sm->pengirim ?></td>
                                                <td><?php echo $sm->tujuan ?></td>
                                                <td><?php echo $sm->tanggal ?></td>
                                                <td>
                                                    <?php if (!empty($sm->file_surat)) : ?>
                                                        <a href="<?= base_url('uploads/surat_keluar/' . htmlspecialchars($sm->file_surat)); ?>" target="_blank">Lihat File</a>
                                                    <?php else : ?>
                                                        -
                                                    <?php endif; ?>
                                                </td>
                                                <td><a href="<?php echo base_url('index.php/Surat_keluar/hapus/' . $sm->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"><i class="bx bx-trash"></i></a>
                                                    <a href="<?php echo base_url('index.php/Surat_keluar/edit/' . $sm->id); ?>" class="btn btn-sm btn-info"><i class="bx bx-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Tambah surat keluar</h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo base_url('index.php/Surat_keluar/tambah'); ?>" method="post" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">Judul</label>
                                                            <input type="text" name="judul" class="form-control" placeholder="Judul surat" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">Deskripsi</label>
                                                            <textarea name="deskripsi" rows="3" class="form-control" placeholder="Deskripsi surat"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-0">
                                                            <label for="emailBasic" class="form-label">Pengirim</label>
                                                            <input type="text" name="pengirim" class="form-control" placeholder="Nama pengirim" />
                                                        </div>
                                                        <div class="col mb-0">
                                                            <label for="dobBasic" class="form-label">Tujuan</label>
                                                            <input type="text" name="tujuan" class="form-control" placeholder="Tujuan surat" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="nameBasic" class="form-label">Tanggal</label>
                                                            <input type="date" name="tanggal" class="form-control" placeholder="Judul surat" />
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="file_surat" class="form-label">Upload File</label>
                                                            <input type="file" id="file_surat" name="file_surat" class="form-control" />
                                                            <?php if (isset($error_upload)): ?>
                                                                <div class="text-danger mt-1"><?= $error_upload; ?></div>
                                                            <?php endif; ?>
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
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->