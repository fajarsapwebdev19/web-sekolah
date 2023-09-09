<!-- tambah akun -->
<div class="modal fade" id="tambah-akun" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-akun.php" method="post" class="needs-validation" novalidate autocomplete="off">
        <div class="modal-body">
            <div class="form-group">
                <label for="">
                    Nama
                </label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Jenis Kelamin
                </label>
                <div class="mt-1 mb-1">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" required>
                        <label class="custom-control-label" for="customRadioInline1">Laki-Laki</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" required>
                        <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">
                    Tanggal Lahir
                </label>
                <input type="text" name="tgl_lahir" class="form-control date" required>
            </div>
            <div class="form-group">
                <label for="">
                    Username
                </label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Password
                </label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Email
                </label>
                <input type="text" name="email" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end tambah akun -->

<!-- update akun -->
<div class="modal fade" id="update-akun" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-akun.php" id="up-user" method="post" autocomplete="off">
        
      </form>
    </div>
  </div>
</div>
<!-- end update akun -->

<!-- delete confirm akun -->
<div class="modal fade" id="delete-confirm" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-akun.php" id="delete-user" method="post" autocomplete="off">
        
      </form>
    </div>
  </div>
</div>
<!-- end delete confirm akun -->