<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_acl']) ?>
  <div class="text-left ml-3"><h5><?php echo 'Pengaturan Pengguna' ?></h5></div>
  <form method="post" action="<?php echo base_url().'acl' ?>">
  <table class="table table-hover table-striped table-bordered absensi mt-5 w-100">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="text-center">Peran</th>
        <th scope="col" class="text-center">Hak akses</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($role as $temp):?>
      <tr>
        <td><?php echo $temp->role_name ?></td>
        <td>
          <?php foreach ($temp->perm as $row):?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="<?php echo $temp->id ?>" name="<?php echo $row['perm_id'].'[]'; ?>" <?php if ($row['akses'] == true) echo "checked" ?>>
                <label class="form-check-label" for="<?php echo $row['perm_key'].'[]'; ?>">
                  <?php echo $row['perm_name']; ?>
               </label>
           </div>
           <?php endforeach; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <div class="text-right">
    <input type="submit" value="Simpan" class="btn btn-success">
    <input type="submit" value="Batal" class="btn btn-danger">
  </div>
</form>
</div>
