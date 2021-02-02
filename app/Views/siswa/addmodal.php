<div id="add-modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="display: none;" aria-hidden="true">
   <div class="modal-dialog  slideInDown  animated modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah data baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <?= form_open('siswa/savedata', ['class' => "add-data-form"]); ?>
            <div class="row form-group">
               <!-- nis -->
               <div class="col-md-6">
                  <label>NIS</label>
                  <input type="text" class="form-control" name="nis" id="nis">
                  <div class="invalid-feedback ml-2" id="error-nis">

                  </div>
               </div>
               <!-- END NIS -->

               <!-- nisn -->
               <div class="col-md-6">
                  <label>NISN</label>
                  <input type="text" class="form-control" name="nisn" id="nisn">
                  <div class="invalid-feedback ml-2" id="error-nisn">

                  </div>
               </div>
               <!-- END NISN -->
            </div>

            <!-- name -->
            <div class="form-group">
               <label>Nama</label>
               <input type="text" class="form-control" name="nama" id="nama">
               <div class="invalid-feedback ml-2" id="error-nama">

               </div>
            </div>
            <!-- END NAME -->

            <!-- place and date of birth -->
            <div class="form-group">
               <label>Tempat dan tanggal lahir</label>
               <div class="input-group">
                  <input type="text" class="form-control" name="tem_lahir">
                  <!--  -->
                  <input type="date" class="form-control" name="tan_lahir">
               </div>
            </div>
            <!-- END PLACE AND DATE OF BIRTH -->

            <div class="row form-group">
               <!-- class -->
               <div class="col-md-6">
                  <label>Kelas</label>
                  <select class="form-control" name="kelas" id="kelas">
                     <option value="X">X</option>
                     <option value="XI">XI</option>
                     <option value="XII">XII</option>
                  </select>
               </div>
               <!-- END CLASS -->

               <!-- majors -->
               <div class="col-md-6">
                  <label>Jurusan</label>
                  <select class="form-control" name="jurusan" id="jurusan">
                     <option value="IPA">IPA</option>
                     <option value="IPS">IPS</option>
                     <option value="BAHASA">Bahasa</option>
                  </select>
               </div>
               <!-- END MAJORS -->
            </div>

            <!-- gender radio button -->
            <div class="form-group">
               <label>Jenis kelamin</label>
               <div class="col-md-9">
                  <div class="form-check-inline my-1">
                     <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio4" name="j_kelamin" class="custom-control-input gender" value="Laki - laki">
                        <label class="custom-control-label" for="customRadio4">
                           <i class="fa fa-male" aria-hidden="true"></i>
                           Laki - laki
                        </label>
                     </div>
                  </div>
                  <div class="form-check-inline my-1">
                     <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio5" name="j_kelamin" class="custom-control-input gender" value="Perempuan">
                        <label class="custom-control-label" for="customRadio5">
                           <i class="fa fa-female" aria-hidden="true"></i>
                           Perempuan
                        </label>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END GENDER RADIO BUTTON -->

            <!-- alamat -->
            <div class="form-group">
               <label>Alamat</label>
               <div>
                  <textarea class="form-control" rows="3" name="alamat" id="alamat"></textarea>
               </div>
            </div>
            <!-- END ALAMAT -->

            <button type="submit" class="btn btn-primary waves-effect waves-light submit-btn mr-1" id="submit-btn">
               Submit
            </button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <?= form_close(); ?>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div>

<script>
   $(document).ready(function() {
      $('.add-data-form').submit(function(e) {
         e.preventDefault()
         $.ajax({
            type: 'post',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function() {
               $('#submit-btn').attr('disabled')
               $('#submit-btn').html('<i class="fa fa-spin fa-spinner"></i>')
            },
            complete: function() {
               $('#submit-btn').removeAttr('disabled')
               $('#submit-btn').html('Save')
            },
            success: function(response) {
               if (response.error) {
                  // nis validation
                  if (response.error.nis) {
                     $('#nis').addClass('is-invalid')
                     $('#error-nis').html(response.error.nis)
                  } else {
                     $('#nis').removeClass('is-invalid')
                     $('#error-nis').html('')
                  }
                  // END NIS VALIDATION

                  // nisn validation
                  if (response.error.nisn) {
                     $('#nisn').addClass('is-invalid')
                     $('#error-nisn').html(response.error.nisn)
                  } else {
                     $('#nisn').removeClass('is-invalid')
                     $('#error-nisn').html('')
                  }
                  // END NISN VALIDATION

                  // nama validation
                  if (response.error.nama) {
                     $('#nama').addClass('is-invalid')
                     $('#error-nama').html(response.error.nama)
                  } else {
                     $('#nama').removeClass('is-invalid')
                     $('#error-nama').html('')
                  }
                  // END NAME VALIDATION
               } else {
                  alert(response.sukses)

                  $('#add-modal').modal('hide')
                  dataSiswa()
               }
            },
            error: function(xhr, ajaxOptions, thrownError) {
               alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
         })

         return false
      })
   })
</script>