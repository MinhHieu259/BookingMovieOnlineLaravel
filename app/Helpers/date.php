<?php

namespace App\Helpers;
use Carbon\Carbon;
class date
{

    function getSixDayFromToday(){
        setlocale(LC_TIME, 'vi_VN'); // Thiết lập ngôn ngữ của hệ thống là tiếng Việt

        $startDate = Carbon::today();
        $endDate = $startDate->copy()->addDays(5);

// Tạo mảng chứa các ngày
        $dates = [];
        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $formattedDate = $date->format('d/m/Y');
            $formattedDateShow = $date->format('d/m');
            $formattedDateVN = strftime('%A', $date->timestamp);

            $dates[] = [
                $formattedDateShow,
                $formattedDate,
                $formattedDateVN,
            ];
        }
        return $dates;
    }
}
