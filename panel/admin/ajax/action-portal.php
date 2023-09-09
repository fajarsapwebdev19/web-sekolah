<?php
  require '../../../connection/database_connect.php';

  $id = mysqli_real_escape_string($con, $_POST['id']);
  $method = mysqli_real_escape_string($con, $_POST['method']);

  $query = mysqli_query($con, "SELECT * FROM portal WHERE portal_id='$id'");
  $data = mysqli_fetch_object($query);

  // method update portal
  if($method == "update")
  {
    ?>
      <div class="modal-body">
            <div class="form-group">
                <label for="">
                    Foto Portal Baru
                </label>
                <input type="file" id="file" name="portal_picture" class="form-control">
                <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="form-group">
                <label for="">
                    Judul Portal
                </label>
                <input type="text" name="judul_portal" class="form-control" value="<?= $data->judul_portal; ?>">
            </div>
            <div class="form-group">
                <label for="">
                    Content Portal
                </label>
                <textarea type="text" name="konten_portal" class="form-control edit"><?= $data->konten_portal; ?></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" name="ubah" class="btn btn-info">Ubah</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        </div>
    <?php
  }
  // method delete portal
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

<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit').summernote({
            placeholder: 'Tulis Sesuatu ...',
            tabsize: 4,
            disableDragAndDrop: true,
            shortcuts: true,
            tabDisable: true,
            height: 100,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']]
            ],callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
    });
</script>