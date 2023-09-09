<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $method = mysqli_real_escape_string($con, $_POST['method']);

    $sql = mysqli_query($con, "SELECT * FROM registrasi_anggota WHERE registrasi_id='$id'");
    $data = mysqli_fetch_object($sql);

    if($method == "delete")
    {
        ?>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data Tersebut ?</p>
                <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="modal-footer">
                <button type="submit" name="delete" class="btn btn-success">Ya, Hapus</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
            </div>
        <?php
    }
    else if($method == "view")
    {
        ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Registrasi ID</label>
                    <input type="text" name="registrasi_id" class="form-control" value="<?= $data->registrasi_id; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= $data->nama; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" name="nik" class="form-control" value="<?= $data->nik; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <input type="text" name="jk" class="form-control" value="<?= $data->jk; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">No Telp</label>
                    <input type="text" name="no_telp" class="form-control" value="<?= $data->no_telp; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Asal Instansi</label>
                    <input type="text" name="asal_instansi" class="form-control" value="<?= $data->asal_instansi; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Daftar</label>
                    <?php
                        if($data->create_date == NULL)
                        {
                            $date = "";
                        }else{
                            $date = date('d-m-Y', strtotime($data->create_date));
                        }
                    ?>
                    <input type="text" name="create_date" class="form-control" value="<?= $date; ?>" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger">
                    Tutup
                </button>
            </div>
        <?php
    }
?>