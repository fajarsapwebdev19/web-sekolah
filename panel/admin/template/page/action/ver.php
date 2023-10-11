<div class="modal fade" id="add" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Versi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-ver.php" method="post">
        <div class="modal-body">
            <div class="form-group">
                <label for="">Versi</label>
                <input type="text" name="versi" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="add" class="btn btn-success">
                Tambah
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">
                Batal
            </button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="activate-version" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Aktivasi Versi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-ver.php" method="post">
        <div class="modal-body">
          <input type="text" name="id" class="form-control id">
          <p class="text-center">
            Apakah Anda Yakin Ingin Mengaktifkan Versi Tersebut ?
            <br><br>
            <button type="submit" name="activate" class="btn btn-success">
                Ya
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">
                Tidak
            </button>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="delete-version" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Versi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-ver.php" method="post">
        <div class="modal-body">
          <input type="text" name="id" class="form-control id">
          <p class="text-center">
            Apakah Anda Yakin Ingin Hapus Versi Tersebut ?
            <br><br>
            <button type="submit" name="delete" class="btn btn-success">
                Ya
            </button>
            <button type="button" data-dismiss="modal" class="btn btn-danger">
                Tidak
            </button>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="detail-version" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Detail Versi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-detail" method="post">
        
      </form>
    </div>
  </div>
</div>