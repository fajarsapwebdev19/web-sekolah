<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div id="alert" class="alert">
                                <div class="msg"></div>
                            </div>
                            <form id="pass-upd">
                                <input type="hidden" id="username" name="username" value="<?= $data_user->username; ?>">
                                <div id="update-password-page"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->