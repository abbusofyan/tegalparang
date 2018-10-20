<?php
require_once '../config/PHPExcel/Classes/PHPExcel.php';

// membuat obyek dari class PHPExcel
$objPHPExcel = new PHPExcel();
// memberi nama sheet pertama dengan nama 'Sheet 1'
$objPHPExcel->getSheet(0)->setTitle('Sheet 1');

$objPHPExcel->getSheet(0)->mergeCells('A1:H1');
$objPHPExcel->getSheet(0)->mergeCells('A2:H2');
$objPHPExcel->getSheet(0)->mergeCells('A3:H3');
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
$objPHPExcel->getActiveSheet()->getStyle("A1:H3")->getFont()->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('A1:H3')->applyFromArray($styleArray);
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

$pemilik = $_GET['pemilik'];
$alamat_kontrakan = $_GET['alamat_kontrakan'];

$objPHPExcel->getSheet(0)
            ->setCellValue('A1', 'DATA PENGHUNI RUMAH KONTRAKAN')
            ->setCellValue('A2', 'KELURAHAN TEGAL PARANG, KECAMATAN MAMPANG PRAPATAN')
            ->setCellValue('A3', 'KOTA ADMINISTRASI JAKARTA SELATAN')
            ->setCellValue('A8', 'NO')
            ->setCellValue('A5', 'PEMILIK :')
            ->setCellValue('A7', 'ALAMAT :')
            ->setCellValue('B8', 'NIK')
            ->setCellValue('C8', 'NAMA')
            ->setCellValue('D8', 'TEMPAT, TGL LAHIR')
            ->setCellValue('E8', 'AGAMA')
            ->setCellValue('F8', 'JENIS KELAMIN')
            ->setCellValue('G8', 'PEKERJAAN')
            ->setCellValue('H8', 'ALAMAT KTP')
            ->setCellValue('B5', $pemilik)
            ->setCellValue('B7', $alamat_kontrakan);


            include '../config/koneksi.php';
            $query = mysqli_query($conn, "SELECT * FROM penghuni_kontrakan WHERE nama_pemilik = '$pemilik' AND alamat = '$alamat_kontrakan'");
            $baris = 9;
            $no = 1;
            while ($data2 = mysqli_fetch_assoc($query)) {
	$objPHPExcel->getSheet(0)
                    ->setCellValue('A'.$baris, $no)
                    ->setCellValue('B7', $data2['alamat'])
                    ->setCellValue('B'.$baris, $data2['nik_penghuni'])
                    ->setCellValue('C'.$baris, $data2['nama_penghuni'])
                    ->setCellValue('D'.$baris, $data2['ttl'])
                    ->setCellValue('E'.$baris, $data2['agama'])
                    ->setCellValue('F'.$baris, $data2['j_kel'])
                    ->setCellValue('G'.$baris, $data2['pekerjaan'])
                    ->setCellValue('H'.$baris, $data2['alamat_ktp']);
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

$objPHPExcel->getActiveSheet()->getStyle('A8:H'.$baris)->applyFromArray($styleArray);
// $objPHPExcel->getSheet(0)->getColumnDimension('O')->setAutoSize(true);
// $objPHPExcel->getSheet(0)->getColumnDimension('P')->setAutoSize(true);
// $objPHPExcel->getSheet(0)->getColumnDimension('Q')->setAutoSize(true);
// $objPHPExcel->getSheet(0)->getColumnDimension('R')->setWidth(50);
// $objPHPExcel->getSheet(0)->getColumnDimension('D')->setWidth(12);
// mengeset sheet 2 yang aktif
$objPHPExcel->setActiveSheetIndex(0);


// output file dengan nama file 'contoh.xls'

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="laporan_penghuni_kontrakan.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
