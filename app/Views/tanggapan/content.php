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
            <div class="card-body">
                <?php
                if (session()->getFlashdata('success')) {
                ?>
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h5><i class="icon fas fa-check"></i> Success</h5>
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php
                }
                ?>

                <?php
                if (session()->getFlashdata('error')) {
                ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h5><i class="icon fas fa-danger"></i> Error</h5>
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php
                }
                ?>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/tanggapan/tambah"><i class="fa-solid fa-plus"></i> Tambah Tanggapan</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Tgl Tanggapan</th>
                            <th>Tanggapan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_tanggapan as $r) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r['tgl_tanggapan']; ?></td>
                                <td><?php echo $r['tanggapan']; ?></td>
                                <td>
                                    <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/tanggapan/edit/<?php echo $r['tgl_tanggapan']; ?>"><i class="fa-solid fa-edit"></i></a>
                                    <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['tgl_tanggapan']; ?>);"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

<script>
    function hapusConfig(id) {
        Swal.fire({
            title: 'Anda yakin akan menghapus data ini?',
            text: "Data akan dihapus secara permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?php echo base_url(); ?>/tanggapan/hapus/' + id;
            }
        })
    }
</script>
<?php
echo $this->endSection();