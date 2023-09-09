<!-- tambah portal -->
<div class="modal fade" id="tambah-portal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Portal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-portal.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label for="">
                    Foto Portal
                </label>
                <input type="file" id="file" name="portal_picture" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Judul Portal
                </label>
                <input type="text" name="judul_portal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Content Portal
                </label>
                <textarea type="text" name="konten_portal" class="form-control edit" required></textarea>
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
<!-- end tambah portal -->

<!-- update portal -->
<div class="modal fade" id="update-portal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Portal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-portal.php" id="action-update" method="post" autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>
<!-- end update portal -->

<!-- delete confirm portal-->
<div class="modal fade" id="delete-portal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Portal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-portal.php" id="action-delete" method="post" autocomplete="off">
        
      </form>
    </div>
  </div>
</div>
<!-- end delete confirm portal -->