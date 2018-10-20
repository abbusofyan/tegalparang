<?php
require_once '../config/PHPExcel/Classes/PHPExcel.php';

// membuat obyek dari class PHPExcel
$objPHPExcel = new PHPExcel();
// memberi nama sheet pertama dengan nama 'Sheet 1'
$objPHPExcel->getSheet(0)->setTitle('Sheet 1');

$objPHPExcel->getSheet(0)->mergeCells('A1:P1');
$objPHPExcel->getSheet(0)->mergeCells('A2:P2');
$objPHPExcel->getSheet(0)->mergeCells('A3:P3');
$objPHPExcel->getSheet(0)->mergeCells('A5:B5');
$objPHPExcel->getActiveSheet()->getStyle('A1:P3')->getAlignment()->applyFromArray(
    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle("A1:P3")->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('A1:P3')->applyFromArray($styleArray);
// $objPHPExcel->getSheet(0)->getStyle('A1:B2')->getFill()
// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
// $objPHPExcel->getSheet(0)->getStyle('A1:B2')->getFill()
// ->getStartColor()->setRGB('EDCCDD');
// $objPHPExcel->getSheet(0)->getStyle('C1:D2')->getFill()
// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
// $objPHPExcel->getSheet(0)->getStyle('C1:D2')->getFill()
// ->getStartColor()->setRGB('BCBFCC');
// $objPHPExcel->getSheet(0)->getStyle('E1:J2')->getFill()
// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
// $objPHPExcel->getSheet(0)->getStyle('E1:J2')->getFill()
// ->getStartColor()->setRGB('C7CFED');
// $objPHPExcel->getSheet(0)->getStyle('K1:M2')->getFill()
// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
// $objPHPExcel->getSheet(0)->getStyle('K1:M2')->getFill()
// ->getStartColor()->setRGB('#deefa0');
// $objPHPExcel->getSheet(0)->getStyle('N1:Q2')->getFill()
// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
// $objPHPExcel->getSheet(0)->getStyle('N1:Q2')->getFill()
// ->getStartColor()->setRGB('C2F0C7');
// $objPHPExcel->getSheet(0)->getStyle('R1:R2')->getFill()
// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
// $objPHPExcel->getSheet(0)->getStyle('R1:R2')->getFill()
// ->getStartColor()->setRGB('E2EB3D');

include '../config/koneksi.php';

if (isset($_GET['rt']) && isset($_GET['rw'])) {
  $rt = $_GET['rt'];
  $rw = $_GET['rw'];
  if ($rw == 'semuadata') {
    $query = mysqli_query($conn, 'SELECT * FROM kontrakan');
    $ket = "Data kontrakan kel. tegal parang";
  }else{
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE rt='$rt' AND rw='$rw'");
    $ket = "Data kontrakan kel. tegal parang RT $rt RW $rw";
  }
}else if (isset($_GET['optradio']) && isset($_GET['imb'])) {
  if ($_GET['optradio'] == "Tidak Berizin") {
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE no_imb =''");
    $ket = "Data kontrakan kel. tegal parang tanpa izin IMB";
  }else {
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE NOT no_imb =''");
    $ket = "Data kontrakan kel. tegal parang dengan izin IMB";
  }
}else if (isset($_GET['optradio']) && isset($_GET['izin_kontrakan'])) {
  if ($_GET['optradio'] == "Tidak Berizin") {
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE no_izin_kontrakan =''");
    $ket = "Data kontrakan kel. tegal parang tanpa izin rumah kontrakan";
  }else {
    $query = mysqli_query($conn, "SELECT * FROM kontrakan WHERE NOT no_izin_kontrakan =''");
    $ket = "Data kontrakan kel. tegal parang dengan izin rumah kontrakan";
  }
}else{
  echo "error";
}


$objPHPExcel->getSheet(0)
            ->setCellValue('A1', 'DATA PEMILIK RUMAH KONTRAKAN')
            ->setCellValue('A2', 'KELURAHAN TEGAL PARANG, KECAMATAN MAMPANG PRAPATAN')
            ->setCellValue('A3', 'KOTA ADMINISTRASI JAKARTA SELATAN')
            ->setCellValue('A5', $ket)
            ->setCellValue('A7', 'NO')
            ->setCellValue('B7', 'PEMILIK')
            ->setCellValue('C7', 'NIK')
            ->setCellValue('D7', 'ALAMAT')
            ->setCellValue('E7', 'RT')
            ->setCellValue('F7', 'RW')
            ->setCellValue('G7', 'NO.TELP')
            ->setCellValue('H7', 'STATUS TANAH')
            ->setCellValue('I7', 'IZIN IMB')
            ->setCellValue('J7', 'NO IZIN IMB')
            ->setCellValue('K7', 'IZIN RUMAH KONTRAKAN')
            ->setCellValue('L7', 'NO IZIN RUMAH KOST ')
            ->setCellValue('M7', 'SISTEM SEWA')
            ->setCellValue('N7', 'JUMLAH KAMAR')
            ->setCellValue('O7', 'JUMLAH LANTAI')
            ->setCellValue('P7', 'KET');


              $baris = 8;
              $no = 1;
              while ($data2 = mysqli_fetch_assoc($query)) {
                if ($data2['no_imb'] == "") {
                  $izin_imb = html_entity_decode('&#10006;');
                }else{
                  $izin_imb = html_entity_decode('&#10004;');
                }
                if ($data2['no_izin_kontrakan'] == "") {
                  $izin_kost = html_entity_decode('&#10006;');
                }else{
                  $izin_kost = html_entity_decode('&#10004;');
                }
  	$objPHPExcel->getSheet(0)
                      ->setCellValue('A'.$baris, $no)
                      ->setCellValue('B'.$baris, $data2['pemilik'])
                      ->setCellValue('C'.$baris, $data2['nik'])
                      ->setCellValue('D'.$baris, $data2['alamat'])
                      ->setCellValue('E'.$baris, $data2['rt'])
                      ->setCellValue('F'.$baris, $data2['rw'])
                      ->setCellValue('G'.$baris, $data2['no_telp'])
                      ->setCellValue('H'.$baris, $data2['status_tanah'])
                      ->setCellValue('I'.$baris, $izin_imb)
                      ->setCellValue('J'.$baris, $data2['no_imb'])
                      ->setCellValue('K'.$baris, $izin_kost)
                      ->setCellValue('L'.$baris, $data2['no_izin_kontrakan'])
                      ->setCellValue('M'.$baris, $data2['sistem_sewa'])
                      ->setCellValue('N'.$baris, $data2['jml_kamar'])
                      ->setCellValue('O'.$baris, $data2['jml_lantai'])
                      ->setCellValue('P'.$baris, $data2['ket']);

          // nomor baris bertambah
  $baris++;
  $no++;
  }

$objPHPExcel->getSheet(0)->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('B')->setWidth(50);
$objPHPExcel->getSheet(0)->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getSheet(0)->getColumnDimension('D')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('E')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('F')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('G')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('H')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('I')->setWidth(30);
$objPHPExcel->getSheet(0)->getColumnDimension('J')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('K')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('L')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('M')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('N')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('O')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('P')->setAutoSize(true);

$objPHPExcel->getActiveSheet()->getStyle('A7:P'.$baris)->applyFromArray($styleArray);
$objPHPExcel->setActiveSheetIndex(0);


// output file dengan nama file 'contoh.xls'

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="laporan_kontrakan_perRT.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
