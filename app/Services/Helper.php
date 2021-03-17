<?php


namespace App\Services;


use DateTime;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Helper
{
    /**
     * @param array $columnNames
     * @param array $rows
     * @param string $fileName
     * @return StreamedResponse
     */
    public static function getCsv(array $columnNames, array $rows, $fileName = 'file.csv') {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=" . $fileName,
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];
        $callback = function() use ($columnNames, $rows ) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columnNames);
            foreach ($rows as $row) {
                fputcsv($file, $row);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function monthNumberToName($monthNumber){
        return date('F',mktime(0,0,0,$monthNumber,1));
    }

    public function getAllMonths(){
        $monthRange = range(1,12);
        return array_map('self::monthNumberToName', $monthRange);
    }

    public function getWorkingDays($month, $workdaysPerWeek = 5){
        $startDate = new DateTime('first monday of '. $month .' '. date('Y'));
        $endDate = new DateTime('first monday of next month '. $month .' '. date('Y'));

        $days = $endDate->diff($startDate)->format("%a");
        $fullWeeks = floor($days / 7);
        $workingDays = $fullWeeks * $workdaysPerWeek;

        $extraWorkingDays = $this->getLeftOverWorkingDays($days, $startDate, $endDate);
        $workingDays += $extraWorkingDays;

        return $workingDays;
    }

    public function getLeftOverWorkingDays($days, $startDate, $endDate){
        $extraDays = fmod($days, 7);

        $firstDayOfTheWeek = $startDate->format('N');
        $lastDayOfTheWeek = $endDate->format('N');
        if ($firstDayOfTheWeek <= $lastDayOfTheWeek) {
            if ($firstDayOfTheWeek <= 6 && 6 <= $lastDayOfTheWeek){
                $extraDays--;
            }
            if ($firstDayOfTheWeek <= 7 && 7 <= $lastDayOfTheWeek){
                $extraDays--;
            }
        }

        return $extraDays;
    }

}
