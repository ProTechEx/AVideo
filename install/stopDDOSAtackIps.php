<?php

$apacheAccessLogFile = '/var/log/apache2/access.log';

function tailShell($filepath, $lines = 1) {
    ob_start();
    passthru('tail -' . $lines . ' ' . escapeshellarg($filepath));
    return preg_split("/\r\n|\n|\r/", trim(ob_get_clean()));
}

$ips = array();
$uas = array();
$ipsProcessed = array();
$mySQLIsStopped = 0;
while (1) {

    $lines = tailShell($apacheAccessLogFile, 1000);
    //file_put_contents($apacheAccessLogFile,'');

    foreach ($lines as $line) {
        preg_match('/^([0-9.]+).*headless/i', $line, $matches);
        if (!empty($matches[1])) {
            $ip = trim($matches[1]);
            if (!in_array($ip, $ips)) {
                $ips[] = $ip;
                $uas[] = $line;
            }
        }
        preg_match('/^([0-9.]+).*X11; Linux/i', $line, $matches);
        if (!empty($matches[1])) {
            $ip = trim($matches[1]);
            if (!in_array($ip, $ips)) {
                $ips[] = $ip;
                $uas[] = $line;
            }
        }
        preg_match('/^([0-9.]+).*HTTP\/1.3/i', $line, $matches);
        if (!empty($matches[1])) {
            $ip = trim($matches[1]);
            if (!in_array($ip, $ips)) {
                $ips[] = $ip;
                $uas[] = $line;
            }
        }
        preg_match('/^([0-9.]+).*Windows NT [56]/i', $line, $matches);
        if (!empty($matches[1])) {
            $ip = trim($matches[1]);
            if (!in_array($ip, $ips)) {
                $ips[] = $ip;
                $uas[] = $line;
            }
        }
    }

    $total = count($ips);
    $newRules = array();

    foreach ($ips as $key => $ip) {
        if (in_array($ip, $ipsProcessed)) {
            continue;
        }
        $cmd = 'sudo ufw insert 1 deny from ' . $ip . '  to any' . PHP_EOL;
        echo "{$key}/{$total} " . $cmd;
        echo $uas[$key] . PHP_EOL;
        $output = null;
        exec($cmd . ' 2>&1', $output, $return_var);
        echo json_encode($output) . PHP_EOL;
        echo '--------------' . PHP_EOL;
        if ($output[0] === 'Rule inserted') {
            $newRules[] = $ip;
        }
        $ipsProcessed[] = $ip;
    }
    $totalNew = count($newRules);
    //echo PHP_EOL . date('Y-m-d H:i:s').' Found ' . $total . PHP_EOL;
    //echo PHP_EOL . $totalNew . ' New IPs added: ' . implode(', ', $newRules) . PHP_EOL;

    if ($totalNew) {
        echo "*** {$totalNew} new rules inserted" . PHP_EOL;
    }

    if ($totalNew > 5 && !$mySQLIsStopped) {
        //exec('/etc/init.d/apache2 restart');
        echo '*** STOP MySQL' . PHP_EOL;
        $mySQLIsStopped = 1;
        exec('/etc/init.d/mysql stop');
    } else if (empty($totalNew) && $mySQLIsStopped) {
        echo '*** Start MySQL' . PHP_EOL;
        $mySQLIsStopped = 0;
        exec('/etc/init.d/mysql start');
    }
    if ($totalNew) {
        echo "*******" . PHP_EOL . PHP_EOL;
    }
    sleep(1);
}