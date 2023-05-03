<?php

namespace App\Helpers;

use Carbon\Carbon;

class date
{
    public static function convertToVietNam($date)
    {
        $dateConvert = '';
        switch ($date) {
            case 'Monday':
                $dateConvert = 'Th 2';
                break;
            case 'Tuesday':
                $dateConvert = 'Th 3';
                break;
            case 'Wednesday':
                $dateConvert = 'Th 4';
                break;
            case 'Thursday':
                $dateConvert = 'Th 5';
                break;
            case 'Friday':
                $dateConvert = 'Th 6';
                break;
            case 'Saturday':
                $dateConvert = 'Th 7';
                break;
            case 'Sunday':
                $dateConvert = 'CN';
                break;
        }
        return $dateConvert;
    }

    public function getSixDayFromToday()
    {

        $startDate = Carbon::today();
        $endDate = $startDate->copy()->addDays(5);

// Tạo mảng chứa các ngày
        $dates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $formattedDate = $date->format('d-m-Y');
            $formattedDateShow = $date->format('d/m');
            $formattedDateVN = self::convertToVietNam(strftime('%A', $date->timestamp));

            $dates[] = [
                $formattedDateShow,
                $formattedDate,
                $formattedDateVN,
            ];
        }
        return $dates;
    }
}
