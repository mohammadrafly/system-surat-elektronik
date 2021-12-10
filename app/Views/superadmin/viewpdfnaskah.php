<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">View Draft Naskah Kerjasama</h5>

              <!-- Horizontal Form -->
              <form>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">ID Surat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" value="<?= $surat['id_surat']; ?>" disabled>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Nama File</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" value="<?= $surat['draft_naskah']; ?>" id="inputEmail" disabled>
                  </div>
                </div>

                <iframe src="<?= base_url('uploads/'.$surat['draft_naskah']) ?>" height="1000" width="100%" title="Iframe Example"></iframe>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

<?= $this->endSection() ?>