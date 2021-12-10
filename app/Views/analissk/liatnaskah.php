<?= $this->extend('layouts/analissk') ?>

<?= $this->section('content') ?>

    <div class="pagetitle">
      <h1><?= $title ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/analis/nk">Dashboard</a></li>
          <li class="breadcrumb-item"><?= $title ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $title ?></h5>
                <table class="table table-bordered" id="users-list">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Surat</th>
                      <th>Nama Pengirim</th>
                      <th>Status Kerjasama</th>
                      <th>Draft Naskah Kerjasama</th>
                      <th>File Draft Naskah</th>
                      <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($content): ?>
                    <?php 
                      $no = 1;
                      foreach($content as $row): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row->id_surat; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->nama_status_kerjasama; ?></td>
                      <td><?php echo $row->nama_dnk; ?></td>
                      <td><?php echo $row->file_surat; ?>
                          <a href="<?= base_url('analis/sk/viewpdfnaskah/'.$row->id_surat.'') ?>" class="badge bg-primary">
                            Lihat File
                          </a>
                      </td>
                      <td>
                            <?php if($row->status=== 'diterima'): ?>
                                <span class="badge bg-success">pending</span>
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