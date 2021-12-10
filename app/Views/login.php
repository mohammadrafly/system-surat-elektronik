<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <div class="d-flex justify-content-center py-4">
                        <a href="#" class="d-flex align-items-center w-auto">
                            <img src="<?php echo base_url('backend_assets/img/logo.svg'); ?>" alt="" width="100px">
                        </a>
                    </div><!-- End Logo -->
                    <h5 class="card-title text-center pb-0 fs-4">Masuk ke akun Anda</h5>
                    <p class="text-center small">Masukkan nama pengguna & kata sandi Anda untuk masuk</p>
                  </div>
                  <?php if (!empty(session()->getFlashdata('error'))) : ?>
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <?php echo session()->getFlashdata('error'); ?>
                      </div>
                  <?php endif; ?>
                  <form class="row g-3 needs-validation" novalidate method="post" action="<?= base_url('login/proses'); ?>">
                  <?= csrf_field() ?>
                    <div class="col-12">
                      <label for="username" class="form-label">Nama Pengguna</label>
                      <input type="text" name="username" class="form-control" id="username" required>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Kata Sandi</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Masuk</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

<?= $this->endSection() ?>