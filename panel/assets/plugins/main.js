// validation bs
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
     Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

// server-side data-anggota
$('.data-ptk').DataTable({
  processing: true,
  serverSide: true,
  "ajax": "server-side/data-ptk.php",
  // "fnRowCallback": function (nRow, aData, iDisplayIndex) {
  //   var info = $(this).DataTable().page.info();
  //   $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
  //   return nRow;
  // },
  "columnDefs":[
    {
      "targets": 0, // your case first column
      "className": "text-center"
    },
    {
      "targets":1,
      "className": "text-left"
    },
    {
      "targets":2,
      "className": "text-left"
    },
    {
      "targets":3,
      "className": "text-left"
    },
    // {
    //   "targets":4,
    //   "className": "text-center"
    // },
  ]
});

// server side user-panel
$('.akun-panel').DataTable({
  processing: true,
  serverSide: true,
  "ajax": "server-side/akun-panel.php",
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs":[
    {
      "targets":0,
      "className": "text-center"
    }, 
    {
      "targets":1,
      "className": "text-left"
    },
    {
      "targets":2,
      "className": "text-left"
    },
    {
      "targets":3,
      "className": "text-center"
    },
    {
      "targets":4,
      "className": "text-left"
    },
    {
      "targets":5,
      "className": "text-left"
    },
    {
      "targets":6,
      "className": "text-center"
    },
    {
      "targets":7,
      "className": "text-center"
    },
    {
      "targets":8,
      "className": "text-center"
    },
  ]
});

// update user
$(".akun-panel").on('click', '.update', function(){
  var id = $(this).data('id');

  $.ajax({
    url: "ajax/action-user.php",
    type: 'POST',
    data: {id_user:id, method: 'update'},
    success:function(response){
      $('#update-akun').modal('show');
      $('#up-user').html(response);
    }
  });
});

// delete user panel
$(".akun-panel").on('click', '.delete', function(){
  var id = $(this).data('id');

  $.ajax({
    url: "ajax/action-user.php",
    type: 'POST',
    data: {
      id_user: id,
      method: 'delete'
    },
    success:function(response)
    {
      $('#delete-confirm').modal('show');
      $('#delete-user').html(response);
    }
  })
});

// server side slider data
$('.slider-data').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": "server-side/slider-data.php",
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs": [
    {
      "targets": 0,
      "className": 'text-center'
    },
    {
      "targets": 1,
      "className": 'text-left'
    },
    {
      "targets": 2,
      "className": 'text-center'
    },
    {
      "targets": 3,
      "className": 'text-left'
    },
    {
      "targets": 4,
      "className": 'text-center'
    }
  ]
});

// update slider button action
$('.slider-data').on('click', '.update', function() {
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-slider.php",
    type: 'POST',
    data: {id:id, method: 'update'},
    success:function(response)
    {
      $('#update-slider').modal('show');
      $('#action-update').html(response);
    }
  });
});

// delete slider button action
$('.slider-data').on('click', '.delete', function() {
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-slider.php",
    type: 'POST',
    data: {id:id, method: 'delete'},
    success:function(response)
    {
      $('#delete-slider').modal('show');
      $('#action-delete').html(response);
    }
  });
});

// portal berita data server side
$('.portal-data').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": "server-side/portal-data.php",
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs":[
    {
      "targets":0,
      "className": 'text-center'
    },
    {
      "targets":1,
      "className": 'text-center'
    },
    {
      "targets":2,
      "className": 'text-left'
    },
    {
      "targets":3,
      "className": 'text-left'
    },
    {
      "targets":4,
      "className": 'text-center'
    }
  ]
});

// update action portal data
$('.portal-data').on('click', '.update', function(){
    var id = $(this).data("id");

    $.ajax({
      url: "ajax/action-portal.php",
      data: {id:id, method:'update'},
      type: 'POST',
      success:function(response)
      {
        $('#update-portal').modal('show');
        $('#action-update').html(response);
      }
    })
});

