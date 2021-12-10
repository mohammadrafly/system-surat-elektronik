<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

          <div class="card">
            <div class="card-body mt-3">
                <form action="<?= base_url('/superadmin/update'); ?>" method="post">
                <?= csrf_field(); ?>
                    <input type="hidden" name="id_surat" value="<?= $surat['id_surat'] ?>" />
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">ID Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?= $surat['id_status']; ?>" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <label for="id_status" class="col-sm-2 col-form-label">Update ID Status</label>
                        <div class="col-sm-10">
                            <select name="id_status" id="id_status" class="form-select" aria-label="Default select example">
                                <option selected>klik untuk memilih</option>
                                    <option value="1">1 = Terima</option>
                                    <option value="2">2 = Tolak</option>
                                    <option value="3">3 = Tinjau</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url('superadmin/surat/delete/'.$surat['id_surat']); ?>" class="btn btn-danger">Delete</a>
                    </div>
                </form>
            </div>
        </div>

<?= $this->endSection() ?>