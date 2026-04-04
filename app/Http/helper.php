<?php 

function dateToMysql($txt){
    $result = "";
    if ($txt != "") {
        $year = substr($txt, 6, 4);
        if ($year >= 2500) {
            $year = $year - 543;
        }
        $moth = substr($txt, 3, 2);
        $day = substr($txt, 0, 2);
        $result = $year . "-" . $moth . "-" . $day;
    }
    return $result;
}