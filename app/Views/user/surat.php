<?= $this->extend('layouts/app2') ?>

<?= $this->section('content') ?>

        <div class="container">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Surat Permohonan</h5>

              <div class="container mt-3">
                <?php
                if(session()->getFlashData('message')){
                ?>
                  <div class="alert alert-success alert-dismissible fade show" id_kategori="alert">
                      <?= session()->getFlashData('message') ?>
                      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php
                }
                ?>
                <form method="post" action="<?= base_url('/user/surat/proses'); ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>
                  <div class="row mb-3">
                    <label for="isi_surat" class="col-sm-2 col-form-label">Perihal</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="isi_surat" id="isi_surat" style="height: 100px"></textarea>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="id_kategori" class="col-sm-2 col-form-label">Pilih Kategori</label>
                        <div class="col-sm-10">
                            <select name="id_kategori" id="id_kategori" class="form-select" aria-label="Default select example">
                                <option selected>Klik disini untuk memilih</option>
                                <option value="1">Dalam Negri</option>
                                <option value="2">Luar Negri</option>
                            </select>
                        </div>
                  </div>
                  <div class="row mb-3">
                    <label for="id_status_kerjasama" class="col-sm-2 col-form-label">Pilih Status Kerjasama</label>
                        <div class="col-sm-10">
                            <select name="id_status_kerjasama" id="id_status_kerjasama" class="form-select" aria-label="Default select example">
                                <option selected>Klik disini untuk memilih</option>
                                <option value="1">Baru</option>
                                <option value="2">Perpanjang</option>
                            </select>
                        </div>
                  </div>
                  <div class="row mb-3">
                    <label for="id_dnk" class="col-sm-2 col-form-label">Pilih Kategori Draft Naskah Kerjasama </label>
                        <div class="col-sm-10">
                            <select name="id_dnk" id="id_dnk" class="form-select" aria-label="Default select example">
                                <option selected>Klik disini untuk memilih</option>
                                <option value="1">Rencana Kerjasama</option>
                                <option value="2">Kesempatan Bersama/MOU</option>
                                <option value="3">Perjanjian Kerjasama EKS</option>
                            </select>
                        </div>
                  </div>
                  <div class="form-group mb-3">
                    <label for="">File</label>
                    <input type="file" name="file_surat" required="" class="form-control">
                  </div>
                  <div class="form-group mb-3">
                    <label for="">Draft Naskah</label>
                    <input type="file" name="draft_naskah" required="" class="form-control">
                  </div>
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    File/Draft Naskah harus berformat .pdf
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Upload</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

<?= $this->endSection() ?>