// delete action portal data
$('.portal-data').on('click', '.delete', function()
{
    var id = $(this).data("id");

    $.ajax({
      url: "ajax/action-portal.php",
      data: {id:id, method:'delete'},
      type: 'POST',
      success:function(response)
      {
        $('#delete-portal').modal('show');
        $('#action-delete').html(response);
      }
    })
});



// view data anggota
$('.data-ptk').on('click', '.view', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-anggota.php",
    data: {id:id, method: 'view'},
    type: 'POST',
    success:function(response)
    {
      $("#view-anggota").modal('show');
      $('#action-view').html(response);
    }
  });
});

// updata data anggota
$('.data-ptk').on('click', '.update', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-anggota.php",
    data: {id:id, method:'update'},
    type: 'POST',
    success:function(response)
    {
      $('#update-anggota').modal('show');
      $('#action-update').html(response);
    }
  });
});

// delete action data anggota
$('.data-ptk').on('click', '.delete', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-anggota.php",
    data: {id:id, method: 'delete'},
    type: 'POST',
    success:function(response)
    {
      $('#delete-anggota').modal('show');
      $('#action-delete').html(response);
    }
  });
});

// data-foto server side
$('.data-foto').DataTable({
  "processing":true,
  "serverSide":true,
  "ajax": "server-side/data-foto.php",
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs":[
    {
      "targets":0,
      "className": 'text-center',
    },
    {
      "targets":1,
      "className": 'text-left'
    },
    {
      "targets":2,
      "className": 'text-left'
    },
    {
      "targets":3,
      "className": 'text-center'
    },
    {
      "targets":4,
      "className": 'text-center'
    },
    {
      "targets":5,
      "className": 'text-center'
    },

  ]
});

// view data foto
$('.data-foto').on('click', '.view', function(){
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/action-foto.php',
    type: 'POST',
    data:{id:id, method:'view'},
    success:function(response)
    {
      $('#view-foto').modal('show');
      $('#action-view').html(response);
    }
  });
});

// update data foto
$('.data-foto').on('click', '.update', function(){
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/action-foto.php',
    type: 'POST',
    data: {id:id, method:'update'},
    success:function(response)
    {
      $('#update-foto').modal('show');
      $('#action-update').html(response);
    }
  });
});

// delete data foto
$('.data-foto').on('click', '.delete', function(){
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/action-foto.php',
    type: 'POST',
    data: {id:id, method: 'delete'},
    success:function(response)
    {
      $('#delete-foto').modal('show');
      $('#action-delete').html(response);
    }
  })
})

// data video server side
$('.data-video').DataTable({
  "processing":true,
  "serverSide":true,
  "ajax": "server-side/data-video.php",
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs":[
    {
      "targets":0,
      "className": 'text-center',
    },
    {
      "targets":1,
      "className": 'text-left'
    },
    {
      "targets":2,
      "className": 'text-center'
    },
    {
      "targets":3,
      "className": 'text-center'
    },
    {
      "targets":4,
      "className": 'text-center'
    }

  ]
});

// view video
$('.data-video').on('click', '.view', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-video.php",
    type: 'POST',
    data: {id:id, method: 'view'},
    success:function(response)
    {
      $('#view-video').modal('show');
      $('#action-view').html(response);
    }
  });
});

// update video 
$('.data-video').on('click', '.update', function() {
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-video.php",
    type: 'POST',
    data: {id:id, method:'update'},
    success:function(response)
    {
      $('#update-video').modal('show');
      $('#action-update').html(response);
    }
  });
});

// delete video
$('.data-video').on('click', '.delete', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-video.php",
    type: 'POST',
    data: {id:id, method: 'delete'},
    success:function(response)
    {
      $('#delete-video').modal('show');
      $('#action-delete').html(response);
    }
  });
});

