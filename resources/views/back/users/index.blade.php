@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

@section('content')
    <table class="table">
        <caption>Optional table caption.</caption>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Avatar</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pictures as $picture)
            <tr>
                <th scope="row">{{$picture->name}}</th>
                <td><img src="../../img/{{$picture->link}}"></td>
            </tr>
        @empty
            <p>Pas de gentils pouloulou</p>
        @endforelse
        </tbody>
    </table>


@endsection

