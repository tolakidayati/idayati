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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['id_petugas']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" id="nama_petugas" value="<?php echo empty(set_value('nama_petugas')) ? (empty($edit_data['nama_petugas']) ? "" : $edit_data['nama_petugas']) : set_value('nama_petugas'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username_petugas">Username</label>
                        <input type="text" name="username_petugas" id="username_petugas" value="<?php echo empty(set_value('username_petugas')) ? (empty($edit_data['username_petugas']) ? "" : $edit_data['username_petugas']) : set_value('username_petugas'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password_petugas">Password</label>
                        <input type="text" name="password_petugas" id="password_petugas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telp_petugas">Telepon</label>
                        <input type="text" name="telp_petugas" id="telp_petugas" value="<?php echo empty(set_value('telp_petugas')) ? (empty($edit_data['telp_petugas']) ? "" : $edit_data['telp_petugas']) : set_value('telp_petugas'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="level">Jabatan</label>
                        <input type="text" name="level" id="level" value="<?php echo empty(set_value('level')) ? (empty($edit_data['level']) ? "" : $edit_data['level']) : set_value('level'); ?>" class="form-control">
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
