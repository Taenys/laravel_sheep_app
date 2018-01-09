@extends('layouts.app')

@section('scripts')
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection

@section('content')
    {{$spending->links()}}
    <table class="table">
        <caption>Optional table caption.</caption>
        <thead>
        <tr>
            <th>Titre</th>
            <th>Price</th>
            <th>Associate</th>
            <th>Date</th>
            <th>Show</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @forelse($spending as $spend)
            <tr>
                <th scope="row"><a href="{{route('spending.edit', $spend->id)}}">{{$spend->title}}</a></th>
                <td>{{$spend->price}}</td>
                <td>@foreach($spend->users as $user){{$user->name}} - @endforeach</td>
                <td>{{$spend->created_at}}</td>
                <td><a href="{{route('spending.show', $spend->id)}}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a></td>
                <td>
                    <form class="delete" action="{{route('spending.destroy', $spend->id)}}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input class="glyphicon glyphicon-remove-circle" type="submit" value="delete">
                    </form>
                </td>
            </tr>
        @empty
            <p>On a rien dépenser gros !</p>
        @endforelse
        </tbody>
    </table>
{{$spending->links()}}

@endsection

