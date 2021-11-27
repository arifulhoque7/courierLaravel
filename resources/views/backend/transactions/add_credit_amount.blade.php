@extends('backend.layouts.app')
@php
$user_type = Auth::user()->user_type;
$staff_permission = json_decode(Auth::user()->staff->role->permissions ?? '[]');
$credits = DB::table('save_credit')->get();
$client_credits = DB::table('client_credit_amount')->get();

@endphp

{{-- @foreach ($client_credits as $client_credit)
@php
    dd($client_credit->client_id); 
@endphp
   
@endforeach --}}

@section('sub_title'){{ translate('Credit') }}@endsection
@section('subheader')
    <!--begin::Subheader-->
    <div class="py-2 subheader py-lg-6 subheader-solid" id="kt_subheader">
        <div class="flex-wrap container-fluid d-flex align-items-center justify-content-between flex-sm-nowrap">
            <!--begin::Info-->
            <div class="flex-wrap mr-1 d-flex align-items-center">
                <!--begin::Page Heading-->
                <div class="flex-wrap mr-5 d-flex align-items-baseline">
                    <!--begin::Page Title-->
                    <h5 class="my-1 mr-5 text-dark font-weight-bold">{{ translate('Add Credit') }}</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="p-0 my-2 mr-5 breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold font-size-sm">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-muted">{{ translate('Dashboard') }}</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted">{{ translate('Add Credit') }}</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
@endsection
@section('content')
    @php
    $auth_user = Auth::user();
    @endphp
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="flex-wrap py-3 card-header">
            <div class="card-title">
                <h3 class="card-label">
                </h3>
            </div>

            <div class="card-body">
                <form action="" method="psot">
                    <table class="table aiz-table">

                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">{{ translate('Customer Name') }}</th>
                                <th class="text-center">{{ translate('Customer Email') }}</th>
                                <th class="text-center">{{ translate('Transaction ID') }}</th>
                                {{-- <th class="text-center">{{ translate('Paid Amount') }}</th> --}}
                                <th class="text-center">{{ translate('Due Amount') }}</th>
                                <th class="text-center">{{ translate('Shipment Count') }}</th>
                                <th class="text-center">{{ translate('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @php
                            $i = 1;
                        @endphp --}}
                            {{-- @foreach ($credits as $credit)
                            @php
                                $user_id = DB::table('user_client')
                                    ->where('client_id', $credit->client_id)
                                    ->value('user_id');
                                $client_name = DB::table('users')
                                    ->where('id', $user_id)
                                    ->value('name');
                                $client_email = DB::table('users')
                                    ->where('id', $user_id)
                                    ->value('email');
                                $client_total_cost = DB::table('shipments')
                                    ->where([['client_id', $credit->client_id], ['delivery_time', 'Regular']])
                                    ->sum('shipping_cost');
                                
                                $client_total_due = DB::table('client_credit_amount')
                                    ->where('client_id', $user_id)
                                    ->value('total_due');
                                
                                $client_shipment_count = DB::table('client_credit_amount')
                                    ->where('client_id', $user_id)
                                    ->value('shipment_count');
                            @endphp
                            <tr>
                                <td class="text-center">{{ $i }}</td>
                                <td class="text-center">{{ $client_name }}</td>
                                <td class="text-center">{{ $client_email }}</td>
                                <td class="text-center">{{ $credit->transaction_id }}</td>
                                <td class="text-center">{{ $credit->total_paid_amount }}</td>
                                <td class="text-center">{{ $client_total_due }}</td>
                                <td class="text-center">{{ $client_shipment_count }}</td>
                                <td class="text-center"><a
                                        href="{{ route('admin.add.credit.amount', [$credit->id, $user_id, $credit->client_id]) }}"><i
                                            class="la la-send-o" type="submit"></i></a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach --}}

                            @php
                                $i = 1;
                            @endphp
                            @foreach ($client_credits as $client_credit)
                                @php
                                    
                                    $client_name = DB::table('users')
                                        ->where('id', $client_credit->client_id)
                                        ->value('name');
                                    
                                    $client_email = DB::table('users')
                                        ->where('id', $client_credit->client_id)
                                        ->value('email');
                                    
                                    $client_credit_client_id = DB::table('user_client')
                                        ->where('user_id', $client_credit->client_id)
                                        ->value('client_id');
                                    
                                    $transaction_id = DB::table('save_credit')
                                        ->where('client_id', $client_credit_client_id)
                                        ->value('transaction_id');
                                    
                                    $paid_amount = DB::table('save_credit')
                                        ->where('client_id', $client_credit_client_id)
                                        ->value('total_paid_amount');
                                    
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $i }}</td>
                                    <td class="text-center">{{ $client_name }}</td>
                                    <td class="text-center">{{ $client_email }}</td>
                                    <td class="text-center">{{ $transaction_id }}</td>
                                    {{-- <td class="text-center">{{ $paid_amount }}</td> --}}
                                    <td class="text-center">{{ $client_credit->total_due }}</td>
                                    <td class="text-center">{{ $client_credit->shipment_count }}</td>
                                    <td class="text-center"><a
                                            href="
                                            @if (!$client_credit->id == null)
                                            {{ route('admin.add.credit.amount', ['id'=>$client_credit->id, 'user_id'=> $client_credit->client_id, 'client_id'=> $client_credit_client_id]) }}"
                                            @endif ><i
                                                class="la la-send-o" type="submit"></i></a>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
    </div>


@endsection
