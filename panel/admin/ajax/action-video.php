<?php
    require '../../../connection/database_connect.php';

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $method = mysqli_real_escape_string($con, $_POST['method']);

    $query = mysqli_query($con, "SELECT * FROM video_upload WHERE id_video='$id'");
    $data = mysqli_fetch_object($query);

    if($method == "view")
    {
        ?>  
            <div class="embed-responsive embed-responsive-16by9">
                <iframe src="<?= $data->link_embed; ?>" id="yt-video" class="embed-responsive-item" allowfullscreen="true" allowscriptaccess="always" frameborder="0"></iframe>
            </div>
        <?php
    }
    else if($method == "update")
    {
        ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Judul Video</label>
                    <input type="hidden" name="id" value="<?= $id; ?>">
                    <input type="text" name="judul_video" class="form-control" value="<?= $data->judul_file; ?>">
                </div>
                <div class="form-group">
                    <label for="">ID YT Video</label>
                    <div class="mb-2">
                        <div class="row">
                        <div class="col-md-6 col-8">
                            <input type="text" name="id_yt" class="form-control" value="<?= str_replace('https://youtube.com/embed/', '', $data->link_embed); ?>">
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
                <p>Apakah anda yakin ingin menghapus data ?</p>
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