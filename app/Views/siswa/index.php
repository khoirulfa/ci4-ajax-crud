<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>

<!-- DataTables -->
<link href="<?= base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Required datatable js -->
<script src="<?= base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page-Title -->
<div class="row">
   <div class="col-sm-6">
      <div class="page-title-box">
         <h2 class="page-title"><?= $title; ?></h2>
      </div>
   </div>
   <div class="col-sm-6">
      <div class="page-title-box">
         <!-- operations button -->
         <div class="row float-right">
            <!-- add new data -->
            <button type="button" class="btn btn-sm btn-primary waves-effect waves-light mr-2 ml-3 add-data">
               <i class="mdi mdi-plus-circle-outline"></i>
               Tambah data baru
            </button>
            <!-- END ADD NEW DATA -->

            <!-- other  operations dropdown-->
            <div class="dropdown mo-mb-2">
               <!-- trigger -->
               <a class="btn btn-sm btn-link dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  Lainnya
               </a>
               <!-- END TRIGGER -->

               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <a class="dropdown-item" href="#">
                     <i class="mdi mdi-plus-circle-multiple-outline mr-2"></i>
                     Add multiple data
                  </a>
               </div>
            </div>
            <!-- END OTHER OPERATIONS DROPDOWN -->
         </div>
         <!-- END OPERATIONS BUTTON -->
      </div>
   </div>
</div>
<!-- END PAGE TITLE -->

<div class="row">
   <div class="col-12">
      <div class="card m-b-20">
         <div class="card-body viewdata">
            <!-- FOR TABLE VIEW -->
            
         </div>
      </div>
   </div>
</div>

<div class="viewmodal" style="display: none;"></div>


<script>
   function dataSiswa() {
      $.ajax({
         url: "<?= site_url('Siswa/getData'); ?>",
         dataType: "json",
         success: function(response) {
            $('.viewdata').html(response.data)
         },
         error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
         }
      })
   }

   $('.document').ready(function() {
      dataSiswa()

      $('.add-data').click(function(e) {
         e.preventDefault()
         $.ajax({
            url: "<?= site_url('Siswa/addData'); ?>",
            dataType: "json",
            success: function(response) {
               $('.viewmodal').html(response.data).show()

               $('#add-modal').modal('show')
            },
            error: function(xhr, ajaxOptions, thrownError) {
               alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
            }
         })
      })
   })
</script>

<?= $this->endSection(); ?>