{{-- ========================== by som =========================== --}}
 @extends('layouts.admin')
 @push('script-page')
 @endpush
 @section('page-title')
     {{ __('Security Gaurd - Advance Salary Details') }}
 @endsection
 @section('title')
     <div class="d-inline-block">
         <h5 class="h4 d-inline-block font-weight-400 mb-0 ">{{ __('Security Gaurd - Advance Salary Details') }}</h5>
     </div>
 @endsection
 @section('breadcrumb')
     <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
     <li class="breadcrumb-item active" aria-current="page">{{ __('Security Gaurd - Advance Salary') }}</li>
 @endsection

 @section('action-btn')
     @if (\Auth::user()->type == 'company')
         <button type="button" class="btn btn-sm btn-primary btn-icon m-1 getclienee" data-bs-toggle="modal" data-bs-target="#exampleModal" data-url="{{ route('securityGuardAdvanceSalary.create') }}" data-size="lg" data-bs-whatever="{{ __('Add Security Guard Advance Salary') }}"> <span class="text-white">
                 <i class="ti ti-plus text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Create') }}"></i></span>
         </button>
     @endif
 @endsection

 @push('script-page')
     <script type="text/javascript" src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
     <script>
         var filename = $('#filename').val();

         function saveAsPDF() {
             var element = document.getElementById('printableArea');
             var opt = {
                 margin: 0.3,
                 filename: filename,
                 image: {
                     type: 'jpeg',
                     quality: 1
                 },
                 html2canvas: {
                     scale: 4,
                     dpi: 72,
                     letterRendering: true
                 },
                 jsPDF: {
                     unit: 'in',
                     format: 'A2'
                 }
             };
             html2pdf().set(opt).from(element).save();
         }



         function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;

             document.body.innerHTML = printContents;

             window.print();

             document.body.innerHTML = originalContents;
         }
     </script>
 @endpush





 @section('filter')
 @endsection

 @section('content')
     <div class="col-xl-12">
         <div class="card card-body">
             <div class="row d-flex justify-content-end">

                 <div class="col-auto">
                     <input type="hidden" value="{{ __('Security Guard Staff Advance salary') . ' ' . 'Report of' . ' ' . $filter['startDateRange'] . ' to ' . $filter['endDateRange'] }}" id="filename">
                     <div class="card p-4 mb-4">
                         <h6 class="report-text gray-text mb-0">{{ __('Advance Salary') }} :</h6>
                         <h7 class="report-text mb-0">{{ __('Security Guard Staff') }}</h7>
                     </div>
                 </div>

                 <div class="col-auto">
                     <div class="card p-4 mb-4">
                         <h6 class="report-text gray-text mb-0">{{ __('Duration') }} :</h6>
                         <h7 class="report-text mb-0">{{ $filter['startDateRange'] . ' to ' . $filter['endDateRange'] }}</h7>
                     </div>
                 </div>

                 <div class="col-auto ">
                     {{ Form::open(['route' => ['securityGuardAdvanceSalary.index'], 'method' => 'GET', 'id' => 'securityGuardAdvanceSalary']) }}
                     <div class="all-select-box">
                         <div class="btn-box">
                             {{ Form::label('start_date', __('Start Date'), ['class' => 'text-type']) }}
                             {{ Form::date('start_date', $filter['startDateRange'], ['class' => 'month-btn form-control']) }}
                         </div>
                     </div>
                 </div>
                 <div class="col-auto">
                     <div class="all-select-box">
                         <div class="btn-box">
                             {{ Form::label('end_date', __('End Date'), ['class' => 'text-type']) }}
                             {{ Form::date('end_date', $filter['endDateRange'], ['class' => 'month-btn form-control']) }}
                         </div>
                     </div>
                 </div>

                 <div class="col-auto mt-4">
                     <div class="action-btn bg-info ms-2">
                         <a href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle" onclick="document.getElementById('securityGuardAdvanceSalary').submit(); return false;" data-toggle="tooltip" data-original-title="{{ __('apply') }}">
                             <span class="btn-inner--icon"><i class="ti ti-search text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('apply') }}"></i></span>
                         </a>
                     </div>
                     <div class="action-btn bg-danger ms-2">
                         <a href="{{ route('securityGuardAdvanceSalary.index') }}" class="btn btn-sm btn-white btn-icon-only rounded-circle" data-toggle="tooltip" data-original-title="{{ __('Reset') }}">
                             <span class="btn-inner--icon"><i class="ti ti-trash-off text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Reset') }}"></i></span>
                         </a>
                     </div>
                     <div class="action-btn bg-secondary ms-2">
                         <a href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle" onclick="saveAsPDF()" data-toggle="tooltip" data-original-title="{{ __('Download') }}">
                             <span class="btn-inner--icon"><i class="ti ti-download text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Download') }}"></i></span>
                         </a>
                     </div>
                     <div class="action-btn bg-secondary ms-2">
                         <a href="#" class="btn btn-sm btn-white btn-icon-only rounded-circle" onclick="printDiv('printableArea')" data-toggle="tooltip" data-original-title="{{ __('Print') }}">
                             <span class="btn-inner--icon"><i class="ti ti-printer text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Print') }}"></i></span>
                         </a>
                     </div>
                 </div>
             </div>
             {{ Form::close() }}
         </div>
     </div>

     <div class="col-xl-12">
         <div class="card">
             <div class="card-header card-body table-border-style">
                 <!-- <h5></h5> -->
                 <div class="table-responsive">
                     <div id="printableArea">
                         <table class="table" id="pc-dt-simple">
                             <thead>
                                 <tr>
                                     <th scope="col">{{ __('# ID') }}</th>
                                     <th scope="col">{{ __('Emp ID') }}</th>
                                     <th scope="col">{{ __('Emp No') }}</th>
                                     <th scope="col">{{ __('Advance Salary date') }}</th>
                                     <th scope="col">{{ __('Salary') }}</th>
                                     <th scope="col">{{ __('Salary Amount') }}</th>
                                     <th scope="col">{{ __('Advance Amount') }}</th>
                                     <th scope="col">{{ __('Balance') }}</th>
                                     <th scope="col" class="text-right">{{ __('Action') }}</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($security_guard_advance_salaries as $securityguardAdvanceSalary)
                                     <tr>
                                         <td>{{ $loop->index + 1 }}</td>
                                         <td>{{ $securityguardAdvanceSalary->id }}</td>
                                         <td>{{ $securityguardAdvanceSalary->staffs->name }}</td>
                                         <td>{{ $securityguardAdvanceSalary->adv_salary_date }}</td>
                                         <td>{{ $securityguardAdvanceSalary->salary }}</td>
                                         <td>{{ $securityguardAdvanceSalary->advance }}</td>
                                         <td>{{ $securityguardAdvanceSalary->balance }}</td>
                                         <td>
                                             <div class="action-btn bg-info ms-2">
                                                 <a href="#" class="mx-3 btn btn-sm d-inline-flex align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal" data-size="lg" data-url="{{ route('securityGuardAdvanceSalary.edit', $securityguardAdvanceSalary->id) }}" data-bs-whatever="{{ __('Edit Security Guard Salary') }}"> <span class="text-white"> <i class="ti ti-edit" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Edit') }}"></i></span></a>
                                             </div>

                                             <div class="action-btn bg-danger ms-2">
                                                 {!! Form::open(['method' => 'DELETE', 'route' => ['securityGuardAdvanceSalary.destroy', $securityguardAdvanceSalary->id]]) !!}
                                                 <a href="#!" class=" show_confirm  show_confirm mx-3 btn btn-sm d-flex align-items-center">
                                                     <i class="ti ti-trash text-white" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Delete') }}"></i></a>
                                                 {!! Form::close() !!}
                                             </div>
                                         </td>
                                     </tr>
                                 @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
