<?php

use Illuminate\Support\Facades\Route;

Route::group(
        [
            'middleware' => [
                'auth',
                'XSS',
                'revalidate',
            ],
        ],
        function () {
            

            // by som
            Route::resource('securityGuardAdvanceSalary', SecurityGuardAdvanceSalaryController::class);
            Route::resource('hospitalStaffAdvanceSalary', HospitalStaffAdvanceSalaryController::class);



        }
    );