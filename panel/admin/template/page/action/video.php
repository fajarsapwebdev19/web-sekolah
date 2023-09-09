<!-- tambah foto -->
<div class="modal fade" id="tambah-video" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-video.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="">Judul Video</label>
              <input type="text" name="judul_video" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="">ID YT Video</label>
              <div class="mb-2">
                <div class="row">
                  <div class="col-md-6 col-8">
                    <input type="text" name="id_yt" class="form-control" required>
                  </div>
                </div>
              </div>
              <span class="text-small">
                Untuk Melakukan Pengambilan ID YT Video Anda. silahkan copy bagian belakang pada link watch/?v=2epglWOVJrI. contoh url : https://youtube/watch/?v=<span style="background-color: yellow; color: #000;">2epglWOVJrI</span> Anda Hanya Mengambil ID YTnya Saja
                Note : ID YT (Yang Ditandai Warna Kuning) Atau Liat Pada Menu Bantuan
              </span>
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
<!-- end tambah video -->

<!-- update video -->
<div class="modal fade" id="update-video" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-video.php" method="post" id="action-update" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>
<!-- end update video -->

<!-- view video -->
<div class="modal fade" id="view-video" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="action-view">
        
      </div>
    </div>
  </div>
</div>
<!-- end view video -->

<!-- delete video -->
<div class="modal fade" id="delete-video" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-video.php" method="post" id="action-delete">
        
      </form>
    </div>
  </div>
</div>
<!-- end delete foto -->