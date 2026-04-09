<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PDF ;
use DB ;
use App\Models\Product ;

class exportPDFController extends Controller
{
    public function exportPDF(){
        $products = DB::table('products')->limit(20)->get();
        $topic = "รายงานรายการสินค้าทั้งหมด";
        $line = "___________________________________________________________________";
        PDF::SetMargins(10, 40,0);
        PDF::setHeaderCallback(function($pdf) use ($topic,$line) {
        PDF::SetFont('freeserif', 'B', 16, '', 'false');
        PDF::SetY(20); //ระยะห่างจากด้านบนมาล่าง
        PDF::SetX(0); //ระยะห่างจากซ้ายไปขวา
        PDF::Cell(0, 0, $topic, 0, false, 'C', false , 1);
        PDF::SetFont('freeserif', 'B', 16, '', 'false');
        PDF::SetY(27); //ระยะห่างจากด้านบนมาล่าง
        PDF::SetX(0); //ระยะห่างจากซ้ายไปขวา
        PDF::Cell(0, 0, $line, 0, false, 'C', false , 1);
    });
    // Custom Footer
        PDF::setFooterCallback(function($pdf) {
        // Position at 15 mm from bottom
        $pdf->SetY(-15);
        // Set font
        $pdf->SetFont('freeserif', '', 16, '', 'false');
        // Page number
        $pdf->Cell(0, 15, 'หน้า '.$pdf->getAliasNumPage().' จาก '.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0,false,'T', 'M');
        });
        PDF::AddPage('A4');
        $html = '<table border="0" width ="400px">
        <thead>
        <tr>
        <th width ="15%"><b>ลําดับที่</b></th>
        <th width ="40%"><b>รายการสินค้า</b></th>
        <th width = "35%"><b>ราคา</b></th>
        <th width = "35%"><b>สต๊อก</b></th>
        </tr>
        </thead>
        <tbody>';
        $i = 1;
        foreach ($products as $item) {
        $html .='
        <tr>
        <td width="15%">'.$i++.'.</td>
        <td width="40%">'.$item->name.'</td>
        <td width="35%">'.$item->price.'</td>
        <td width="35%">'.$item->stock.'</td>
        </tr>';
        }
        $html .='</tbody></table><br/>'.$line;
        PDF::SetFont('freeserif ', '', 16, '', 'false');
        PDF::writeHTML($html, true, false, true, false, '');
        PDF::lastPage();
        PDF::setPrintFooter(true);
        PDF::Output('product.pdf','I');
        PDF::reset();
        PDF::endPage();
    }
}