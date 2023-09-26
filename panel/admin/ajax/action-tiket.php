<?php
    session_start();
    require '../../../connection/database_connect.php';

    $no_ticket = mysqli_real_escape_string($con, $_POST['no_ticket']);
    $method = mysqli_real_escape_string($con, $_POST['method']);

    // get data
    $q = mysqli_query($con, "SELECT * FROM ticket WHERE no_ticket='$no_ticket'");
    $data = mysqli_fetch_object($q);

    if($method == "view")
    {
        ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">No Ticket</label>
                    <input type="text" class="form-control" disabled value="<?= $data->no_ticket; ?>">
                </div>
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="text" class="form-control" disabled value="<?= (empty($data->tanggal) ? "NULL" : date('d-m-Y', strtotime($data->tanggal))).' '. $data->waktu; ?>">
                </div>
                <div class="form-group">
                    <label for="">Perihal</label>
                    <input type="text" class="form-control" disabled value="<?= $data->perihal ?>">
                </div>
                <div class="form-group">
                    <label for="">Isi</label>
                    <textarea disabled id="" cols="30" rows="5" class="form-control"><?= $data->isi; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Lampiran</label>
                    <div class="card">
                        <div class="card-body">
                            <?php
                                if(empty($data->lampiran))
                                {
                                    ?>
                                        <div class="alert alert-info">Tidak Ada Lampiran</div>
                                    <?php
                                }else{
                                    ?>
                                        <img src="../assets/docs/tiket/T-ADDFTR-21483230920231635.png" style="width: 100%;" alt="">
                                    <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <?php
                        if($data->status == "Menunggu" || $data->status == "Proses")
                        {
                            ?>
                                <span class="badge badge-warning">
                                    Menunggu
                                </span>
                            <?php
                        }
                        else if($data->status == "Proses")
                        {
                            ?>
                                <span class="badge badge-info">
                                    Proses
                                </span>
                            <?php
                        }
                        else if($data->status == "Berhasil")
                        {
                            ?>
                                <span class="badge badge-success">
                                    Berhasil
                                </span>
                            <?php
                        }
                    ?>
                </div>
                <?php
                    if($data->status == "Selesai")
                    {
                        ?>
                            <div class="form-group">
                                <label for="">Balasan</label>
                                <textarea disabled id="" cols="30" rows="5" class="form-control"><?= $data->balasan; ?></textarea>
                            </div>
                        <?php
                    }
                ?>
            </div>
            <div class="modal-footer">

            </div>
        <?php
    }
?>