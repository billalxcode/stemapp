<?= $this->extend("admin/layout/app"); ?>

<?= $this->section('content'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Master Data</h1>
            <div class="section-header-breadcrumb">
                <?php foreach ($breadchumbs as $breadchumb) : ?>
                    <?php if ($breadchumb['active']) : ?>
                        <div class="breadcrumb-item active"><?= $breadchumb['name'] ?></div>
                    <?php else : ?>
                        <div class="breadcrumb-item"><a href="<?= $breadchumb['link'] ?>"><?= $breadchumb['name'] ?></a></div>
                    <?php endif ?>
                <?php endforeach ?>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Tambah Siswa</h2>

            <p class="section-lead">
                Kamu dapat menambah data siswa
            </p>

            <div class="row">
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    </div>
                <?php endif ?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data akun siswa</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('admin/siswa/next') ?>" method="post">
                                <?= csrf_field() ?>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="nik">NIK:</label>
                                            <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK" autofocus>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="nis">NIS:</label>
                                            <input type="text" name="nis" id="nis" class="form-control" placeholder="Masukan NIS">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="firstname">Nama Depan:</label>
                                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Masukan Nama Depan">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="lastname">Nama Belakang:</label>
                                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Masukan Nama Belakang">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="placebirth">Tempat Lahir:</label>
                                            <input type="text" name="placebirth" id="placebirth" class="form-control" placeholder="Masukan Tempat Lahir">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="datebirth">Tanggal Lahir:</label>
                                            <input type="date" name="datebirth" id="datebirth" class="form-control" placeholder="Masukan Tanggal Lahir">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="address">Alamat Lengkap:</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="Masukan Alamat Lengkap">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="gender">Jenis Kelamin:</label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="foto">Foto:</label>
                                            <input type="file" name="photo" id="foto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label for="classid">Kelas Grup:</label>
                                            <select name="classid" id="classid" class="form-control">
                                                <option value="" selected>Tidak diketahui</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Lanjut</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>