<?php


namespace App\Services;


use App\Models\Employee;
use DateTime;

class TravelAllowance
{

    public function travelAllowanceCsv() {
        $helper = new Helper();
        $columnNames = ['Employee', 'Transport', 'Traveled distance', 'Compensation entire month', 'Payment date', 'Month'];

        $rows = [];
        $monthsOfTheYear = $helper->getAllMonths();
        $employees = Employee::all();
        foreach ($employees as $employee){
            foreach($monthsOfTheYear as $month){
                $rows[] = $this->getAllowanceOverview($month, $employee);
            }
        }
        return $helper->getCsv($columnNames, $rows, 'Travel allowance overview.csv');
    }

    public function getAllowanceOverview($month, Employee $employee){
        $helper = new Helper();

        $firstMondayOfMonth = new DateTime('first monday of '. $month .' '. date('Y'));
        $paymentDate = new DateTime() > $firstMondayOfMonth ? $firstMondayOfMonth->format('Y-m-d') : 'Not yet payed';

        $compensationPerKm = $employee->transport->getCompensationPerKm($employee);
        $workdays = $helper->getWorkingDays($month, $employee->workdays_per_week);
        $monthlyDistance = $employee->distance_from_work * 2 * $workdays;
        $monthlyKmCompensation = $monthlyDistance * $compensationPerKm;

        return [
            $employee->name,
            $employee->transport->name,
            $monthlyDistance.'km',
            $monthlyKmCompensation. ' euros',
            $paymentDate,
            $month
        ];
    }

}
