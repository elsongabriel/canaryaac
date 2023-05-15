<?php
/**
 * Validator class
 *
 * @package   CanaryAAC
 * @author    Lucas Giovanni <lucasgiovannidesigner@gmail.com>
 * @copyright 2022 CanaryAAC
 */

namespace App\Controller\Pages;

use App\Model\Functions\Calendar;
use App\Utils\View;

class EventCalendar extends Base
{

    public static function viewEventCalendar($request)
    {
        $current_day   = date('d');
        $calendarmonth = date('m');
        $calendaryear  = date('Y');

        $queryParams = $request->getQueryParams();
        if (!empty($queryParams)) {
            $calendarmonth = $queryParams['calendarmonth'];
            $calendaryear  = $queryParams['calendaryear'];
        }
//        $total_days_month = cal_days_in_month(CAL_GREGORIAN, $calendarmonth, $calendaryear);
//        for ($i = 0; $i < $total_days_month; $i++) {
//            $month[] = [
//                'day' => $i,
//                'currentday' => $current_day,
//            ];
//        }
//        die(json_encode(EventSchedule::getServerEvents()));

//        $calendar = ;
//        $calendar->addEvents(EventSchedule::getServerEvents())
//        $calendar->addEvent('Rapid Respawn', '2023-05-14', 7, 'red');

        $content = View::render('pages/eventcalendar', [
            'currentday' => $current_day,
            'day'        => new Calendar(date("$calendaryear-$calendarmonth-$current_day")),
        ]);
        return parent::getBase('Event Schedule', $content, 'eventcalendar');
    }
}
