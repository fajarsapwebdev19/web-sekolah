<?php
  require '../../../connection/database_connect.php';

  $id = mysqli_real_escape_string($con, $_POST['id']);
  $method = mysqli_real_escape_string($con, $_POST['method']);
  $query = mysqli_query($con, "SELECT * FROM foto_upload WHERE id_foto='$id'");
  $data = mysqli_fetch_object($query);

  if($method == "view")
  {
    ?>
      <div class="modal-body">
        <img src="../../assets/galeri/foto/<?= $data->file; ?>" alt="" style="max-width:100%; width:100%;">
      </div>
    <?php
  }
  else if($method == "update")
  {
    ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Judul Foto</label>
          <input type="hidden" name="id" value="<?= $id; ?>">
          <input type="text" name="judul_foto" class="form-control" value="<?= $data->judul_file; ?>">
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <input type="file" name="foto" class="form-control">
          <span class="text-small ml-2 mr-2">Ukuran File Max : 5 MB Ekstensi File : jpg,jpeg,png</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="ubah" class="btn btn-info">
          Ubah
        </button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">
          Batal
        </button>
      </div>
    <?php
  }
  else if($method == "delete")
  {
    ?>
      <div class="modal-body">
        <p>Apakah Anda Yakin Mau Hapus Data ?</p>
        <input type="hidden" name="id" value="<?= $id; ?>">
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