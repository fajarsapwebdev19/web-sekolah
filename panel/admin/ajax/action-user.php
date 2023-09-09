<?php
    require '../../../connection/database_connect.php';
    $id_user = mysqli_real_escape_string($con, $_POST['id_user']);
    $method = mysqli_real_escape_string($con, $_POST['method']);

    // get data user by id
    $query = mysqli_query($con, "SELECT * FROM user WHERE id_user='$id_user'");
    $data  = mysqli_fetch_object($query);

    if($method == 'update')
    {
        ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">
                        Nama
                    </label>
                    <input type="hidden" name="user_id" value="<?= $id_user; ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $data->nama; ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Jenis Kelamin
                    </label>
                    <div class="mt-1 mb-1">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="jkup1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" <?php if($data->jk == "Laki-Laki"){echo 'checked';}?>>
                            <label class="custom-control-label" for="jkup1">Laki-Laki</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="jkup2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" <?php if($data->jk == "Perempuan"){echo 'checked';}?>>
                            <label class="custom-control-label" for="jkup2">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">
                        Tanggal Lahir
                    </label>
                    <?php
                        if($data->tgl_lahir == NULL)
                        {
                            $tl  = "";
                        }else{
                            $tl = date('d-m-Y', strtotime($data->tgl_lahir));
                        }
                    ?>
                    <input type="text" name="tgl_lahir" class="form-control date" value="<?= $tl ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Username
                    </label>
                    <input type="text" name="username" class="form-control" value="<?= $data->username; ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Password
                    </label>
                    <input type="text" name="password" class="form-control" value="<?= $data->password; ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Email
                    </label>
                    <input type="text" name="email" class="form-control" value="<?= $data->email; ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        <?php
    }else if($method == "delete")
    {
        ?>
            <div class="modal-body">
                <p>Apakah Anda Yakin Tetap Hapus Data ?</p>
                <input type="hidden" name="id_user" value="<?= $id_user; ?>">
            </div>
            <div class="modal-footer">
                <button type="submit" name="hapus" class="btn btn-success">
                    Hapus
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger">
                    Batal
                </button>
            </div>
        <?php
    }
?>

<script>
    // datepicker
    $('.date').datepicker({
      format: 'dd-mm-yyyy',
      autoHighlight: true,
      todayHighlight: true
    });
</script>