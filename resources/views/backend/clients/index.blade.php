@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-6">
			<h1 class="h3">{{translate('All Customers')}}</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="{{ route('admin.clients.create') }}" class="btn btn-circle btn-info">
				<span>{{translate('Add New Customers')}}</span>
			</a>
		</div>
	</div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="mb-0 h6">{{translate('Customers')}}</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th  width="3%" style="vertical-align: top !important;">#</th>
                        <th style="vertical-align: top !important;">{{translate('Name')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Email')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Contact')}}</th>
                        <th style="vertical-align: top !important;">{{translate('National ID')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Account Type')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Bank Name')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Bank Branch Name')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Bank Account Number')}}</th>
                        <th style="vertical-align: top !important;">{{translate('Bkash Number')}}</th>
    
                        <th  style="vertical-align: top !important;display:flex !important;" width="10%" class="text-center">{{translate('Options')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $key => $client)
                
                    @php
                         $bank_details= null;
                         $bkash_details = null;
                    
                       $check_id_bank= DB::table('payment_info_bank')->where('client_id', $client->id)->get();
                       
                    if(!empty($check_id_bank))
                    {
                    $bank_details = DB::table('payment_info_bank')->where('client_id', $client->id)->first();
                   
                    
                    }
                    $check_id_bkash= DB::table('payment_info_bkash')->where('client_id', $client->id)->get();
                    
                    if(!empty($check_id_bkash)){
                        $bkash_details = DB::table('payment_info_bkash')->where('client_id', $client->id)->first();
                        
                    }

                    
                    @endphp
                        <tr>
                            <td  width="3%">{{ ($key+1) + ($clients->currentPage() - 1)*$clients->perPage() }}</td>
                                <td width="20%">{{$client->name}}</td>
                                <td width="20%">{{$client->email}}</td>
                                <td width="20%">{{$client->mobile}}</td>
                                <td width="20%">{{$client->national_id}}</td>
                                @if ($bank_details!= null)
                                <td width="20%">{{$bank_details->account_type}}</td>
                                <td width="20%">{{$bank_details->bank_name}}</td>
                                <td width="20%">{{$bank_details->branch_name}}</td>
                                <td width="20%">{{$bank_details->account_number}}</td>
                                @else
                                <td width="20%">--</td>
                                <td width="20%">--</td>
                                <td width="20%">--</td>
                                <td width="20%">--</td>
                                @endif
                                @if ($bkash_details!= null)
                                <td width="20%">{{ $bkash_details->bkash_number}}</td>
                                @else
                                <td width="20%">--</td>
                                @endif
                           
                            <td class="text-center" style="display:flex !important;">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('admin.clients.show', $client->id)}}" title="{{ translate('Show') }}">
		                                <i class="las la-eye"></i>
		                            </a>
		                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('admin.clients.edit', $client->id)}}" title="{{ translate('Edit') }}">
		                                <i class="las la-edit"></i>
		                            </a>
		                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('admin.clients.delete-client', ['client'=>$client->id])}}" title="{{ translate('Delete') }}">
		                                <i class="las la-trash"></i>
		                            </a>
		                        </td>
                        </tr>
               
                @endforeach
        </table>
        <div class="aiz-pagination">
            {{ $clients->appends(request()->input())->links() }}
        </div>
    </div>
</div>
{!! hookView('spot-cargo-shipment-client-addon',$currentView) !!}

@endsection

@section('modal')
    @include('modals.delete_modal')
@endsection
