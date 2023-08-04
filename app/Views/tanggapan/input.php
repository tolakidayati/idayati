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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['tgl_tanggapan']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="tgl_tanggapan">Tgl Tanggapan</label>
                        <input type="date" name="tgl_tanggapan" id="tgl_tanggapan" value="<?php echo empty(set_value('tgl_tanggapan')) ? (empty($edit_data['tgl_tanggapan']) ? "" : $edit_data['tgl_tanggapan']) : set_value('tgl_tanggapan'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tanggapan">Tanggapan</label>
                        <input type="text" name="tanggapan" id="tanggapan" value="<?php echo empty(set_value('tanggapan')) ? (empty($edit_data['tanggapan']) ? "" : $edit_data['tanggapan']) : set_value('tanggapan'); ?>" class="form-control">
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
