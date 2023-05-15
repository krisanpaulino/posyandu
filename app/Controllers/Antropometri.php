<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AmbangbatasModel;
use App\Models\BalitaModel;
use App\Models\HasilukurModel;
use App\Models\KriteriaModel;
use App\Models\PeriodeModel;
use App\Models\PosyanduModel;
use App\Models\StatusgiziModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Libraries\Pdfgenerator;

class Antropometri extends BaseController
{
    public function index()
    {
        $model = new PeriodeModel();
        $periode = $model->findAll();

        $data = [
            'title' => 'Antropometri',
            'periode' => $periode
        ];
        return view('antropometri/index-' . session('user')->user_type, $data);
    }

    public function posyandu($periode_id)
    {
        $model = new PosyanduModel();
        $posyandu = $model->findAll();

        $model = new PeriodeModel();
        $periode = $model->find($periode_id);
        $data = [
            'title' => 'Antropometri Periode ' . konversiBulan($periode->periode_bulan) . ' ' . $periode->periode_tahun,
            'posyandu' => $posyandu,
            'periode' => $periode
        ];

        return view('antropometri/posyandu', $data);
    }

    public function detailPetugas($periode_id)
    {
        $posyandu_id = session('petugas')->posyandu_id;
        $model = new PosyanduModel();
        $posyandu = $model->find($posyandu_id);

        $model = new PeriodeModel();
        $periode = $model->find($periode_id);

        $model = new HasilukurModel();
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);
        // dd($hasilukur);
        $data = [
            'title' => 'Hasil Ukur',
            'posyandu' => $posyandu,
            'periode' => $periode,
            'hasilukur' => $hasilukur
        ];

