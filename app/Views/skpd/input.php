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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['nama_skpd']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="nama_skpd">Skpd Terkait</label>
                        <input type="text" name="nama_skpd" id="nama_skpd" value="<?php echo empty(set_value('nama_skpd')) ? (empty($edit_data['nama_skpd']) ? "" : $edit_data['nama_skpd']) : set_value('nama_skpd'); ?>" class="form-control">
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
