<?php
session_start();
require '../../../connection/database_connect.php';

$user_session = $_SESSION['username'];

$query = mysqli_query($con, "SELECT * FROM user WHERE username='$user_session'");
$data_user = mysqli_fetch_object($query);
?>

<form id="update-user" class="needs-validation" novalidate>
    <div class="form-group">
        <label for="">
            Nama
        </label>
        <input type="hidden" name="username" value="<?= $data_user->username; ?>">
        <input type="text" name="nama" class="form-control" required value="<?= $data_user->nama; ?>">
    </div>
    <div class="form-group">
        <label for="">
            Jenis Kelamin
        </label>
        <div class="mt-2 mb-2">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="jk1" name="jenis_kelamin" class="custom-control-input" value="Laki-Laki" required <?php if ($data_user->jk == "Laki-Laki"){echo 'checked';} ?>>
                <label class="custom-control-label" for="jk1">Laki-Laki</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="jk2" name="jenis_kelamin" class="custom-control-input" value="Perempuan" required <?php if ($data_user->jk == "Perempuan") {echo 'checked';} ?>>
                <label class="custom-control-label" for="jk2">Perempuan</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="">
            Tanggal Lahir
        </label>
        <input type="text" name="tgl_lahir" class="form-control" required value="<?= date('d-m-Y', strtotime($data_user->tgl_lahir)) ?>">
    </div>
    <div class="form-group">
        <label for="">
            Email
        </label>
        <input type="text" name="email" class="form-control" required value="<?= $data_user->email; ?>">
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-success update">
            Ubah Data
        </button>
    </div>
</form>


<script src="../../assets/plugins/jquery/jquery.min.js"></script>
<script>
    // validasi ketika berhasil update user
    $('.success-msg').hide();
    $('.msg').html('<em class="fas fa-check-circle"></em> Berhasil Update Data');

    $('.update').click(function() {

      var data = $('#update-user').serialize();

      $.ajax({
        url: "proses/update_user.php",
        data: data,
        type: 'POST',
        success:function(response)
        {
          if(response == "Berhasil")
          {
            $('.success-msg').show();
            $('#custom-message').addClass('alert-success');
            $('.msg').html('<em class="fas fa-check-circle"></em> Berhasil Update Data');
            $('#profile-detail').load('ajax/detail-profile.php');
            $(".success-msg").fadeTo(2000, 500).slideUp(500,      function() {$(".success-msg").slideUp(500);
            });
          }
        }
      })
    })
</script>
