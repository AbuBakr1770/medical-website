@extends('layouts.admin.layout')
@section('title')
<title>{{ $websiteLang->where('lang_key','app')->first()->custom_lang }}</title>
@endsection
@section('admin-content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $websiteLang->where('lang_key','app_history')->first()->custom_lang }}</h6>
        </div>
        <div class="card-body" id="search-appointment">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1%">{{ $websiteLang->where('lang_key','serial')->first()->custom_lang }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','name')->first()->custom_lang }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','email')->first()->custom_lang }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','phone')->first()->custom_lang }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','date')->first()->custom_lang }}</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','schedule')->first()->custom_lang }}</th>
                            <th width="5%">{{ $websiteLang->where('lang_key','payment')->first()->custom_lang }}</th>
{{--                            <th width="5%">{{ $websiteLang->where('lang_key','treated')->first()->custom_lang }}</th>--}}
                            <th width="5%">Lead status</th>
                            <th width="10%">{{ $websiteLang->where('lang_key','action')->first()->custom_lang }}</th>
                            <th width="20%">Assigned to</th>
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
                            <td>{{ optional($item->schedule)->start_time.'-'.optional($item->schedule)->end_time }}</td>
                            <td>
                                @if ($item->payment_status==0)
                                        <span class="badge badge-danger">{{ $websiteLang->where('lang_key','pending')->first()->custom_lang }}</span>
                                    @else
                                    <span class="badge badge-success">{{ $websiteLang->where('lang_key','success')->first()->custom_lang }}</span>
                                    @endif
                            </td>

                            <td>
                                <span class="badge badge-success">Client Interested</span>
                            </td>
                            <td>
                                <a  href="{{ route('admin.appointment.show',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                            </td>

{{--                            <td>--}}
{{--                                <a  href="{{ route('admin.appointment.show',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>--}}
{{--                            </td>--}}
                            <td>
                                {{--                                <a  href="#" class="btn btn-success btn-lg"><i class="fas fa-eye"></i></a>--}}
                                <div class="">
                                    <select>
                                        <option>Employee 1</option>
                                        <option>Employee 2</option>
                                        <option>Employee 3</option>
                                        <option>Employee 4</option>
                                        <option>Employee 5</option>
                                        <option></option>
                                    </select>
{{--                                    Save changes wala button sirf tab show hoo ga jab koi employee select hoo chuka hoo--}}
                                    <button class="btn btn-success btn-sm mt-1">Save changes</button>
                                </div>
                                <div class="text-muted">
{{--                                    Agr lead kisi ko assign ha tou employee /s  ka/k naam list ki shakal show hoo ga warna--}}
                                    <ol style="list-style: disc">
                                        <li>Employee's Name</li>
                                    </ol>
                                    <p>This lead is currently assigned to no one</p>
                                </div>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

