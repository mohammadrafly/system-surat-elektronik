<?= $this->extend('layouts/superad') ?>

<?= $this->section('content') ?>

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url(); ?>/superadmin">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="<?= base_url('backend_assets/img/user.png'); ?>" alt="Profile" class="rounded-circle">
                        <h2><?= session()->get('name'); ?></h2>
                        <h3><?= session()->get('username'); ?></h3>
                    </div>
                </div>

                </div>

                <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>

                    </ul>
                    <div class="tab-content pt-2">

                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <h5 class="card-title">Profile Details</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                            <div class="col-lg-9 col-md-8"><?= session()->get('name'); ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Username</div>
                            <div class="col-lg-9 col-md-8"><?= session()->get('username'); ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Nomor Telp</div>
                            <div class="col-lg-9 col-md-8"><?= session()->get('phone_no'); ?></div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Hak Akses</div>
                            <div class="col-lg-9 col-md-8"><?= session()->get('role'); ?></div>
                        </div>

                        </div>

                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    </div><!-- End Bordered Tabs -->

                    </div>
                </div>

                </div>
            </div>
        </section>

<?= $this->endSection() ?>