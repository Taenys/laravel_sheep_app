@extends('layouts.app')
@section('content')
<div class="container">

    <h1>Histogramme</h1>
        <p>PLACE de l'histogramme</p>

    @include('back.partials.graph')

{{--<div class="col-lg-6">--}}

    {{--@forelse($lastSpendings as $spending)--}}
        {{--<li>{{$spending->title}} - {{$spending->price}} - {{$spending->created_at}}</li>--}}

    {{--@empty--}}
        {{--<p>Pas de dépenses</p>--}}
    {{--@endforelse--}}

{{--</div>--}}

</div>
@endsection