<!-- tambah anggota -->
<div class="modal fade" id="tambah-anggota" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-anggota.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="">Nama</label>
              <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin</label>
              <div class="mt-1 mb-1">
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="jk1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" required>
                  <label class="custom-control-label" for="jk1">Laki-Laki</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="jk2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" required>
                  <label class="custom-control-label" for="jk2">Perempuan</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Asal Instansi</label>
              <input type="text" name="asal_instansi" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Jabatan</label>
              <input type="text" name="jabatan" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" name="foto" class="form-control">
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
<!-- end tambah anggota -->

<!-- view anggota -->
<div class="modal fade" id="view-anggota" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="action-view" autocomplete="off">
        
      </form>
    </div>
  </div>
</div>
<!-- end view anggota -->

<!-- update anggota -->
<div class="modal fade" id="update-anggota" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-anggota.php" id="action-update" method="post" autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>
<!-- end update anggota -->

<!-- delete anggota -->
<div class="modal fade" id="delete-anggota" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Anggota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-anggota.php" id="action-delete" method="post" autocomplete="off">
        
      </form>
    </div>
  </div>
</div>
<!-- end delete anggota -->