<div class="form-group">
    @if($el->label)
    <label for="{{$el->printId()}}">{{$el->label}}</label>
    @endif
    <input  id="{{$el->printId()}}"
            type="{{$el->type}}"
            {!! $el->name ? 'name="'.$el->name.'"' : '' !!}
            value="{{$el->getValue($el->name)}}"
            class="form-control">

    @if($el->name)
    @error($el->name)
    <div class="form-text text-danger">
        {{$message}}
    </div>
    @enderror
    @endif

    @if($el->help)
    <div class="form-text text-muted">
        {{$el->help}}
    </div>
    @endif
</div>
