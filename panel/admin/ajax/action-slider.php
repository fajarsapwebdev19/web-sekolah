<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $method = mysqli_real_escape_string($con, $_POST['method']);

    // get data user by id
    $query = mysqli_query($con, "SELECT * FROM slider_data WHERE id='$id'");
    $data = mysqli_fetch_object($query);

    if($method == "update")
    {
        ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">
                        Foto Slider Baru
                    </label>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="file" id="file" name="slider_picture" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="">
                        Judul Slider
                    </label>
                    <input type="text" name="judul_slider" class="form-control" value="<?= $data->judul_slider; ?>">
                </div>
                <div class="form-group">
                    <label for="">
                        Content Slider
                    </label>
                    <textarea type="text" name="content_slider" class="form-control edit"><?= $data->kontent_slider; ?></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="ubah" class="btn btn-info">
                    Ubah
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger">
                    Batal
                </button>
            </div>
        <?php
    }
    else if($method == "delete")
    {
        ?>
            <div class="modal-body">
                <p>
                    Apakah Anda Yakin Ingin Menghapus Data ?
                </p>
                <input type="hidden" name="id" value="<?= $id; ?>">
            </div>
            <div class="modal-footer">
                <button type="submit" name="hapus" class="btn btn-success">
                    Hapus
                </button>
                <button type="button" data-dismiss="modal" class="btn btn-danger">
                    Batal
                </button>
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