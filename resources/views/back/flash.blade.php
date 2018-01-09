@if(Session::has('message'))
    <div class="alert alert-{{Session::get('message')['type']?? 'default'}}">
        <p>{{Session::get('message')['content']?? 'No message'}}</p>
    </div>
@endif