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

    function convertToIndonesianFormat($datetime) {
        // Define an array of Indonesian month names
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        ];
        
        // Create a DateTime object from the input string
        $date = new DateTime($datetime);
        
        // Extract the day, month, and year
        $day = $date->format('d');
        $month = (int)$date->format('m');
        $year = $date->format('Y');
        
        // Extract the hour and minute
        $time = $date->format('H:i');
        
        // Format the date to Indonesian format
        $formattedDate = $time . ' ' . $day . ' ' . $months[$month] . ' ' . $year;
        
        return $formattedDate;
    }

    function getMonth($data) {
        $arrMonth = [];
        foreach($data as $value) {
            $months = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];
            array_push($arrMonth, $months[$value['MONTH']]);  
        }
       
        return $arrMonth;
    }

    function getMonth2($data) {
        $arrMonth = [];
        foreach($data as $value) {
            $months = [
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember'
            ];
            array_push($arrMonth, $months[$value['month']]);  
        }
       
        return $arrMonth;
    }

    function getCountDataByMonth($data, $index) {
        $newArray = [];
        foreach($data as $value) {
            array_push($newArray, $value[$index]);
        }
        return $newArray;
    }



    