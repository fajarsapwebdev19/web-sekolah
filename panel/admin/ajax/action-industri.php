<?php
    require '../../../connection/database_connect.php';

    $id = $_POST['id'];
    $method = $_POST['method'];

    $query = mysqli_query($con, "SELECT * FROM hub_industri WHERE id='$id'");
    $data = mysqli_fetch_object($query);

    if($method == "update")
    {
        ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Perusahaan</label>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="text" name="nama_perusahaan" class="form-control" value="<?= $data->nama_perusahaan ?>">
                </div>
                <div class="form-group">
                    <label for="">Logo</label>
                    <input type="file" name="logo" class="form-control">
                    <span class="text-small ml-2 mr-2">Ukuran File Max : 5 MB Ekstensi File : jpg,jpeg,png</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
        <?php
    }
    else if($method == "delete")
    {
        ?>
            <div class="modal-body">
                <input type="hidden" name="id" value="<?= $id; ?>">
                <p class="text-center">
                    Apakah Anda Yakin Ingin Hapus Data ? <?= $data->nama_perusahaan; ?>
                    <br><br>
                    <button type="submit" name="hapus" class="btn btn-success btn-sm">Ya</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
                </p>
            </div>
        <?php
    }
?>
