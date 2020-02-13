<?php

$bedrag =  (int) round($argv[1], PHP_ROUND_HALF_UP);


const GELDEENHEID = array(

    "50 " => "Euro",
    "20 " => "Euro",
    "10 " => "Euro",
    "5 " => "Euro",
    "2 " => "Euro",
    "1 " => "Euro",
    "0.50 " => "Cent",
    "0.25 " => "Cent",
    "0.20 " => "Cent",
    "0.10 " => "Cent",
    "0.05 " => "Cent",
    "0.5 " => "Cent",
);




try {
    if ($argv[1] != is_numeric($argv[1])) {
        throw new Exception("Je hebt geen geldig bedrag meegegeven");
    }
} catch (Exception $d) {
    echo "Error: " . $d->getMessage() . PHP_EOL;
    exit;
}

try {
    if (empty($argv[1])) {
        throw new Exception("Je hebt geen bedrag meegegeven dat omgewisseld dient te worden");
    }
} catch (Exception $d) {
    echo "Error: " . $d->getMessage() . PHP_EOL;
    exit;
}

try {
    if ($argv[1] < 0) {
        throw new Exception("Ik kan geen negatief bedrag wisselen");
    }
} catch (Exception $d) {
    echo "Error: " . $d->getMessage() . PHP_EOL;
    exit;
}


foreach (GELDEENHEID as $geld => $soort) {
    $geld = (float) $geld;
    $bedrag = round($bedrag, 2, PHP_ROUND_HALF_UP);
    $count = floor($bedrag / $geld);

    if ($count >= 1) {
        $count =  floor($bedrag / $geld);
        echo $count . " * $geld $soort" . PHP_EOL;
        $bedrag = $bedrag -  round($geld, 2,);
    }
}
