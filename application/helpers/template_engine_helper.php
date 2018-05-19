<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateEngine{
    protected $ctrl;
    public function __construct($ctrl){
        $this->ctrl = $ctrl;
    }

    public function renderOutput($nama_left,$nama_top,$posisi_top,$posisi_left,$nama, $peran){
    /// ambil template email atau surat
        $posisi_top = $posisi_top - $nama_top - 1.5;
        $output = "";
        $nama_top .= 'cm;';
        $nama_left .= 'cm;';
        $posisi_top .= 'cm;';
        $posisi_left .= 'cm;';


    // /// Siapkan dokumen html dan css
        $output .= '<html>';
        $output .= '<head>';
        $output .= '<style>';
        // $output .= 'body {';
        // $output .= 'background-image : url("'. base_url().'images/sertif.png"); ';
        // $output .= 'background-image-resize:6';
        // $output .= '}';
        $output .= '.page {';
        $output .= 'height : 100%;';
        $output .= '}';
        $output .= '.nama {';
        $output .= 'padding-left: '.$nama_left;
        $output .= 'padding-top: '.$nama_top;
        //$output .= 'text-align: center';
        $output .= '}';
        $output .= '.posisi {';
        $output .= 'padding-left: '.$posisi_left;
        $output .= 'padding-top: '.$posisi_top;
        //$output .= 'text-align: center';
        $output .= '}';
        $output .= '</style>';
        $output .= '</head>';
        //$output .= '<img src="'.base_url().'images/sertif.png">';
    /// Tag body dibuka
        //$output .= '<body>';
        //foreach ($this->peserta as $row) {
          $output .= '<h1 class="nama">'.$nama.'</h1><h1 class="posisi">'.$peran.'</h1>';
        //}

    /// tutup elemen 'body' dan elemen 'html'
        //$output .= '</body>';
         $output .= '</html>';
        return $output;
    }

}

?>
