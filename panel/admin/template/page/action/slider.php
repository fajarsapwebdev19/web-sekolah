<!-- tambah slider -->
<div class="modal fade" id="tambah-slider" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-slider.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label for="">
                    Foto Slider
                </label>
                <input type="file" id="file" name="slider_picture" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Judul Slider
                </label>
                <input type="text" name="judul_slider" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">
                    Content Slider
                </label>
                <textarea type="text" name="content_slider" class="form-control edit" maxlength="300" required></textarea>
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
<!-- end tambah slider -->

<!-- update slider -->
<div class="modal fade" id="update-slider" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-slider.php" id="action-update" method="post" autocomplete="off" enctype="multipart/form-data">
        
      </form>
    </div>
  </div>
</div>
<!-- end update slider -->

<!-- delete confirm slider-->
<div class="modal fade" id="delete-slider" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Hapus Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="proses/action-slider.php" id="action-delete" method="post" autocomplete="off">
        
      </form>
    </div>
  </div>
</div>
<!-- end delete confirm slider -->