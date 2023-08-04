<?php
echo $this->extend('template/index');
echo $this->section('content');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header -->
            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php echo csrf_field() ?>
                    <?php
                    if (current_url(true)->getSegment(2) == 'edit') {
                    ?>
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_pengaduan']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" value="<?php echo empty(set_value('nama_kategori')) ? (empty($edit_data['nama_kategori']) ? "" : $edit_data['nama_kategori']) : set_value('nama_kategori'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgl">Tanggal</label>
                        <input type="date" name="tgl" id="tgl" value="<?php echo empty(set_value('tgl')) ? (empty($edit_data['tgl']) ? "" : $edit_data['tgl']) : set_value('tgl'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" value="<?php echo empty(set_value('nik')) ? (empty($edit_data['nik']) ? "" : $edit_data['nik']) : set_value('nik'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_pengadu">Nama Pengadu</label>
                        <input type="text" name="nama_pengadu" id="nama_pengadu" value="<?php echo empty(set_value('nama_pengadu')) ? (empty($edit_data['nama_pengadu']) ? "" : $edit_data['nama_pengadu']) : set_value('nama_pengadu'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="<?php echo empty(set_value('alamat')) ? (empty($edit_data['alamat']) ? "" : $edit_data['alamat']) : set_value('alamat'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="no_telp">No Telepon</label>
                        <input type="text" name="no_telp" id="no_telp" value="<?php echo empty(set_value('no_telp')) ? (empty($edit_data['no_telp']) ? "" : $edit_data['no_telp']) : set_value('no_telp'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama_skpd">Telepon</label>
                        <input type="text" name="nama_skpd" id="nama_skpd" value="<?php echo empty(set_value('nama_skpd')) ? (empty($edit_data['nama_skpd']) ? "" : $edit_data['nama_skpd']) : set_value('nama_skpd'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kronologi">Kronologi</label>
                        <input type="text" name="kronologi" id="kronologi" value="<?php echo empty(set_value('kronologi')) ? (empty($edit_data['kronologi']) ? "" : $edit_data['kronologi']) : set_value('kronologi'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" value="<?php echo empty(set_value('status')) ? (empty($edit_data['status']) ? "" : $edit_data['status']) : set_value('status'); ?>" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();
