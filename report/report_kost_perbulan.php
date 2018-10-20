<?php
require_once '../config/PHPExcel/Classes/PHPExcel.php';

// membuat obyek dari class PHPExcel
$objPHPExcel = new PHPExcel();
// memberi nama sheet pertama dengan nama 'Sheet 1'
$objPHPExcel->getSheet(0)->setTitle('Sheet 1');

$objPHPExcel->getSheet(0)->mergeCells('A1:Q1');
$objPHPExcel->getSheet(0)->mergeCells('A2:Q2');
$objPHPExcel->getSheet(0)->mergeCells('A3:Q3');
$objPHPExcel->getActiveSheet()->getStyle('A1:A3')->getAlignment()->applyFromArray(
    array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,)
);

$styleArray = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
        ),
    ),
);
$objPHPExcel->getActiveSheet()->getStyle("A1:Q3")->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('A1:Q3')->applyFromArray($styleArray);
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

$objPHPExcel->getSheet(0)
            ->setCellValue('A1', 'DATA PEMILIK RUMAH KOST')
            ->setCellValue('A2', 'KELURAHAN TEGAL PARANG, KECAMATAN MAMPANG PRAPATAN')
            ->setCellValue('A3', 'KOTA ADMINISTRASI JAKARTA SELATAN')
            ->setCellValue('A5', 'NO')
            ->setCellValue('B5', 'NAMA KOST')
            ->setCellValue('C5', 'ALAMAT')
            ->setCellValue('D5', 'RT')
            ->setCellValue('E5', 'RW')
            ->setCellValue('F5', 'NAMA PEMILIK')
            ->setCellValue('G5', 'NIK PEMILIK')
            ->setCellValue('H5', 'NO.TELP')
            ->setCellValue('I5', 'STATUS TANAH')
            ->setCellValue('J5', 'IZIN IMB')
            ->setCellValue('K5', 'NO IZIN IMB')
            ->setCellValue('L5', 'IZIN SEBAGAI RUMAH KOST')
            ->setCellValue('M5', 'NO IZIN RUMAH KOST ')
            ->setCellValue('N5', 'SISTEM SEWA')
            ->setCellValue('O5', 'JUMLAH KAMAR')
            ->setCellValue('P5', 'JUMLAH LANTAI')
            ->setCellValue('Q5', 'KET');

            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $hasil = $tahun .'-'. $bulan;
            include '../config/koneksi.php';
            $query = mysqli_query($conn, "SELECT * FROM kost WHERE SUBSTRING_INDEX (tanggal,'-',2) = '$hasil'");
            $baris = 6;
            $no = 1;
            while ($data2 = mysqli_fetch_assoc($query)) {
              if ($data2['no_imb'] == "") {
                $izin_imb = html_entity_decode('&#10006;');
              }else{
                $izin_imb = html_entity_decode('&#10004;');
              }
              if ($data2['no_izin_kost'] == "") {
                $izin_kost = html_entity_decode('&#10006;');
              }else{
                $izin_kost = html_entity_decode('&#10004;');
              }

	$objPHPExcel->getSheet(0)
  ->setCellValue('A'.$baris, $no)
  ->setCellValue('B'.$baris, $data2['nama_kost'])
  ->setCellValue('C'.$baris, $data2['alamat'])
  ->setCellValue('D'.$baris, $data2['rt'])
  ->setCellValue('E'.$baris, $data2['rw'])
  ->setCellValue('F'.$baris, $data2['pemilik'])
  ->setCellValue('G'.$baris, $data2['nik'])
  ->setCellValue('H'.$baris, $data2['no_telp'])
  ->setCellValue('I'.$baris, $data2['status_tanah'])
  ->setCellValue('J'.$baris, $izin_imb)
  ->setCellValue('K'.$baris, $data2['no_imb'])
  ->setCellValue('L'.$baris, $izin_kost)
  ->setCellValue('M'.$baris, $data2['no_izin_kost'])
  ->setCellValue('N'.$baris, $data2['sistem_sewa'])
  ->setCellValue('O'.$baris, $data2['jml_kamar'])
  ->setCellValue('P'.$baris, $data2['jml_lantai'])
  ->setCellValue('Q'.$baris, $data2['ket']);
					$objPHPExcel->getActiveSheet()
                    ->getStyle('G'.$baris)
                    ->getNumberFormat()
                    ->setFormatCode(
                        PHPExcel_Style_NumberFormat::FORMAT_NUMBER
                    );

        // nomor baris bertambah
$baris++;
$no++;
}

$objPHPExcel->getSheet(0)->getColumnDimension('A')->setAutoSize(true);
$objPHPExcel->getSheet(0)->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getSheet(0)->getColumnDimension('C')->setWidth(50);
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

$objPHPExcel->getActiveSheet()->getStyle('A5:Q'.$baris)->applyFromArray($styleArray);
// $objPHPExcel->getSheet(0)->getColumnDimension('O')->setAutoSize(true);
// $objPHPExcel->getSheet(0)->getColumnDimension('P')->setAutoSize(true);
// $objPHPExcel->getSheet(0)->getColumnDimension('Q')->setAutoSize(true);
// $objPHPExcel->getSheet(0)->getColumnDimension('R')->setWidth(50);
// $objPHPExcel->getSheet(0)->getColumnDimension('D')->setWidth(12);
// mengeset sheet 2 yang aktif
$objPHPExcel->setActiveSheetIndex(0);


// output file dengan nama file 'contoh.xls'

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="laporan_kost_perbulan.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
