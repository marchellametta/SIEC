<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TemplateEngine{
    protected $template;
    protected $data;
    protected $ctrl;
    private $minimumNumberOfAset = 10;
    private $tipe_output;
    public function __construct($ctrl,$id_ec){
        $this->ctrl = $ctrl;
    }

    public function renderOutput(){
    /// ambil template email atau surat
        $output = "";
        $nama_top = '3cm;';
        $nama_left = '5cm;';
        $posisi_top = '3cm;';
        $posisi_left = '7cm;';

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
        $output .= '}';
        $output .= '.posisi {';
        $output .= 'padding-left: '.$posisi_left;
        $output .= 'padding-top: '.$posisi_top;
        $output .= '}';
        $output .= '</style>';
        $output .= '</head>';
        //$output .= '<img src="'.base_url().'images/sertif.png">';
    /// Tag body dibuka
        //$output .= '<body>';
        //foreach ($this->peserta as $row) {
          $output .= '<div class="nama">Hai</div><div class="posisi">Posisi</div>';
        //}

    /// tutup elemen 'body' dan elemen 'html'
        //$output .= '</body>';
         $output .= '</html>';
        return $output;
    }

}

?>
