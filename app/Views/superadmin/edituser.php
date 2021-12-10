<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit User</h3>
            </div>
            <div class="card-body">
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
                <form method="post" action="<?= base_url('superadmin/user/proses'); ?>">
                    <?= csrf_field(); ?>
                        <input type="hidden" name="id" id="id" value="<?php echo $user['id']; ?>">
                        <div class="col-12">
                            <label for="username" class="form-label">Nama Pengguna</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?php echo $user['username']; ?>">
                        </div>

                        <div class="col-12">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo $user['name']; ?>">
                        </div>

                        <div class="col-12">
                            <label for="phone_no" class="form-label">Nomor Hp</label>
                            <input type="text" name="phone_no" class="form-control" id="phone_no" value="<?php echo $user['phone_no']; ?>">
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $user['email']; ?>">
                        </div>
                        <div class="col-12">
                            <label for="role" class="form-label">Pilih Role</label>
                                <select name="role" id="role" class="form-select" aria-label="Default select example">
                                        <option selected><?php echo $user['role']; ?></option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                </select>
                        </div>
                        <br>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Simpan</button>
                        </div>
    
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>