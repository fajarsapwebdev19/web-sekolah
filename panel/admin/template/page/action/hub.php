<div class="modal fade" id="tambah-hub-industri" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-industri.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="">Nama Perusahaan</label>
              <input type="text" name="nama_perusahaan" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Logo</label>
              <input type="file" name="logo" class="form-control" required>
              <span class="text-small ml-2 mr-2">Ukuran File Max : 5 MB Ekstensi File : jpg,jpeg,png</span>
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

<div class="modal fade" id="ubah-hub-industri" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-industri.php" id="edit-industri" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="del-hub-industri" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Perusahaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-industri.php" id="delete-industri" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>