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
            <h2 class="section-title">Kelola Siswa</h2>

            <p class="section-lead">
                Kamu dapat mengelola, menambah, menghapus data siswa
            </p>

            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="card h-100">
                            <div class="card-header">
                                <h4>Semua Aksi</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <a href="<?= base_url('admin/siswa/create') ?>" class="btn btn-primary w-100">Tambah Data</a>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <button class="btn btn-primary w-100" disabled>Import Data</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="data-siswa">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Author</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Laravel 5 Tutorial: Introduction
                                                <div class="table-links">
                                                    <a href="#">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#" class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#">Web Developer</a>,
                                                <a href="#">Tutorial</a>
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="title" title="">
                                                    <div class="d-inline-block ml-1">Rizal Fakhri</div>
                                                </a>
                                            </td>
                                            <td>2018-01-20</td>
                                            <td>
                                                <div class="badge badge-primary">Published</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>