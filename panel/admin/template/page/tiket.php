<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tiket</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if($data_user->is_developer == 0)
                        {
                            ?>
                                <button type="button" data-toggle="modal" data-target="#open_ticket"
                                class="btn btn-primary mb-4"><em class="fas fa-plus"></em> Open Ticket</button>

                                <div class="modal fade" id="open_ticket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Open Tiket</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <form action="proses/action-ticket.php" method="post" class="needs-validation" novalidate autocomplete="off" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Perihal*</label>
                                                        <select name="perihal" id="" class="form-control" required>
                                                            <option value="">Pilih</option>
                                                            <option>Perbaikan</option>
                                                            <option>Tambah Fitur</option>
                                                            <option>Kendala</option>
                                                            <option>Tambah User</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Pesan*</label>
                                                        <textarea name="isi" cols="30" rows="10" class="form-control" required></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Lampiran</label>
                                                        <input type="file" name="lampiran" class="form-control">
                                                        <span class="text-small ml-2 mr-2">Ukuran File Max : 5 MB Ekstensi File : jpg,jpeg,png</span>
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
                            <?php
                        }
                    ?>

                    <?php
                        if(isset($_SESSION['val']))
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-success reload-tiket mb-2"><em class="fas fa-sync"></em> Reload Data</button>
                            <div class="table-responsive-xl">
                                <table class="table table-hover <?= ($data_user->is_developer == 1 ? 'tiket-view-admin' : 'user-tiket')?>">
                                    <thead>
                                        <tr>
                                            <th>No Ticket</th>
                                            <th>Username</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Perihal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require 'action/tiket.php'; ?>