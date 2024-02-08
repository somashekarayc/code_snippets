<?php

public function index(Request $request)
{
    $startDate = $request->query('start_date') ?? date('Y-m-d');
    $endDate = $request->query('end_date') ?? date('Y-m-d');

    $security_guard_advance_salaries = $this->filterByDates(SecurityGuardAdvanceSalary::query(), $startDate, $endDate)->get();

}
