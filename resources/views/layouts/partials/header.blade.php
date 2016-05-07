@if(isset($title))
    <div class="page-header">
        <h1>{!! $title or '' !!} @if(isset($description)) - {!! $description !!} @endif</h1>
    </div>
@endif