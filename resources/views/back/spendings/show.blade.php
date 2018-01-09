@extends('layouts.app')
@section('content')
<div class="container">
    <div class="page-header">
        <h1>Spending</h1>
        <h3 style="text-decoration: underline">{{$spendings->title}}</h3>
        <h3>Total de la dépense : {{$spendings->price}} € </h3>
    </div>

       <h2>Description :</h2>
    <p>{{$spendings->description}}</p>

    <h2>Association Details : </h2>
    <p>@foreach($spendings->users as $user){{$user->name}} -
        Dépensé : {{$user->pivot->price}}<br>@endforeach</p>

</div>
@endsection