<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

    <div class="pagetitle">
      <h1><?= $title ?></h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/superadmin">Dashboard</a></li>
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

                <table class="table table-bordered" id="users-list">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Id Surat</th>
                      <th>Nama Pengirim</th>
                      <th>Perihal</th>
                      <th>Kategori</th>
                      <th>Status Kerjasama</th>
                      <th>Draft Naskah Kerjasama</th>
                      <th>File</th>
                      <th>File Draft Naskah</th>
                      <th>Dikirim</th>
                      <th>Diedit</th>
                      <th>Status</th>
                      <th>Opsi</th>
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
                      <td><?php echo $row->isi_surat; ?></td>
                      <td><?php echo $row->nama_kategori; ?></td>
                      <td><?php echo $row->nama_status_kerjasama; ?></td>
                      <td><?php echo $row->nama_dnk; ?></td>
                      <td><?php echo $row->file_surat; ?>
                          <a href="<?= base_url('superadmin/surat/viewpdf/'.$row->id_surat.'') ?>" class="badge bg-primary">
                            Lihat File
                          </a>
                      </td>
                      <td><?php echo $row->draft_naskah; ?>
                          <a href="<?= base_url('superadmin/surat/viewpdfnaskah/'.$row->id_surat.'') ?>" class="badge bg-primary">
                            Lihat File
                          </a>
                      </td>
                      <td><?php echo $row->created_at; ?></td>
                      <td><?php echo $row->updated_at; ?></td>
                      <td>
                            <?php if($row->status=== 'diterima'): ?>
                                <span class="badge bg-success"><?= $row->status?></span>
                            <?php elseif($row->status=== 'ditolak'): ?>
                                <span class="badge bg-danger"><?= $row->status?></span>
                            <?php elseif($row->status=== 'ditinjau'): ?>
                                <span class="badge bg-secondary"><?= $row->status?></span>
                            <?php endif ?>
                      </td>
                      <td>
                        <a href="<?= base_url('superadmin/surat/edit/'.$row->id_surat.'') ?>" class="badge bg-primary">Edit</a>
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