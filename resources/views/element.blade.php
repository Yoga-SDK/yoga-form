<div {!! $el->printProps() !!}>
    @foreach ($el->getChildren() as $child )
        {!! $child !!}
    @endforeach
</div>
