@if ($errors->any())
    <div class="div red white-text alert-padding">
        <h6>Error:</h6>
        <ul class="browser-default">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif