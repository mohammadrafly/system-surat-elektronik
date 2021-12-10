<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Data User</h3>
            </div>
            <div class="card-body">
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4>Periksa Entrian Form</h4>
                        </hr />
                        <?php echo session()->getFlashdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?= base_url('superadmin/tambah/proses'); ?>">
                    <?= csrf_field(); ?>
    
                        <div class="col-12">
                            <label for="username" class="form-label">Nama Pengguna (ex: budi123)</label>
                            <input type="text" name="username" class="form-control" id="username" required>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                        </div>

                        <div class="col-12">
                            <label for="password_conf" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_conf" class="form-control" id="password_conf" required>
                        </div>

                        <div class="col-12">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>

                        <div class="col-12">
                            <label for="phone_no" class="form-label">Nomor Hp</label>
                            <input type="number" name="phone_no" class="form-control" id="phone_no" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="col-12">
                        <label for="role" class="form-label">Pilih Role</label>
                                <select name="role" id="role" class="form-select" aria-label="Default select example">
                                    <option selected>Klik disini untuk memilih</option>
                                        <option value="user">User</option>
                                        <option value="analis_nk">Analis NK</option>
                                        <option value="analis_sk">Analis SK</option>
                                </select>
                        </div>
                        <br>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Tambah User</button>
                        </div>
    
                </form>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>