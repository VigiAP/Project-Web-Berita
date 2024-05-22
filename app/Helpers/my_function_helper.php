<?php  
    function status($status) {
        return ($status == 1) ? "Aktif" : "Tidak Aktif";
    }

    function formatTanggal($data) {
        $tanggal = explode(" ", $data)[0];
        $date = DateTime::createFromFormat('Y-m-d', $tanggal);
        setlocale(LC_TIME, 'id_ID');
        return strftime("%d %B %Y", $date->getTimestamp());
    }

    
?>