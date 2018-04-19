<?php
require_once 'assets/phpexcel/PHPExcel.php';

//error_reporting(E_ALL);
//ini_set("display_errors", 1);

class Excel{
  protected $workbook;
  protected $sheet;
  protected $writer;
  protected $rawData;

  const FULL_BORDER_STYLE = [
      'borders' => [
        'allborders' => [
          'style' => PHPExcel_Style_Border::BORDER_THIN
        ]
      ]
    ];


  private $maxNumOfCol;

  public function __construct($title){
    if(! isset($title) || empty($title)){
      throw new Exception('Error: judul laporan kosong.');
    }
    $this->maxNumOfCol = 0;
    $this->title = $title;
    $this->workbook = new PHPExcel();
    $this->sheet = $this->workbook->getActiveSheet();
    $this->sheet->setTitle($title);
    $this->writer = PHPExcel_IOFactory::createWriter($this->workbook, 'Excel5');
    $this->rawData = [];
  }

  protected function mysqlRowsToArray($rows,$rules){
    $tmpData = [];
    $numbering = 1;
    foreach($rows as $row){
      $rawRow = [$numbering++];
      $arrRow = (array)$row;
      foreach($rules as $key => $value){
        if(! isset($arrRow[$key])){
            throw new Exception("Error: kolom '$key' tidak ada pada sumber data.");
        }
        array_push($rawRow, $arrRow[$key]);
      }
      array_push($tmpData,$rawRow);
    }
    return $tmpData;
  }

  public function buildFromMysqlRows($rows,$rules,$header=true){
    $tmpData = $this->mysqlRowsToArray($rows,$rules);
    if($header){
      $richText = new PHPExcel_RichText();
      $richText->createTextRun('No')->getFont()->setBold(true);
      $headerArray = [$richText];
      foreach($rules as $value){
        $richText = new PHPExcel_RichText();
        $richText->createTextRun($value)->getFont()->setBold(true);
        array_push($headerArray,$richText);
      }
    }
    $this->rawData = (array_merge($this->rawData,[$headerArray],$tmpData));
  }

  public function setFullBorder($columnRange){
    //var_dump($columnRange);
    $this->sheet
      ->getStyle($columnRange)
      ->applyFromArray(Excel::FULL_BORDER_STYLE);
  }

  private function createText($text,$prop){
    $richText = new PHPExcel_RichText();
    $richTextIns = $richText->createTextRun($text);
    if(isset($prop['size'])){
      $richTextIns->getFont()->setSize(intval($prop['size']));
    }
    if(isset($prop['bold'])){
      $richTextIns->getFont()->setBold($prop['bold'] === true);
    }
    return [$richText];
  }

  public function prependRowFromText($text,$prop){
    $this->rawData = array_merge([$this->createText($text,$prop)],$this->rawData);
  }

  public function appendRowFromText($text){
    $this->rawData = array_merge($this->rawData,[$this->createText($text,null)]);
  }

  public function prependRowFromArray($arr){
    $this->rawData = array_merge($arr,$this->rawData);
  }

  public function appendRowFromArray($arr){
    $this->rawData = array_merge($this->rawData,$arr);
  }


  public function setColumnWidth($colID,$width){
    $this->sheet->getColumnDimension($colID)->setWidth($width);
  }

  public function setRowHeight($rowID,$height){
    $this->sheet->getRowDimension($rowID)->setRowHeight($height);
  }

  public function autoResizeColumn($startCol,$endCol){
    foreach(range($startCol,$endCol) as $columnID) {
      $this->sheet->getColumnDimension($columnID)->setAutoSize(true);
    }
  }

  public function autoResizeRow($startRow,$endRow){
    foreach(range($startRow,$endRow) as $rowID) {
      $this->sheet->getRowDimension($rowID)->setRowHeight(-1);
    }
  }

  public function setBackground($coordinate, $color){
    $this->sheet->getStyle($coordinate)->getFill()
      ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      ->getStartColor()->setARGB($color);
  }

  public function triggerDownload(){
    ob_end_clean();
    header('Content-type: application/vnd.ms-excel');
    header("Content-Disposition: attachment; filename=\"$this->title.xls\"");
    $this->sheet->fromArray($this->rawData);
    $this->writer->save('php://output');
  }
}

?>
