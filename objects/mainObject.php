<?php
class Main
{
    /**
     * receive a YYYY-MM-DD
     * @param string $brDate
     * @return String dd/mm/yyyy
     */
    public static function dateMySQLToBrString($mySqlDate)
    {
        $parts = explode('-', $mySqlDate);
        //switch month and day
        if (empty($parts[2])) {
            return $mySqlDate;
        } else {
            if (strlen($parts[2]) > 2) { // if there is hour
                $parts2 = explode(" ", $parts[2]);
                $day = $parts2[0];
                $hour = " " . $parts2[1];
            } else {
                $day = $parts[2];
                $hour = '';
            }
            return "{$day}/{$parts[1]}/{$parts[0]}{$hour}";
        }
    }

    /**
     * receive a DD/MM/YYYY
     * @param string $mySqlDate
     * @return String YYYY-mm-dd
     */
    public static function dateBrStringToMySQL($date)
    {
        $parts = explode("/", $date);
        //switch month and day
        if (empty($parts[2])) {
            return $date;
        } else {
            if (strlen($parts[2]) > 4) { // if there is hour
                $parts2 = explode(" ", $parts[2]);
                $year = $parts2[0];
                $hour = " " . $parts2[1];
            } else {
                $year = $parts[2];
                $hour = '';
            }
            return "{$year}-{$parts[1]}-{$parts[0]}{$hour}";
        }
    }
}
