<?php 
// In App\Http\Controllers\Controller.php
namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function filterByDates($model, $startDate = null, $endDate = null)
    {
        // Format dates correctly
        $startDate = $startDate ? Carbon::parse($startDate)->format('Y-m-d') : date('Y-m-d');
        $endDate = $endDate ? Carbon::parse($endDate)->format('Y-m-d') . ' 23:59:59' : null; // Include end time

        return $model->when($startDate, function ($query, $startDate) {
            return $query->where('created_at', '>=', $startDate);
        })->when($endDate, function ($query, $endDate) {
            return $query->where('created_at', '<=', $endDate);
        });
    }
}
