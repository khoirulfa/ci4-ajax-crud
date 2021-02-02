 <!-- table -->
 <table id="datatable" class="table table-stripped">
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
       <?php
         $num = 1;
         foreach ($students as $student) :
         ?>
          <tr>
             <td scope="col" style="text-align: center;"><?= $num; ?></td>
             <td scope="col"><?= $student['nama']; ?></td>
             <td scope="col" style="text-align: center;"><?= $student['kelas'] ?></td>
             <td scope="col" style="text-align: center;"><?= $student['jurusan']; ?></td>
             <td scope="col" style="text-align: center;">
                <?= $student['j_kelamin'] == "Laki - laki" ? 'L' : 'P' ?>
             </td>
             <td scope="col" style="text-align: center;">
                <!-- detail button -->
                <a href="#" class="btn btn-sm btn-info btn-round">
                   <i class="mdi mdi-account-card-details"></i>
                </a>
                <!-- END DETAIL BUTTON -->

                <!-- dropdown trigger -->
                <button type="button" class="btn btn-sm btn-link dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <span class="sr-only">Toggle Dropdown</span>
                </button>
                <!-- END DROPDOWN TRIGGER -->

                <!-- dropdown target -->
                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(100px, 32px, 0px); top: 0px; left: 0px; will-change: transform;">
                   <a class="dropdown-item" href="#">
                      <i class="mdi mdi-lead-pencil mr-2"></i>
                      Ubah data
                   </a>
                   <a class="dropdown-item" href="#">
                      <i class="mdi mdi-delete mr-2"></i>
                      Hapus
                   </a>
                </div>
                <!-- END DROPDOWN TARGET -->
             </td>
          </tr>
          <?php $num++; ?>
       <?php endforeach; ?>
    </tbody>
 </table>
 <!-- END TABLE -->

 <script src="<?= base_url(); ?>/assets/js/datatables.js"></script>