<?php
    require '../../../excel/vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
        'aligment' => [
            'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
        ],
        'borders' => [
            'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
        ]
        
    ];

    // configuration document properties
    $spreadsheet->getProperties()
    ->setCreator("KORPRI KAB TANGERANG")
    ->setLastModifiedBy("KORPRI")
    ->setTitle("DATA ANGGOTA BARU")
    ->setSubject("Regis Anggota")
    ->setDescription("Data Anggota Baru")
    ->setKeywords("Anggota Baru")
    ->setCategory("GOVERMENT");

    // configuration style
    $spreadsheet->getActiveSheet()
    ->getStyle('A1:H1')
    ->getFont()
    ->getColor()
    ->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

    // configuration background header
    $spreadsheet->getActiveSheet()
    ->getStyle('A1:G1')
    ->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()
    ->setARGB('0D0D0D');


    // header
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Tanggal Registrasi')
    ->setCellValue('B1', 'Nama')
    ->setCellValue('C1', 'L/P')
    ->setCellValue('D1', 'NIK')
    ->setCellValue('E1', 'No Telp')
    ->setCellValue('F1', 'Asal Instansi')
    ->setCellValue('G1', 'Di Terima Tanggal');

    $spreadsheet->getActiveSheet()->getStyle('D')
    ->getNumberFormat()
    ->setFormatCode(
        '00000000000'
    );
    $spreadsheet->getActiveSheet()->getStyle('E')
    ->getNumberFormat()
    ;

    // config style header
    $sheet->getStyle('A1')->applyFromArray($style_col);
    $sheet->getStyle('B1')->applyFromArray($style_col);
    $sheet->getStyle('C1')->applyFromArray($style_col);
    $sheet->getStyle('D1')->applyFromArray($style_col);
    $sheet->getStyle('E1')->applyFromArray($style_col);
    $sheet->getStyle('F1')->applyFromArray($style_col);
    $sheet->getStyle('G1')->applyFromArray($style_col);

    // height column and row
    $sheet->getRowDimension('1')->setRowHeight(25);

    // config width column
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);

    $sheet->getStyle('A')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('B')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('D')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('E')->getAlignment()->setHorizontal('center');
    $sheet->getStyle('F')->getAlignment()->setHorizontal('center');

    // config data in database export to excel
    $i = 2;
    $no = 1;
    require '../../../connection/database_connect.php';
    $query = "SELECT * FROM registrasi_anggota WHERE status='Terima'";
    $rmp1 = $con->prepare($query);
    $rmp1->execute();
    $res = $rmp1->get_result();

    while($data = $res->fetch_object())
    {
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, ($data->create_date == "NULL") ? "" : date('d-m-Y', strtotime($data->create_date)))
        ->setCellValue('B'. $i, $data->nama)
        ->setCellValue('C'.$i, ($data->jk == "Laki-Laki" ? "L" : ($data->jk == "Perempuan" ? "P" : "")))
        ->setCellValue('D'.$i, $data->nik)
        ->setCellValue('E'.$i, $data->no_telp)
        ->setCellValue('F'.$i, $data->asal_instansi)
        ->setCellValue('G'.$i, $data->tgl_terima);
        $i++;
    }

    // rename worksheet
    $spreadsheet->getActiveSheet()->setTitle("REKAM MEDIS PASIEN".date('Y'));

    // set active sheet index
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Rekam Medis Pasien.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');
    
    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0
    
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');

?>