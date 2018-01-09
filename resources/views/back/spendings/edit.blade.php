@extends('layouts.app')
@section('content')
    <div class="container">

        <h1>Viens dépenser tes sous !!!!</h1>

        <h3>Modifier une dépense :</h3>

        <form action="{{route('spending.update', $spending->id)}}" method="post">
            {{ csrf_field() }}
            {{method_field('PUT')}}

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" placeholder="Titre" name="title" value="{{$spending->title}}">
                @if($errors->has('title')) <span class="error">{{$errors->first('title')}}</span> @endif
            </div>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="{{$spending->price}}">
                @if($errors->has('price')) <span class="error">{{$errors->first('price')}}</span> @endif
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" placeholder="Description" name="description" value="{{$spending->description}}">
                @if($errors->has('description')) <span class="error">{{$errors->first('description')}}</span> @endif
            </div>

            <div class="checkbox">

                <label>
                    @foreach($users as $id => $name)
                        <input name="users[]" value="{{$id}}"
                               type="checkbox" class="form-control"
                               id="user" @if( in_array($id, $checkedUsers) )  checked @endif >
                        <label class="form-check-label">{{$name}}</label><br>
                    @endforeach
                </label>
            </div>

            <button type="submit" class="btn btn-default">En avant pour dépenser !</button>

        </form>
    </div>
@endsection