// server side pendaftaran anggota
$('.data-new-anggota').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": 'server-side/new-data-ptk.php',
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs": [
    {
      "targets":0,
      "className": 'text-center'
    },
    {
      "targets":1,
      "className": 'text-left'
    },
    {
      "targets":2,
      "className": 'text-center'
    },
    {
      "targets":3,
      "className": 'text-center'
    },
    {
      "targets":4,
      "className": 'text-center'
    },
    {
      "targets":5,
      "className": 'text-center'
    },
    {
      "targets":6,
      "className": 'text-center'
    },
  ]
});

// waiting data in new Anggota
$('.waiting-new-anggota').DataTable({
  "processing": true,
  "serverSide": true,
  "ajax": 'server-side/waiting-anggota-data.php',
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs": [
    {
      "targets":0,
      "className": 'text-center'
    },
    {
      "targets":1,
      "className": 'text-left'
    },
    {
      "targets":2,
      "className": 'text-center'
    },
    {
      "targets":3,
      "className": 'text-center'
    },
    {
      "targets":4,
      "className": 'text-center'
    },
    {
      "targets":5,
      "className": 'text-center'
    },
    {
      "targets":6,
      "className": 'text-center'
    },
  ]
});

// waiting action confirm new anggota
$('.waiting-new-anggota').on('click', '.confirm', function() {
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/confirm_new_anggota.php',
    data: {id:id},
    type: 'POST',
    success:function(response)
    {
      $('#confirm-new-anggota').modal('show');
      $('#action-confirm').html(response);
    }
  });
});

// reject action delete new anggota
$('.reject-new-anggota').on('click', '.delete', function() {
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/method_new_anggota.php',
    data: {id:id, method: 'delete'},
    type: 'POST',
    success:function(response)
    {
      $('#delete-reject-data').modal('show');
      $('#action-delete').html(response);
    }
  })
})

$('.data-new-anggota').on('click', '.view_data', function() {
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/method_new_anggota.php',
    data: {id:id, method: 'view'},
    type: 'POST',
    success:function(response)
    {
      $('#view-data').modal('show');
      $('#method_view').html(response);
    }
  })
})

$('.reject-new-anggota').DataTable({
  "processing" : true,
  "serverSide" : true,
  "ajax" : "server-side/reject-new-anggota.php",
  "fnRowCallback": function (nRow, aData, iDisplayIndex) {
    var info = $(this).DataTable().page.info();
    $("td:nth-child(1)", nRow).html(info.start + iDisplayIndex + 1);
    return nRow;
  },
  "columnDefs": [
    {
      "targets":0,
      "className": 'text-center'
    },
    {
      "targets":1,
      "className": 'text-left'
    },
    {
      "targets":2,
      "className": 'text-center'
    },
    {
      "targets":3,
      "className": 'text-center'
    },
    {
      "targets":4,
      "className": 'text-center'
    },
    {
      "targets":5,
      "className": 'text-center'
    },
    {
      "targets":6,
      "className": 'text-center'
    },
  ]
});

$('.data-new-anggota').on('click', '.confirm', function() {
  var id = $(this).data("id");

  $.ajax({
    url: 'ajax/confirm_new_anggota.php',
    type: 'POST',
    data: {id:id},
    success:function(response)
    {
      $('#confirm-new-anggota').modal('show');
      $('#action-confirm').html(response);
    }
  });
});

$(".data-industri").DataTable({
  serverSide: true,
  processing: true,
  ajax: "server-side/industri.php"
});

$(".data-industri").on("click", '.update_industri', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-industri.php",
    data: 
    {
      "id": id,
      "method": "update"
    },
    type: "POST",
    success:function(respond)
    {
      $("#ubah-hub-industri").modal('show');
      $("#edit-industri").html(respond);
    }
  });
});

