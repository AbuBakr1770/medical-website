@extends('layouts.doctor.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','today_app')->first()->custom_lang }}</title>
@endsection
@section('doctor-content')
    <!-- DataTales Example -->
    <div class="mb-4">
        <div class="row" id="searchSchedule">
            <div class="col-md-3">
                <select name="schedule_id" class="form-control select2" id="schedule_id">
                    <option value="">{{ $websiteLang->where('lang_key','select_schedule')->first()->custom_lang }}</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}">{{ $schedule->start_time.'-'.$schedule->end_time }}</option>
                    @endforeach
                </select>
                <p class="invalid-feedback d-none" id="schedule_error"></p>
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}" id="doctor_id">
            </div>
            <div class="col-md-3">
               <button type="button" id="searchDoctorSchedule" class="btn btn-success">{{ $websiteLang->where('lang_key','search')->first()->custom_lang }}</button>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $websiteLang->where('lang_key','today_app')->first()->custom_lang }}</h6>
        </div>
        <div class="card-body" id="search-appointment">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">{{ $websiteLang->where('lang_key','serial')->first()->custom_lang }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','name')->first()->custom_lang }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','email')->first()->custom_lang }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','phone')->first()->custom_lang }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','date')->first()->custom_lang }}</th>
                            <th width="15%">{{ $websiteLang->where('lang_key','time')->first()->custom_lang }}</th>
                            <th width="5%">{{ $websiteLang->where('lang_key','payment')->first()->custom_lang }}</th>
                            <th width="10%">Lead Status</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','action')->first()->custom_lang }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $index => $item)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ ucfirst($item->user->name) }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ date('m-d-Y',strtotime($item->date)) }}</td>
                            <td>{{ strtoupper($item->schedule->start_time).'-'.strtoupper($item->schedule->end_time) }}</td>
                            <td>
                                @if ($item->payment_status==0)
                                        <span class="badge badge-danger">{{ $websiteLang->where('lang_key','pending')->first()->custom_lang }}</span>
                                    @else
                                    <span class="badge badge-success">{{ $websiteLang->where('lang_key','success')->first()->custom_lang }}</span>
                                    @endif
                            </td>
{{--                            Lead status abhi doctor k admin panel sy view appointment open nai hota os ki logic lagani ha--}}
                            <td>
{{--                                    <span class="badge badge-success">{{ $websiteLang->where('lang_key','success')->first()->custom_lang }}</span>--}}
                                    <span class="badge badge-success">Client interested</span>
                            </td>
                            <td>
                                <a  href="{{ route('doctor.treatment',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <script>
	(function($) {

    "use strict";

         // remove prescribe medicine input field row
         $(document).on('click', '#searchDoctorSchedule', function () {
            var schedule_id=$("#schedule_id").val();
            var doctor_id=$("#doctor_id").val();
            if(schedule_id){
                $('#schedule_id').removeClass('is-invalid')
                $('#schedule_error').addClass('d-none')
                $.ajax({
                    type: 'GET',
                    url: "{{ route('doctor.search.appointment') }}",
                    data:{'schedule_id':schedule_id,'doctor_id':doctor_id},
                    success: function (response) {
                        $('#search-appointment').html(response)
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });

            }else{
                toastr.error('{{ $valid }}')
                $('#schedule_id').addClass('is-invalid')
                $('#schedule_error').text('{{ $valid }}')
                $('#schedule_error').removeClass('d-none')
            }


        });

})(jQuery);
    </script>

@endsection
