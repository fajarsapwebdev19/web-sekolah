<!-- form registrasi anggota -->

<section id="registrasi-anggota" class="registrasi-anggota">
     <div class="container">
         <div class="title">
             <h4>Pendaftaran Anggota</h4>
             <hr>
         </div>
         <div class="register">
             <div id="alert" class="alert">
                <div class="message">

                </div>
             </div>
             <p>Keterangan : <span class="text-danger">*</span> Wajib Di Isi</p>
             <form id="form-anggota" autocomplete="off">
                 <div class="form-group">
                     <label for="">Nama Lengkap<span class="text-danger">*</span></label>
                     <input type="text" name="nama" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="">Jenis Kelamin<span class="text-danger">*</span></label>
                     <div class="mt-2">
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki">
                             <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                         </div>
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan">
                             <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                         </div>
                     </div>
                 </div>
                 <div class="form-group">
                     <label for="">NIK<span class="text-danger">*</span></label>
                     <input type="text" name="nik" class="form-control" maxlength="16">
                 </div>
                 <div class="form-group">
                     <label for="">No Telp<span class="text-danger">*</span></label>
                     <input type="text" name="notelp" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="">Asal Instansi<span class="text-danger">*</span></label>
                     <input type="text" name="instansi" class="form-control">
                 </div>
                 <div class="form-group">
                     <label for="">Alamat<span class="text-danger">*</span></label>
                     <textarea type="text" name="alamat" rows="5" class="form-control"></textarea>
                 </div>
                 <div class="form-group">
                     <button type="button" id="regis" class="btn btn-success btn-block">
                         Daftar
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </section>
 <!-- end form registrasi anggota -->