        return view('antropometri/detail', $data);
    }
    public function detailAdmin($periode_id, $posyandu_id)
    {
        $model = new PosyanduModel();
        $posyandu = $model->find($posyandu_id);

        $model = new PeriodeModel();
        $periode = $model->find($periode_id);

        $model = new HasilukurModel();
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);
        // dd($hasilukur);
        $data = [
            'title' => 'Hasil Ukur',
            'posyandu' => $posyandu,
            'periode' => $periode,
            'hasilukur' => $hasilukur
        ];
        return view('antropometri/detail', $data);
    }

    public function hitung()
    {
        $periode_id = $this->request->getPost('periode_id');
        $posyandu_id = $this->request->getPost('posyandu_id');
        //Dapatkan max semua kategori
        $model = new HasilukurModel();
        $maxc1 = $model->findMax('hasilukur_c1bobot', $posyandu_id, $periode_id);
        $maxc2 = $model->findMax('hasilukur_c2bobot', $posyandu_id, $periode_id);
        $maxc3 = $model->findMax('hasilukur_c3bobot', $posyandu_id, $periode_id);
        $maxc4 = $model->findMax('hasilukur_c4bobot', $posyandu_id, $periode_id);
        // dd($maxc1);
        //Dapatkan semua hasil ukur
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);
        // dd($hasilukur);
        $kmodel = new KriteriaModel(); //Model Kriteria
        foreach ($hasilukur as $i => $hasil) {
            $skor = 0;
            $skor += $hasil->hasilukur_c1bobot / $maxc1 * $kmodel->findKriteria('c1')->kriteria_bobot;
            $skor += $hasil->hasilukur_c2bobot / $maxc2 * $kmodel->findKriteria('c2')->kriteria_bobot;
            $skor += $hasil->hasilukur_c3bobot / $maxc3 * $kmodel->findKriteria('c3')->kriteria_bobot;
            $skor += $hasil->hasilukur_c4bobot / $maxc4 * $kmodel->findKriteria('c4')->kriteria_bobot;

            $data['hasilukur_skor'] = $skor;
            $data['hasilukur_status'] = statusSAW($skor)->statusgizi_id;

            $model->where('hasilukur_id', $hasil->hasilukur_id);
            $model->update($hasil->hasilukur_id, $data);
        }

        return redirect()->to(previous_url())->with('success', 'Berhasil dihitung');
    }
    public function detailUkur($periode_id, $balita_id)
    {
        $model = new PeriodeModel();
        $periode = $model->find($periode_id);
        // dd($periode);
        $model = new HasilukurModel();
        $detail = $model->findDetail($balita_id, $periode->periode_id);

        $model = new BalitaModel();
        $balita = $model->findBalita($balita_id);

        $model = new PosyanduModel();
        $posyandu = $model->find($balita->posyandu_id);
        $data = [
            'title' => 'Detail Ukur Balita',
            'periode' => $periode,
            'balita' => $balita,
            'detail' => $detail,
            'posyandu' => $posyandu
        ];
        // dd($detail);

        return view('antropometri/detail-ukur', $data);
    }

    public function pencarian()
    {
        $keyword = $this->request->getGet('balita_nama');

        $model = new BalitaModel();
        $balita = $model->byNama($keyword);

        $data = [
            'title' => 'Pencarian',
            'balita' => $balita
        ];
        return view('hasilukur/pencarian', $data);
    }

    public function daftarHasil($balita_id)
    {
        $model = new BalitaModel();
        $balita = $model->findBalita($balita_id);

        $model = new HasilukurModel();
        $hasilukur = $model->byBalita($balita_id);

        $data = [
            'title' => 'Daftar Hasil Ukur',
            'hasilukur' => $hasilukur,
            'balita' => $balita
        ];

        return view('frontend/daftar-hasilukur', $data);
    }

    public function detailUkurFront($balita_id, $periode_id)
    {
        $model = new PeriodeModel();
        $periode = $model->find($periode_id);
        // dd($periode);
        $model = new HasilukurModel();
        $detail = $model->findDetail($balita_id, $periode->periode_id);

        $model = new BalitaModel();
        $balita = $model->findBalita($balita_id);

        $model = new PosyanduModel();
        $posyandu = $model->find($balita->posyandu_id);
        $data = [
            'title' => 'Detail Ukur Balita',
            'periode' => $periode,
            'balita' => $balita,
            'detail' => $detail,
            'posyandu' => $posyandu
        ];
        // dd($detail);

        return view('frontend/detail-hasilukur', $data);
    }


    public function cetakHasil($posyandu_id, $periode_id)
    {
        $model = new HasilukurModel();
        $hasilukur = $model->findHasil($posyandu_id, $periode_id);

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $style = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            )
        );

        $sheet->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'Nama Balita')
            ->setCellValue('C1', 'L/P')
            ->setCellValue('D1', 'Tanggal Lahir')
            ->setCellValue('E1', 'Nama Orangtua')
            ->setCellValue('F1', 'Alamat')
            ->setCellValue('G1', 'Posyandu')
            ->setCellValue('H1', 'Desa')
            ->setCellValue('I1', 'Tanggal Pengukuran')
            ->setCellValue('J1', 'Umur')
            ->setCellValue('K1', 'BB')
            ->setCellValue('L1', 'Posisi')
            ->setCellValue('M1', 'PB/TB')
            ->setCellValue('N1', 'BMI')
            ->setCellValue('O1', 'Status');

        $sheet->mergeCells('A1:A2');
        $sheet->mergeCells('B1:B2');
        $sheet->mergeCells('C1:C2');
        $sheet->mergeCells('D1:D2');
        $sheet->mergeCells('E1:E2');
        $sheet->mergeCells('F1:F2');
        $sheet->mergeCells('G1:G2');
        $sheet->mergeCells('H1:H2');
        $sheet->mergeCells('I1:I2');
        $sheet->mergeCells('J1:J2');
        $sheet->mergeCells('K1:K2');
        $sheet->mergeCells('L1:L2');
        $sheet->mergeCells('M1:M2');
        $sheet->mergeCells('N1:N2');
        $sheet->mergeCells('O1:R1');

        $sheet->setCellValue('O2', 'BB/U')
            ->setCellValue('P2', 'TB/U')
            ->setCellValue('Q2', 'BB/TB')
            ->setCellValue('R2', 'IMT/U');
        $sheet->getStyle('A1:R2')->applyFromArray($style);
        $sheet->getStyle('A1:R2')->getFont()->setBold(true);
        $row = 3;

        foreach ($hasilukur as $i => $hasil) {
            $sheet->setCellValue('A' . $row, $i + 1)
                ->setCellValue('B' . $row, $hasil->balita_nama)
                ->setCellValue('C' . $row, $hasil->balita_jk)
                ->setCellValue('D' . $row, $hasil->balita_tgllahir)
                ->setCellValue('E' . $row, $hasil->balita_orangtua)
                ->setCellValue('F' . $row, $hasil->balita_alamat)
                ->setCellValue('G' . $row, $hasil->posyandu_nama)
                ->setCellValue('H' . $row, $hasil->balita_alamat)
                ->setCellValue('I' . $row, $hasil->hasilukur_tgl)
                ->setCellValue('J' . $row, $hasil->balita_umur)
                ->setCellValue('K' . $row, $hasil->hasilukur_bb)
                ->setCellValue('L' . $row, $hasil->hasilukur_posisi)
                ->setCellValue('M' . $row, $hasil->hasilukur_pbtb)
                ->setCellValue('N' . $row, $hasil->hasilukur_bmi)
                ->setCellValue('O' . $row, getStatus('BB/U', $hasil->hasilukur_c1))
                ->setCellValue('P' . $row, getStatus('TB/U', $hasil->hasilukur_c2))
                ->setCellValue('Q' . $row, getStatus('BB/TB', $hasil->hasilukur_c3))
                ->setCellValue('R' . $row, getStatus('IMT/U', $hasil->hasilukur_c4));
            $row++;
        }
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setAutoSize(true);
        $sheet->getColumnDimension('K')->setAutoSize(true);
        $sheet->getColumnDimension('L')->setAutoSize(true);
        $sheet->getColumnDimension('M')->setAutoSize(true);
        $sheet->getColumnDimension('N')->setAutoSize(true);
        $sheet->getColumnDimension('O')->setAutoSize(true);
        $sheet->getColumnDimension('P')->setAutoSize(true);
        $sheet->getColumnDimension('Q')->setAutoSize(true);
        $sheet->getColumnDimension('R')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-Data-HasilUkur';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function laporanHasil($posyandu_id, $periode_id)
    {
        $model = new PeriodeModel();
        $periode = $model->find($periode_id);

        $model = new PosyanduModel();
        $posyandu = $model->find($posyandu_id);

        $model = new StatusgiziModel();
        $status = $model->findAll();

        $model = new AmbangbatasModel();
        $ambang = $model->byIndex('TB/U');

        $model = new HasilukurModel();
        $jumlah = $model->dataJumlah($posyandu_id, $periode_id);

        $gizi = [];
        $tinggi = [];

        foreach ($status as $key => $s) {
            $gizi[$key]['status'] = $s->statusgizi_nama;
            $gizi[$key]['data'] = $model->dataGizi($posyandu_id, $periode_id, $s->statusgizi_id);
        }

        foreach ($ambang as $key => $a) {
            $tinggi[$key]['status'] = $a->ambangbatas_status;
            $tinggi[$key]['data'] = $model->dataAmbang($posyandu_id, $periode_id, $a->ambangbatas_bobotkriteria);
        }

        $data = [
            'title_pdf' => 'Laporan Hasil Posyandu',
            'periode' => $periode,
            'posyandu' => $posyandu,
            'gizi' => $gizi,
            'tinggi' => $tinggi,
            'jumlah' => $jumlah
        ];
        $pdf = new Pdfgenerator();

        // title dari pdf

        // filename dari pdf ketika didownload
        $file_pdf = 'laporan_hasil';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";

        $html = view('pdf-hasilukur', $data,);

        // run dompdf
        $pdf->generate($html, $file_pdf, $paper, $orientation);
    }
}
