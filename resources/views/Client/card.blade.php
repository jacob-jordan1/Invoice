@extends('layouts.app')

@section('content')

    <section class="card w-full  mb-10 border p-12px border-slate-200">
        <div class="card-header bg-slate-500 text-slate-50">
            {{__('app.Client_details')}}: {{$client->company}}
        </div>
        <div class="card-body w-full flex  flex-col-reverse md:flex-row my-12">
                <div class="card w-full md:w-1/2">
                    <div class="card-body p-6">
                        <ul class="text-lg ">
                            <li>{{__('auth.Company')}}: <strong>{{$client->company}}</strong></li>
                            <li>{{__('auth.Vat')}}: <strong>{{$client->vat}}</strong></li>
                            <li>{{__('auth.Lastname')}}: <strong>{{$client->lastname}}</strong></li>
                            <li>{{__('auth.Firstname')}} : <strong>{{$client->firstname}}</strong></li>
                            <li>{{__('auth.Street')}}: <strong>{{$client->street}} {{$client->nr}}</strong></li>
                            <li>{{__('auth.Post_code')}}: <strong>{{$client->city->code}}</strong></li>
                            <li>{{__('auth.City')}}: <strong>{{$client->city->city}}</strong></li>
                            <li>{{__('auth.Email')}}: <strong>{{$client->email}}</strong></li>
                            <li>{{__('auth.Phone')}}: <strong>{{$client->phone}}</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="card w-full md:w-1/2">
                    <div class="card-body p-6">
                        <div class="flex flex-row items-left md:pl-5">
                <span class="button-text ">
                    <a href="{{route('clients_list')}}">
                        <span class="icon primary">
                            <i class="fas fa-list"></i>
                        </span>
                        <span class="label">
                            {{__('btn.List')}}
                        </span>
                    </a>
                </span>
                            <span class="button-text ">
                    <a href="{{route('client_update', ['client' => $client])}}">
                        <span class="icon success">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="label">
                            {{__('btn.Update')}}
                        </span>
                    </a>
                </span>
                            <span class="button-text ">
                    <a href="{{route('client_delete', ['client' => $client])}}">
                        <span class="icon danger">
                            <i class="fas fa-minus"></i>
                        </span>
                        <span class="label">
                            {{__('btn.Delete')}}
                        </span>
                    </a>
                </span>

                        </div>
                        <ul class="md:p-5 my-6">
                            <li>Date encodage: {{$client->created_at}} </li>
                            <li>Date modification: {{$client->updated_at}}</li>
                        </ul>
                    </div>
                </div>
        </div>
        <div class="card-body w-full">
            <h2 class="text-slate-900 px-6 py-2 my-3">Liste des factures</h2>
            <div class="px-6">
                <table class="table-fixed w-full">
                    <thead class=" hidden md:table-header-group  bg-slate-300 p-6">
                    <tr class="justify-between">
                        <th class="text-left">Référence</th>
                        <th class="text-left  w-full md:w-32">Créé</th>
                        <th class="text-left  w-full md:w-32">Montant</th>
                        <th class="text-right  w-full md:w-32"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($client->invoices as $invoice)
                        <tr class="flex flex-col md:table-row">
                            <td class="w-full md:w-70 text-left before:font-bold before:block before:content-['Référence'] md:before:content-['']">
                                {{$invoice->reference}}
                            </td>
                            <td class=" text-left before:font-bold before:block before:content-['Créé le'] md:before:content-['']">
                                {{ date("d M 'y", strtotime($invoice->created_at)) }}

                            </td>
                            <td class=" text-left w-full md:w-30 before:font-bold before:block before:content-['Montant'] md:before:content-['']">
                                {{$invoice->total}}
                            </td>
                            <td class="flex flex-row justify-around  w-32">
                                <a href="{{route('invoice_show', ['id'=>$invoice->id])}}"
                                   class="button info">
                                    <i class="fas fa-search-plus"></i>
                                </a>

                                <a href="{{route('invoice_edit', ['id'=>$invoice->id])}}"
                                   class="button success">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="{{route('invoice_delete', ['id'=>$invoice->id])}}"
                                   class="button danger">
                                    <i class="fas fa-minus"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>




@endsection
