<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

    <div class="pagetitle">
      <h1>Master User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= base_url(); ?>/superadmin">Dashboard</a></li>
          <li class="breadcrumb-item">Master User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
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
                        <a href="<?= base_url('superadmin/tambah'); ?>"><span class="btn btn-secondary mb-3">Tambah</span></a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID User</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Nomor HP</th>
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
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['role']; ?></td>
                                            <td><?php echo $row['phone_no']; ?></td>
                                            <td><?php echo $row['created_at']; ?></td>
                                            <td>
                                                <a href="<?= base_url('superadmin/user/edit/'.$row['id']); ?>">
                                                    <span class="btn btn-primary btn-sm">edit</span>
                                                </a>
                                                <a href="<?= base_url('superadmin/user/delete/'.$row['id']); ?>">
                                                    <span class="btn btn-danger btn-sm">hapus</span>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<?= $this->endSection() ?>