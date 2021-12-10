<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-3">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Surat Diterima</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-folder-symlink"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $id_surat; ?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <!-- Customers Card -->
            <div class="col-xxl-3 col-xl-3">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Users</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $id; ?></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <div class="col-lg-6">

              <!-- Recent Activity -->
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Aktifitas Baru Surat<span></span></h5>

                  <div class="activity">
                    <?php if($content): ?>
                    <?php 
                      $no = 1;
                      foreach($content as $row): ?>
                    <div class="activity-item d-flex">
                      <div class="activite-label"><?php echo $row->updated_at; ?></div>
                            <?php if($row->status=== 'diterima'): ?>
                                <span class="bi bi-circle-fill activity-badge text-success align-self-start"><?= $row->status?></span>
                            <?php elseif($row->status=== 'ditolak'): ?>
                                <span class="bi bi-circle-fill activity-badge text-danger align-self-start"><?= $row->status?></span>
                            <?php elseif($row->status=== 'pending'): ?>
                                <span class="bi bi-circle-fill activity-badge text-warning align-self-start"><?= $row->status?></span>
                            <?php elseif($row->status=== 'ditinjau'): ?>
                                <span class="bi bi-circle-fill activity-badge text-secondary align-self-start"><?= $row->status?></span>
                            <?php endif ?>
                      <div class="activity-content">
                            <?php if($row->status=== 'diterima'): ?>
                                Surat permohonan <a href=""><?php echo $row->name; ?></a> <a href="">ID:<?php echo $row->id_surat; ?></a> telah diterima!
                            <?php elseif($row->status=== 'ditolak'): ?>
                                Surat permohonan <a href=""><?php echo $row->name; ?></a> dengan nomor <a href="">ID:<?php echo $row->id_surat; ?></a> telah ditolak!
                            <?php elseif($row->status=== 'pending'): ?>
                                <a href=""><?php echo $row->name; ?></a> mengirim surat permohonan <?php echo $row->nama_kategori; ?> dengan nomor <a href="">ID:<?php echo $row->id_surat; ?></a>
                            <?php elseif($row->status=== 'ditinjau'): ?>
                                Surat permohonan <a href=""><?php echo $row->name; ?></a> dengan nomor <a href="">ID:<?php echo $row->id_surat; ?></a> masih dalam status ditinjau
                            <?php endif ?>
                      </div>
                    </div><!-- End activity item-->
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </div>

                </div>
              </div><!-- End Recent Activity -->
            </div>
      </div>
    </section>

<?= $this->endSection() ?>