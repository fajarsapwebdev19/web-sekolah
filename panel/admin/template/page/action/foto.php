<!-- tambah foto -->
<div class="modal fade" id="tambah-foto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-foto.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="">Judul Foto</label>
              <input type="text" name="judul_foto" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" name="foto" class="form-control" required>
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
<!-- end tambah foto -->

<!-- update foto -->
<div class="modal fade" id="update-foto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-foto.php" method="post" id="action-update" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>
<!-- end update foto -->

<!-- view foto -->
<div class="modal fade" id="view-foto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="action-view">
        
      </div>
    </div>
  </div>
</div>
<!-- end view foto -->

<!-- delete foto -->
<div class="modal fade" id="delete-foto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Foto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-foto.php" method="post" id="action-delete">
        
      </form>
    </div>
  </div>
</div>
<!-- end delete foto -->