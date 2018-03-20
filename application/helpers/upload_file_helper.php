<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Fungsi helper untuk memudahkan file upload
 * @param $args :
 * - field_name (required) : nama field input untuk upload file (misal: 'foto')
 * - upload_path (required) : tempat/lokasi penyimpanan file upload (misal: '/images/GLR')
 * - file_name (required) : nama file yang akan dihasilkan
 * - max_size : ukuran maksimal dalam satuan kB (misal: '1024') (default: '2048')
 * - allowed_types : tipe yang diperbolehkan (misal: 'png') (default: 'png|jpg')
 * @param $ctrl
 * - Berisi object controller pemanggil fungsi atau variable $this
 * @return mengembalikan path tempat file di simpan berupa 'string' atau mengembalikan object berisi pesan error jika terjadi error
 */
function upload_file($ctrl,$args){
    $upload_config = [];
    $upload_config['overwrite'] = TRUE;
    $field_name;


    if(!isset($args['field_name'])){
    /// return kode error jika field_name tidak diisi
        return (object)[
            'error_code' => 1
        ];
    }else{
        $field_name = $args['field_name'];
    }

    if(!isset($args['upload_path'])){
    /// return kode error jika upload_path tidak diisi
        return (object)[
            'error_code' => 2
        ];
    }else{
        $upload_config['upload_path'] = $args['upload_path'];
    }

    if(!isset($args['file_name'])){
    /// return kode error jika file_name tidak diisi
        return (object)[
            'error_code' => 3 //no filename
        ];
    }else{
        $upload_config['file_name'] = $args['file_name'];
    }

    if(! isset($args['max_size'])){
    /// memberikan 'default value' ukuran maksimum file yang diupload jika max_size tidak diisi
        $upload_config['max_size'] = 2048;
    }else{
        $upload_config['max_size'] = $args['max_size'];
    }

    if(!isset($args['allowed_types'])){
    /// memberikan 'default value' jenis file jika allowed_types tidak diisi
        $upload_config['allowed_types'] = 'png|jpg|pdf';
    }else{

        $upload_config['allowed_types'] = $args['allowed_types'];

    }

/// mengkonfigurasi library upload
    $ctrl->load->library('upload', $upload_config);
    $ctrl->upload->initialize($upload_config);

/// melakukan upload
    if(! $ctrl->upload->do_upload($field_name)){
    /// return kode error dan pesan error dari library upload jika terjadi error saat proses upload
        return (object)[
            'error_code' => 4,
            'errors' => $ctrl->upload->display_errors('','')
        ];
    }else{
    /// return path tempat file yang diupload disimpan
        return $args['upload_path'] . '/' . $ctrl->upload->data('file_name');
    }
}
