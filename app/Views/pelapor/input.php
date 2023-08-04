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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['nik']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="nik">Nik</label>
                        <input type="text" name="nik" id="nik" value="<?php echo empty(set_value('nik')) ? (empty($edit_data['nik']) ? "" : $edit_data['nik']) : set_value('nik'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Pelapor</label>
                        <input type="text" name="nama" id="nama" value="<?php echo empty(set_value('nama')) ? (empty($edit_data['nama']) ? "" : $edit_data['nama']) : set_value('nama'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" value="<?php echo empty(set_value('username')) ? (empty($edit_data['username']) ? "" : $edit_data['username']) : set_value('username'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Skpd</label>
                        <input type="text" name="nama" id="nama" value="<?php echo empty(set_value('nama')) ? (empty($edit_data['nama']) ? "" : $edit_data['nama']) : set_value('nama'); ?>" class="form-control">
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
