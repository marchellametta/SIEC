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
        $this->ctrl->load->model('Stored_procedure');
        $this->peserta = $this->ctrl->Stored_procedure->get_all_peserta_ec($id_ec);
    }

    public function renderOutput(){
    /// ambil template email atau surat
        $output = "";
        $nama_top = '3cm;';
        $nama_left = '5cm;';

    // /// Siapkan dokumen html dan css
        $output .= '<html>';
        $output .= '<head>';
        $output .= '<style>';
        $output .= '.page {';
        $output .= 'background-image : url("http://static1.grsites.com/archive/textures/beige/beige001.jpg"); ';
        $output .= 'margin-top: '.$nama_top;
        $output .= 'height: 100%';
        $output .= '}';
        $output .= '.nama {';
        $output .= 'padding-left: '.$nama_left;
        $output .= 'padding-top: '.$nama_top;
        $output .= '}';
        $output .= '</style>';
        $output .= '</head>';
    /// Tag body dibuka
        //$output .= '<body>';
        foreach ($this->peserta as $row) {
          $output .= '<div class="page"><div class="nama">Hai</div></div>';
        }

    /// tutup elemen 'body' dan elemen 'html'
        //$output .= '</body>';
         $output .= '</html>';
        return $output;
    }

}

?>
