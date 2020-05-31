<?php
	require './vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

    require 'pages/modul/skripsi/Skripsi.php';

	$judul = strtoupper('Laporan Data Skripsi '.$_GET['j'].' - ' .$_GET['s']);
    $content = '
		<style>
		#report {
		  border-collapse: collapse;
		  width: 100%;
		}

		#report td, #report th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		#report tr:nth-child(even){background-color: #f2f2f2;}

		#report tr:hover {background-color: #ddd;}

		#report th {
		  padding-top: 12px;
		  padding-bottom: 12px;
		  text-align: left;
		  background-color: #3399ff;
		  color: white;
		}
		</style>';

	$content .= '<h1 style="text-align:center;">'.$judul.'</h1><br><br>';

	$objSkripsi = new Skripsi();
    $objSkripsi->jenis = $_GET['j'];
    $objSkripsi->search = $_GET['s'];

    $arrayResult = $objSkripsi->searchSkripsi();

    $content.= '<table style="width: 100%; padding-top:-10px;" id="report">';
    $content.= '
		    <tr>
		    	<th style="text-align:center">No</th>
		    	<th style="text-align:center">NIM</th>
                <th style="text-align:center">Judul Skripsi</th>
                <th style="text-align:center">Topik</th>
                <th style="text-align:center">Abstrak</th>
                <th style="text-align:center">Info</th>
                <th style="text-align:center">Persetujuan</th>
		    </tr>
    ';

   if (empty($arrayResult)) {
        echo '<tr><td colspan="8"><center><b>Tidak ada data!</b></center></td></tr>';
    }else{
        $no = 1;
	    foreach ($arrayResult as $dataSkripsi) {
    		if ($dataSkripsi->persetujuan == 1) {
				$persetujuan = 'Disetujui';
			}elseif ($dataSkripsi->persetujuan == NULL) {
				$persetujuan = 'Menunggu Konfirmasi';
			}elseif ($dataSkripsi->persetujuan == '0') {
				$persetujuan = 'Ditolak';
			}

	        $content.= '<tr>';
	            $content.= '<td style="text-align: center;width=5%;">'.$no++.'</td>';
	            $content.= '<td style="text-align: center;width=10%;">'.$dataSkripsi->nim.'</td>';
	            $content.= '<td style="text-align: center;width=15%;">'.$dataSkripsi->judul_skripsi.'</td>';
	            $content.= '<td style="text-align: center;width=10%;">'.$dataSkripsi->topik.'</td>';
	            $content.= '<td style="text-align: center;width=25%;">'.$dataSkripsi->abstrak_id.'</td>';
	            $content.= '<td style="text-align: left;width=20%; margin:10px">
	            				<span style="padding:5px;"> Nama : '.$dataSkripsi->nama.' </span> <br>
	            				<span style="padding:5px;"> Prodi : '.$dataSkripsi->kode_prodi.' </span> <br>
	            				<span style="padding:5px;"> Angkatan : '.$dataSkripsi->angkatan.' </span> <br>
	            				<span style="padding:5px;"> Tgl. Pengajuan : '.$dataSkripsi->created_date.'</span> <br>
	            			</td>';
	            $content.= '<td>
	            				'.
	            				$persetujuan
	            				.'
	            			</td>';
	        $content.= '</tr>';
	    }
    }
	$content .= '</table>';


	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content);
	ob_end_clean();
	$html2pdf->Output($judul.'.pdf');