<?php
  require '../../../connection/database_connect.php';
  
  $id = mysqli_real_escape_string($con, $_POST['id']);
  $method = mysqli_real_escape_string($con, $_POST['method']);

  // get data anggota by id
  $query = mysqli_query($con, "SELECT * FROM ptk WHERE id_anggota='$id'");
  $data = mysqli_fetch_object($query);

  // action view anggota
  if($method == "view")
  {
    ?>
       <div class="modal-body">
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" value="<?= $data->nama; ?>">
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <div class="mt-1 mb-1">
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="jk1" class="custom-control-input" value="Laki-Laki" <?php if($data->jk == "Laki-Laki"){echo 'checked';} ?>>
                <label class="custom-control-label" for="jk1">Laki-Laki</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="jk2" class="custom-control-input" value="Perempuan" <?php if($data->jk == "Perempuan"){echo 'checked';} ?>>
                <label class="custom-control-label" for="jk2">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Asal Instansi</label>
            <input type="text" class="form-control" value="<?= $data->asal_instansi; ?>">
          </div>
          <div class="form-group">
            <label for="">Jabatan</label>
            <input type="text" class="form-control" value="<?= $data->jabatan; ?>">
          </div>
          <div class="form-group">
            <label for="">Foto</label>
            <img src="../../assets/galeri/foto/anggota/<?= $data->foto; ?>" width="80" alt="">
          </div>
      </div>
    <?php
  }
  // action update anggota
  else if($method == "update")
  {
    ?>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Nama</label>
          <input type="text" class="form-control" name="nama" value="<?= $data->nama; ?>">
          <input type="hidden" name="id" value="<?= $id; ?>">
        </div>
        <div class="form-group">
          <label for="">Jenis Kelamin</label>
          <div class="mt-1 mb-1">
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="jku1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" <?php if($data->jk == "Laki-Laki"){echo 'checked';} ?>>
              <label class="custom-control-label" for="jku1">Laki-Laki</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="jku2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" <?php if($data->jk == "Perempuan"){echo 'checked';} ?>>
              <label class="custom-control-label" for="jku2">Perempuan</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="">Asal Instansi</label>
          <input type="text" name="asal_instansi" class="form-control" value="<?= $data->asal_instansi; ?>">
        </div>
        <div class="form-group">
          <label for="">Jabatan</label>
          <input type="text" name="jabatan" class="form-control" value="<?= $data->jabatan; ?>">
        </div>
        <div class="form-group">
          <label for="">Foto</label>
          <input type="file" name="foto" class="form-control">
          <span>Ukuran Max: 5 Mb Ekstensi File: jpg,jpeg,png</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
      </div>
    <?php
  }
  // action delete anggota
  else if($method == "delete")
  {
    ?>
      <div class="modal-body">
        <p>Apakah Anda Yakin Mau Hapus Data ?</p>
        <input type="hidden" name="id" value="<?= $id; ?>">
      </div>
      <div class="modal-footer">
        <button type="submit" name="hapus" class="btn btn-success">Hapus</button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
      </div>
    <?php
  }
?>