<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

    <div class="pagetitle">
      <h1>Data User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/superadmin">Dashboard</a></li>
          <li class="breadcrumb-item">Data User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">List User</h5>
              <?php
                if(session()->getFlashData('message')){
                ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= session()->getFlashData('message') ?>
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
              <!-- Table with stripped rows -->
              <a href="<?= base_url('superadmin/tambah'); ?>"><span class="badge bg-secondary mb-3">Tambah</span></a>
              <table class="table table-bordered" id="users-list">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Id</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Nomor HP</th>
                      <th>Role</th>
                      <th>Email</th>
                      <th>Join</th>
                      <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($user): ?>
                    <?php 
                      $no = 1;
                      foreach($user as $row): ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['phone_no']; ?></td>
                      <td><?php echo $row['role']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['created_at']; ?></td>
                      <td>
                                <a href="<?= base_url('superadmin/user/edit/'.$row['id']); ?>">
                                  <span class="badge bg-primary">edit</span>
                                </a>
                                <a href="<?= base_url('superadmin/user/delete/'.$row['id']); ?>">
                                  <span class="badge bg-danger">hapus</span>
                                </a>
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