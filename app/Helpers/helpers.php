<?php

use Carbon\Carbon;

if (! function_exists('days_until_due')) {
    /**
     * คำนวณจำนวนวันจนถึงครบกำหนด 15 วันนับจากวันที่กำหนด
     *
     * @param string|\Carbon\Carbon $startDate วันที่เริ่มต้น (string หรือ Carbon instance)
     * @return int จำนวนวันที่เหลือ (ค่าติดลบ = เกินกำหนดแล้ว)
     */
    function days_until_due($startDate)
    {
        $start = $startDate instanceof Carbon ? $startDate : Carbon::parse($startDate);
        $dueDate = $start->copy()->addDays(16);
        return now()->diffInDays($dueDate, false) . ' วัน';
    }
}
