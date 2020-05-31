<?php
	require './vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;

	require 'User.php';

	$judul = 'Laporan Data User';
	$content = '<b>'.$judul.'</b>';

	$objUser = new User();
    $arrayResult = $objUser->allUser();

    $content.= '<table>';
    $content.= '
		    <tr>
		    	<td>No</td>
                <td>Email </td>
                <td>Role </td>
		    </tr>
    ';

    if (empty($arrayResult)) {
        $content.= '<tr><td colspan="3"><center><b>Tidak ada data!</b></center></td></tr>';
    }else{
	    $no = 1;
	    foreach ($arrayResult as $dataUser) {
	        $content.= '<tr>';
	            $content.= '<td>'.$no++.'</td>';
	            $content.= '<td>'.$dataUser->email.'</td>';
	            $content.= '<td>'.$dataUser->role.'</td>';
	        $content.= '</tr>';
	    }
	}

	$content .= '</table>';

	$html2pdf = new HTML2PDF('L', 'A4', 'fr');
	$html2pdf->setDefaultFont('Arial');
	$html2pdf->writeHTML($content);
	ob_end_clean();
	$html2pdf->Output($judul.'.pdf');