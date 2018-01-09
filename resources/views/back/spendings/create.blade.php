@extends('layouts.app')
@section('content')
<div class="container">

    <h1>Viens dépenser tes sous !!!!</h1>

    <h3>Ajouter une nouvelle dépense :</h3>

    <form action="{{route('spending.store')}}" method="post">
        {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" class="form-control" id="title" placeholder="Titre" name="title" value="{{old('title')}}">
        @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span> @endif
    </div>
        <div class="form-group">
            <label for="price">Prix</label>
            <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{old('price')}}">
            @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span> @endif
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{old('description')}}">
            @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span> @endif
        </div>

        <div class="checkbox">
            <label>
                @foreach ($users as $id => $user)
                    <input name="users[]" value="{{$id}}"
                           @if( !empty(old('users')) and in_array($id, old('users'))  )
                           checked
                           @endif
                           type="checkbox" class="form-control"
                           id="user">
                    <label class="form-check-label">{{$user}}</label><br>
                @endforeach
            </label>
        </div>

        <button type="submit" class="btn btn-default">En avant pour dépenser !</button>

    </form>
</div>
@endsection