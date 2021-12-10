<?= $this->extend('layouts/app2') ?>

<?= $this->section('content') ?>

<section class="section dashboard">
      <div class="row">
            <div class="col-lg-12">
              <!-- Recent Activity -->
              <div class="card">

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

                </div>
              </div><!-- End Recent Activity -->
            </div>
      </div>
</section>
<?= $this->endSection() ?>