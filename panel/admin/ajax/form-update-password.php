<div class="form-group pmd-textfield">
    <label for="">Password Lama</label>
    <input type="password" id="pass-lama" name="password_lama" class="form-control">
</div>
<div class="form-group pmd-textfield">
    <label for="">Password Baru</label>
    <input type="password" id="pass-baru" name="password_baru" class="form-control">
</div>
<div class="form-group pmd-textfield">
    <label for="">Konfirmasi Password Baru</label>
    <input type="password" id="kon-pass-baru" name="konfirmasi_password_baru" class="form-control">
</div>
<button type="submit" class="btn btn-success up-pass">
    Update Password
</button>
<script>
    $(document).ready(function() {
      $('.up-pass').on('click', function() {
        
        // validation
        $('#pass-upd').validate({
                rules: {
                    password_lama: "required",
                    password_baru: "required",
                    konfirmasi_password_baru: {
                        required: true,
                        equalTo: "#pass-baru"
                    }
                },
                messages: {
                    password_baru: "Password Baru Kosong",
                    password_lama: "Password Lama Kosong",
                    konfirmasi_password_baru: {
                        required: "Konfirmasi Password Kosong",
                        equalTo: "Konfirmasi Password Tidak Sama"
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                },
                submitHandler: function(f){

                    // jika form dalam keadaan terisi semua

                    var username = $("#username").val();
                    var pass_lama = $("#pass-lama").val();
                    var pass_baru = $("#pass-baru").val();
                    var kon_pass_baru = $("#kon-pass-baru").val();

                    // ubah data password ke dalam sebuah database
                    $.ajax({
                        url: "proses/update-pass.php",
                        type: 'POST',
                        data: {
                            username: username,
                            password_baru: pass_baru,
                            password_lama: pass_lama,
                            konfirmasi_password_baru: kon_pass_baru
                        },
                        success:function(response)
                        {
                            // jika password lama tidak sama
                            if(response == "pass-lama-invalid")
                            {
                                $('#alert').show();
                                $('#alert').addClass("alert-danger");
                                $('#alert').removeClass('alert-warning');
                                $('#alert').removeClass("alert-success");    
                                $('.msg').html("Password Lama Tidak Sama");
                                $('#update-password-page').load('ajax/form-update-password.php');
                                $("#alert").fadeTo(2000, 500).slideUp(500,      function() {$(".success-msg").slideUp(5000);
                                });
                            }
                            // jika konfirmasi password tidak sama
                            else if(response == "konf-pass-invalid")
                            {
                                $('#alert').show();
                                $('#alert').addClass("alert-warning");
                                $('#alert').removeClass('alert-danger');
                                $('#alert').removeClass("alert-success");
                                $('.msg').html("Konfirmasi Password Baru Tidak Sama");
                                $('#update-password-page').load('ajax/form-update-password.php');
                                $("#alert").fadeTo(2000, 500).slideUp(500,      function() {$(".success-msg").slideUp(5000);
                                });
                            }
                            // jika berhasil melakukan ubah password
                            else{
                                $('#alert').show();
                                $('#alert').addClass("alert-success");
                                $('#alert').removeClass('alert-danger');
                                $('#alert').removeClass("alert-warning");
                                $('.msg').html("Berhasil Ubah Password");
                                $('#update-password-page').load('ajax/form-update-password.php');
                                $("#alert").fadeTo(2000, 500).slideUp(500,      function() {$(".success-msg").slideUp(5000);
                                });
                            }
                        }
                    });
                }
        });
      });
    });
</script>