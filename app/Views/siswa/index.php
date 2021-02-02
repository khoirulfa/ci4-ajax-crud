<?= $this->extend('templates/index'); ?>
<?= $this->section('content'); ?>
<div class="card-body">
   <!-- operations button -->
   <div class="row mb-3">
      <!-- add new data -->
      <button type="button" class="btn btn-sm btn-primary waves-effect waves-light mr-2 ml-3">
         <i class="mdi mdi-plus-circle-outline mr-2"></i>
         Add new data
      </button>
      <!-- END ADD NEW DATA -->

      <!-- other  operations dropdown-->
      <div class="dropdown mo-mb-2">
         <a class="btn btn-sm btn-secondary dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            Other
         </a>

         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 36px, 0px); top: 0px; left: 0px; will-change: transform;">
            <a class="dropdown-item" href="#">
               <i class="mdi mdi-plus-circle-multiple-outline mr-2"></i>
               Add multiple data
            </a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
         </div>
      </div>
      <!-- END OTHER OPERATIONS DROPDOWN -->
   </div>
   <!-- END OPERATIONS BUTTON -->

   <!-- table -->
   <table id="datatable" class="table table-bordered table-small">
      <thead style="text-align: center;">
         <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php $num = 1; ?>
         <?php foreach ($students as $student) : ?>
            <tr>
               <th scope="col" style="text-align: center;"><?= $num; ?></th>
               <td scope="col"><?= $student['nama']; ?></td>
               <td scope="col" style="text-align: center;"><?= $student['kelas'] ?></td>
               <td scope="col" style="text-align: center;"><?= $student['jurusan']; ?></td>
               <td scope="col" style="text-align: center;">
                  <?= $student['j_kelamin'] == "Laki - laki" ? 'L' : 'P' ?>
               </td>
               <td scope="col" style="text-align: center;">
                  <a href="#" class="btn btn-sm btn-success">
                     <i class="mdi mdi-account-card-details"></i>
                  </a>
                  <!-- dropdown button -->
                  <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <!-- dropdown target -->
                  <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(100px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">
                     <a class="dropdown-item" href="#">
                        <i class="mdi mdi-lead-pencil mr-2"></i>
                        Update
                     </a>
                     <a class="dropdown-item" href="#">
                        <i class="mdi mdi-delete mr-2"></i>
                        Delete
                     </a>
                  </div>
               </td>
            </tr>
            <?php $num++; ?>
         <?php endforeach; ?>
      </tbody>
   </table>
   <!-- END TABLE -->
</div>
<?= $this->endSection(); ?>