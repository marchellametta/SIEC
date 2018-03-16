<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="mr-3 ml-3 mr-sm-3 ml-sm-3 mr-md-5 ml-md-5 mt-5 mb-5">
  <?php $this->load->view('V_template_breadcrumb', ['viewName' => 'V_lokasi']) ?>
  <div class="text-left ml-3"><h5>Lembar Evaluasi <?php echo $ec->jenis_ec. " : " . $ec->tema_ec ; ?></h5></div>
  <fieldset class="col-md-12 col-lg-12">
    <table class="table table-hover table-striped table-bordered w-100">
      <thead class="thead-dark">
        <tr>
          <th scope="col" colspan="2">Skala penilaian dari yang <b>terburuk (1)</b> hingga <b>terbaik (5)</b></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Materi yang diberikan sesuai dengan harapan dan kebutuhan saya</td>
          <td>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal1" value="1"> 1
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal1" value="2"> 2
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal1" value="3"> 3
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal1" value="4"> 4
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal1" value="5"> 5
              </label>
            </div>
          </td>
        </tr>
        <tr>
          <td>Materi yang diberikan dapat dipraktikkan/ diterapkan</td>
          <td>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal2" value="1"> 1
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal2" value="2"> 2
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal2" value="3"> 3
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal2" value="4"> 4
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal2" value="5"> 5
              </label>
            </div>
          </td>
        </tr>
        <tr>
          <td>Pembicara menyampaikan materi secara jelas dan sistematis</td>
          <td>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal3" value="1"> 1
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal3" value="2"> 2
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal3" value="3"> 3
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal3" value="4"> 4
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal3" value="5"> 5
              </label>
            </div>
          </td>
        </tr>
        <tr>
          <td>Respon para peserta tampak positif</td>
          <td>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal4" value="1"> 1
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal4" value="2"> 2
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal4" value="3"> 3
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal4" value="4"> 4
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal4" value="5"> 5
              </label>
            </div>
          </td>
        </tr>
        <tr>
          <td>Suasana pertemuan dan fasilitas terasa mendukung</td>
          <td>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal5" value="1"> 1
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal5" value="2"> 2
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal5" value="3"> 3
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal5" value="4"> 4
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="soal5" value="5"> 5
              </label>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="form-group col-12">
      <label for="saran">Usul atau saran</label>
      <textarea class="form-control" rows="5" name="saran"></textarea>
    </div>
    <div class="text-right mt-5">
      <input type="submit" value="Login" class="btn btn-primary">
    </div>
  </fieldset>
</div>