$(".data-industri").on("click", ".delete_industri", function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-industri.php",
    data: 
    {
      "id" : id,
      "method" : "delete"
    },
    type: "POST",
    success:function(respond)
    {
      $("#del-hub-industri").modal("show");
      $("#delete-industri").html(respond);
    }
  })
})

$(".info-ppdb").DataTable({
  serverSide: true,
  processing: true,
  ajax: "server-side/info-ppdb.php"
});

$(".info-ppdb").on('click', '.update', function(){
  var id = $(this).data("id");
  $.ajax({
    url: "ajax/action-info-ppdb.php",
    data: {
      "id" : id,
      "method": "update"
    },
    type: "POST",
    success:function(response)
    {
      $('#update-info-ppdb').modal("show");
      $("#action-update-info-ppdb").html(response);
    }
  });
});

$(".info-ppdb").on("click", ".delete", function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/action-info-ppdb.php",
    data: {
      "id" : id,
      "method": "delete"
    },
    type: "POST",
    success:function(response)
    {
      $("#delete-info-ppdb").modal('show');
      $("#confirm_delete_info").html(response);
    }
  });
});

var tiket_user = $('.user-tiket').DataTable({
    serverSide: true,
    processing: true,
    ajax: "server-side/user-tiket.php"
});

$('.user-tiket').on('click', '.view', function(){
    var no_ticket = $(this).data("id");

    $.ajax({
      url: "ajax/action-tiket.php",
      data: {
        "no_ticket" : no_ticket,
        "method" : "view"
      },
      type: "POST",
      success:function(respond)
      {
        $('#view-ticket').modal('show');
        $(".view-data-ticket").html(respond);
      }
    })
});

$('.user-tiket').on('click', '.cancel', function(){
    var no_ticket = $(this).data("id");

    $.ajax({
      url: "ajax/action-tiket.php",
      data: {
        "no_ticket" : no_ticket,
        "method" : "cancel"
      },
      type: "POST",
      success:function(respond)
      {
        $('#cancel-ticket').modal('show');
        $(".cancel-action").html(respond);
      }
    })
});

var tiket_admin = $('.tiket-view-admin').DataTable({
    serverSide: true,
    processing: true,
    ajax: "server-side/view-tiket-admin.php"
});

$(".tiket-view-admin").on('click', '.check', function(){
  var no_ticket = $(this).data("id");

  $.ajax({
    url: "ajax/action-tiket.php",
    data: {
      "method" : "check",
      "no_ticket" : no_ticket
    },
    type: "POST",
    success:function(respond)
    {
      $("#check-ticket").modal("show");
      $(".check-action").html(respond);
    }
  });
});

$(".reload-tiket").click(function(){
  tiket_admin.ajax.reload(0);
  tiket_user.ajax.reload(0);
});

$(".delete-info").click(function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/data-info-hd.php",
    data: {
      id : id
    },
    type: "POST",
    success:function(data){
      var i = JSON.parse(data);
      $("#confirm-delete").modal('show');
      $(".data").val(i.id);
    }
  })
})

$(".version-control").DataTable({
    serverSide: true,
    processing: true,
    ajax: "server-side/version-control.php"
});

$(".version-control").on("click", '.active', function(){
  var id = $(this).data("id");

  $.ajax({
    url : "ajax/get-data-version.php",
    data: {id:id},
    type: "POST",
    success:function(response)
    {
      var data = JSON.parse(response);
      $('#activate-version').modal("show");
      $('.id').val(data.id);
      $(".id").hide();
    }
  });
});

$(".version-control").on("click", ".delete", function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/get-data-version.php",
    data: {id:id},
    type: "POST",
    success:function(response)
    {
      var data = JSON.parse(response);
      $('#delete-version').modal("show");
      $('.id').val(data.id);
      $(".id").hide();
    }
  });
});
function view_feature(){
  $("#data-feature").load("ajax/data-version-feature.php");
}



