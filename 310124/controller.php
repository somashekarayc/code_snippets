<?php
// ========================== by som ===========================

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\SecurityGuardAdvanceSalary;

class SecurityGuardAdvanceSalaryController extends Controller
{

    public function index(Request $request)
    {
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start = $request->start_date;
            $end   = $request->end_date;
        } else {
            $start = date('Y-m-01');
            $end   = date('Y-m-t');
        }
        // $security_guard_advance_salaries    = SecurityGuardAdvanceSalary::where('created_at', '>=', $start)->where('created_at', '<=', $end)->get();
        $security_guard_advance_salaries    = SecurityGuardAdvanceSalary::get();
        $filter['startDateRange']   = $start;
        $filter['endDateRange']     = $end;

        return view('salary.securityGuardAdvanceSalary.index', compact('security_guard_advance_salaries', 'filter'));
    }

    public function create()
    {

        $employees       = User::where('type', 'security_guard')->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $employees->prepend(__('Select Staff'), 0);

        return view('salary.securityGuardAdvanceSalary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        if (\Auth::user()->type == 'company') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'balance' => 'required',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $security_guard_salary                  = new SecurityGuardAdvanceSalary();
            $security_guard_salary->user_id         = $request->emp_no;
            $user                                   = Employee::where('user_id', $request->emp_no)->first();
            $security_guard_salary->emp_no          = $user->employee_id;
            $security_guard_salary->adv_salary_date = $request->adv_salary_date;
            $security_guard_salary->salary          = $request->salary;
            $security_guard_salary->advance         = $request->advance;
            $security_guard_salary->balance         = $request->balance;
            $security_guard_salary->save();

            return redirect()->route('securityGuardAdvanceSalary.index')->with('success', 'Salary added for security guard successfully.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show($id)
    {
        //
    }


    public function edit(securityGuardAdvanceSalary $securityGuardAdvanceSalary)
    {
        $employees       = User::whereIn('type', ['security_guard'])->where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

        return view('salary.securityGuardAdvanceSalary.edit', compact('securityGuardAdvanceSalary', 'employees'));
    }


    public function update(Request $request, securityGuardAdvanceSalary $securityGuardAdvanceSalary)
    {
        if (\Auth::user()->type == 'company') {

            $validator = \Validator::make(
                $request->all(),
                [
                    'emp_no' => 'required',
                    'balance' => 'required',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $security_guard_salary                  = securityGuardAdvanceSalary::where('id', $securityGuardAdvanceSalary->id)->first();;
            $security_guard_salary->user_id         = $request->emp_no;
            $user                                   = Employee::where('user_id', $request->emp_no)->first();
            $security_guard_salary->emp_no          = $user->employee_id;
            $security_guard_salary->adv_salary_date = $request->adv_salary_date;
            $security_guard_salary->salary          = $request->salary;
            $security_guard_salary->advance         = $request->advance;
            $security_guard_salary->balance         = $request->balance;
            $security_guard_salary->save();

            return redirect()->route('securityGuardAdvanceSalary.index')->with('success', 'Salary added for security guard successfully.');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function destroy(SecurityGuardAdvanceSalary $securityGuardAdvanceSalary)
    {
        if (\Auth::user()->type == 'company') {
            $securityGuardAdvanceSalary = SecurityGuardAdvanceSalary::find($securityGuardAdvanceSalary->id);
            $securityGuardAdvanceSalary->delete();
            return redirect()->route('securityGuardAdvanceSalary.index')->with('success', __('Security guard advance salary deleted successfully.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
