<!-- Tambah Jadwal -->
<div class="modal fade" id="confirm-delete" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Hapus Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="proses/action-info-hd.php" method="post">
                <div class="modal-body">
                    <p class="text-center">
                        <input type="hidden" name="id" class="form-control data">
                        Apakah Anda Yakin Ingin Menghapus Info Tersebut ?
                        <br><br>
                        <button type="submit" name="yakin" class="btn btn-success">Ya</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>