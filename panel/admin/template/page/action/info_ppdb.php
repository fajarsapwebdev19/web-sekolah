<!-- confirm new anggota -->
<div class="modal fade" id="tambah-info-ppdb" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Info PPDB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-info-ppdb.php" class="needs-validation" method="POST" novalidate>
        <div class="modal-body">
          <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Isi</label>
           <textarea name="isi" class="form-control edit" id="" cols="30" rows="10" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="tambah" class="btn btn-success">
            Tambah
          </button>
          <button type="button" data-dismiss="modal" class="btn btn-danger">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- end confirm new anggota -->

<!-- confirm delete reject new anggota -->
<div class="modal fade" id="update-info-ppdb" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ubah Info PPDB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-info-ppdb.php" method="POST" id="action-update-info-ppdb">

      </form>
    </div>
  </div>
</div>
<!-- end delete reject new anggota -->

<!-- view data new anggota -->
<div class="modal fade" id="delete-info-ppdb" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="proses/action-info-ppdb.php" id="confirm_delete_info">

      </form>
    </div>
  </div>
</div>
<!-- end view data new anggota -->