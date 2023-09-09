<!-- Tambah Jadwal -->
<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="proses/tambah_jadwal.php" method="post">
                <div class="modal-body">
                    <div class="kolom kolom-duplikat">
                        <div class="form-group row">
                            <label>Hari</label>
                            <select name="hari[]" class="form-control">
                                <option value="">--Pilih--</option>
                                <option>Senin</option>
                                <option>Selasa</option>
                                <option>Rabu</option>
                                <option>Kamis</option>
                                <option value="Jumat">Jum'at</option>
                                <option>Sabtu</option>
                                <option>Minggu</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label>Mulai</label>
                            <input type="text" name="mulai[]" class="form-control">
                        </div>
                        <div class="form-group row">
                            <label>Selesai</label>
                            <input type="text" name="selesai[]" class="form-control">
                        </div>
                        <div class="form-group row">
                            <label>Kegiatan</label>
                            <input type="text" name="kegiatan[]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success tambah-kolom"><em class="fas fa-plus"></em></button>
                    <button type="submit" name="tambah" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="copy" style="display: none;">
    <div class="kolom mt-2">
        <div class="form-group row">
            <label>Hari</label>
            <select name="hari[]" class="form-control">
                <option value="">--Pilih--</option>
                <option>Senin</option>
                <option>Selasa</option>
                <option>Rabu</option>
                <option>Kamis</option>
                <option value="Jumat">Jum'at</option>
                <option>Sabtu</option>
                <option>Minggu</option>
            </select>
        </div>
        <div class="form-group row">
            <label>Mulai</label>
            <input type="text" name="mulai[]" class="form-control">
        </div>
        <div class="form-group row">
            <label>Selesai</label>
            <input type="text" name="selesai[]" class="form-control">
        </div>
        <div class="form-group row">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan[]" class="form-control">
        </div>

        <br>
        <button class="btn btn-danger remove" type="button"><i class="fas fa-times"></i> Remove</button>
    </div>
</div>