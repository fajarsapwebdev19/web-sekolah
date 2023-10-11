<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);

    session_start();

    $_SESSION['id'] = $id;
?>

<div class="modal-body">
    <div id="message"></div>
    <div class="form-group">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="">Jenis</label>
        <select class="form-control jn" name="jenis" id="" required>
            <option value="">Pilih</option>
            <option>Pembaruan</option>
            <option>Perbaikan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Deskripsi</label>
        <input type="text" name="deskripsi" class="form-control ds" required>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-success tambah-feature">Tambah</button>
    </div>
    <br><br>
    <div id="data-feature"></div>
</div>