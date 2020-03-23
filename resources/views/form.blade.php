<form {!! $el->printProps() !!} novalidate>
    @csrf
    @foreach ($el->getChildren() as $child )
        {!! $child !!}
    @endforeach
</form>
