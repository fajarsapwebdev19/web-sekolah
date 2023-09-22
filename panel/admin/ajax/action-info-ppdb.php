<?php
require '../../../connection/database_connect.php';

$id = mysqli_real_escape_string($con, $_POST['id']);

$query = mysqli_query($con, "SELECT * FROM info_ppdb WHERE info_id='$id'");
$data = mysqli_fetch_object($query);

if ($_POST['method'] == "update") {
?>
    <div class="modal-body">
        <input type="hidden" name="info_id" class="form-control" value="<?= $data->info_id; ?>" readonly>
        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="judul" class="form-control" value="<?= $data->judul; ?>">
        </div>
        <div class="form-group">
            <label for="">Isi</label>
            <textarea name="isi" class="edit form-control" id="" cols="30" rows="10"><?= $data->isi ?></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" name="simpan" class="btn btn-info">
            Ubah
        </button>
        <button type="button" data-dismiss="modal" class="btn btn-danger">
            Batal
        </button>
    </div>
<?php
}
else if($_POST['method'] == "delete")
{
    ?>
        <div class="modal-body">
            <p class="text-center">
                Apakah Anda Yakin Ingin Hapus Data Info Tersebut ?
                <input type="hidden" name="info_id" class="form-control" value="<?= $data->info_id; ?>" readonly>
                <br><br>
                <button type="submit" name="hapus" class="btn btn-success">Ya</button>
                <button type="button" data-dismiss="modal" class="btn btn-danger">Tidak</button>
            </p>
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
            ],
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                }
            }
        });
    });
</script>