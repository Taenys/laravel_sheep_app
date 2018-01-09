@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

@section('content')
    <table class="table">

        <thead>
        <tr>
            <th>Nom</th>
            <th>Parts</th>
            <th>Price Stay</th>
            <th>Debit</th>
            <th>Crédit</th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            @php
                $priceStay = round($pricePart*$user->part->day, 2);
                $priceDebit =  $user->spendings()->sum('spending_user.price');
            @endphp
            <tr>
                <th scope="row">{{$user->name}}</th>
                <th scope="row">{{$user->part->day}}</th>
                <th scope="row">{{ $priceStay }}</th>
                <th scope="row">{{ $priceDebit }}</th>
                <th scope="row">{{ $priceStay - $priceDebit }}</th>
            </tr>
        @empty
            <p>Pas de gentils pouloulou</p>
        @endforelse
        </tbody>
    </table>


@endsection