$(".version-control").on("click", ".feature", function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/data-feature.php",
    data: {id:id},
    type: "POST",
    success:function(response)
    {
      $('#detail-version').modal('show');
      $("#form-detail").html(response);
      view_feature();
    }
  });
});

$("#form-detail").on("click", ".tambah-feature", function(){
  var input = $("#form-detail").serialize();

  var jenis = $('.jn').val();
  var deskripsi = $('.ds').val();

  if(jenis == "")
  {
    $("#message").html("<div class='alert alert-danger'>Pilih Salah Satu</div>");
    $("#message").fadeTo(3000, 5000).slideUp(1200, function() {
      $("#message").slideUp(600)
    });
  }
  else
  {
    if(deskripsi == "")
    {
      $("#message").html("<div class='alert alert-danger'>Masukan Deskripsi</div>");
      $("#message").fadeTo(3000, 5000).slideUp(1200, function() {
        $("#message").slideUp(600)
      });
    }
    else
    {
      $.ajax({
        url: "ajax/proses-feature.php",
        data: input,
        type: 'POST',
        success:function(response)
        {
          if(response == "null")
          {
            $("#message").html("<div class='alert alert-danger'>Lengkapi Data</div>");
            $("#message").fadeTo(3000, 5000).slideUp(1200, function() {
              $("#message").slideUp(600)
            });
          }
          else if(response == "berhasil")
          {
            $("#message").html("<div class='alert alert-success'>Berhasil Tambah Feature</div>");
            $("#message").fadeTo(3000, 5000).slideUp(1200, function() {
              $("#message").slideUp(600)
            });
            view_feature();
            $("#form-detail")[0].reset();
          }
        }
      });
    }
  } 
});

$("#form-detail").on('click', '.delete', function(){
  var id = $(this).data("id");

  $.ajax({
    url: "ajax/proses-delete-feature.php",
    data: {
      "id" : id
    },
    type: "POST",
    success:function(response)
    {
          if(response == "berhasil")
          {
            $("#message").html("<div class='alert alert-success'>Berhasil Hapus Data</div>");
            $("#message").fadeTo(3000, 5000).slideUp(1200, function() {
              $("#message").slideUp(600)
            });
            view_feature();
          }
    }
  })
})




// pause in close  modal video view
$('#view-video').on('hidden.bs.modal', function () {
  $('#yt-video').prop('src', '');
});


// datepicker
$('.date').datepicker({
  format: 'dd-mm-yyyy',
  autoHighlight: true,
  todayHighlight: true
});

// pasang page
$('#form-user-edit').load('ajax/profile-page.php');
$('#profile-detail').load('ajax/detail-profile.php');

// update password page
$('#alert').hide();

$('#update-password-page').load('ajax/form-update-password.php');


$('.showtelp').click(function() {
    $('#telp').show();
});
$('.hidetelp').click(function() {
    $('#telp').hide();
});

// show hide email
$('.showemail').click(function() {
    $('#email').show();
});
$('.hideemail').click(function() {
    $('#email').hide();
});

// show hide wa
$('.showwa').click(function() {
    $('#wa').show();
});
$('.hidewa').click(function() {
    $('#wa').hide();
});

// show hide fb
$('.showfb').click(function() {
    $('#fb').show();
});

$('.hidefb').click(function() {
    $('#fb').hide();
});

// show hide ig
$('.showig').click(function() {
    $('#ig').show();
});

$('.hideig').click(function() {
    $('#ig').hide();
});

// show hide yt
$('.showyt').click(function() {
    $('#yt').show();
});

$('.hideyt').click(function() {
    $('#yt').hide();
});

// auto close
$("#auto-close").fadeTo(5000, 5000).slideUp(800,function() 
{$("#auto-close").slideUp(300)});

// editor teks
$(document).ready(function() {
  $('.edit').summernote({
      placeholder: 'Tulis Sesuatu ...',
      tabsize: 4,
      tabDisable: true,
      height: 200,
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