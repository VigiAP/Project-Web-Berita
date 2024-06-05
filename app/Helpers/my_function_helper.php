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

    function limit_words($string, $limit) {
        $words = explode(' ', $string);
        if (count($words) > $limit) {
            $words = array_slice($words, 0, $limit);
            return implode(' ', $words) . '…';
        } else {
            return $string;
        }   
    }

    function getArticleTitle($articleTitle) {
        $arr = [];
        foreach($articleTitle as $key => $value) {
            $arr[] = $value['title'];
        }
        $randomKey = array_rand($arr);
        return $arr[$randomKey];
    }

    
?>