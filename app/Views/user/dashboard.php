<?= $this->extend('layouts/app2') ?>

<?= $this->section('content') ?>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <!-- Aktifitas Surat -->  
          <div class="card-body">
                  <h5 class="card-title">Aktifitas Surat<span></span></h5>

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
          <!-- endAktifitas Surat -->
          <div class="card">
            <div class="card-body">
              <?php
                if(session()->getFlashData('diterima')){
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= session()->getFlashData('diterima') ?>
                      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                }
                ?>
                <?php
                if(session()->getFlashData('berhasil')){
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= session()->getFlashData('berhasil') ?>
                      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                }
                ?>

                <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Surat</th>
                      <th>ID User</th>
                      <th>Perihal</th>
                      <th>Kategori</th>
                      <th>Status Kerjasama</th>
                      <th>Dikirim</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($suratByID): ?>
                    <?php 
                      $no = 1;
                      foreach($suratByID as $row): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->id_surat; ?></td>
                      <td><?php echo $row->id_user; ?></td>
                      <td><?php echo $row->isi_surat; ?></td>
                      <td><?php echo $row->nama_kategori; ?></td>
                      <td><?php echo $row->nama_status_kerjasama; ?></td>
                      <td><?php echo $row->created_at; ?></td>
                      <td>
                            <?php if($row->status=== 'diterima'): ?>
                                <span class="badge bg-success"><?= $row->status?></span>
                            <?php elseif($row->status=== 'ditolak'): ?>
                                <span class="badge bg-danger"><?= $row->status?></span>
                            <?php elseif($row->status=== 'ditinjau'): ?>
                                <span class="badge bg-secondary"><?= $row->status?></span>
                            <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              </div>
          </div>

        </div>
      </div>
    </section>

<?= $this->endSection() ?>