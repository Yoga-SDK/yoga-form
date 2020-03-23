<div class="form-group">
    @if($el->label)
    <label for="{{$el->printId()}}">{{$el->label}}</label>
    @endif

    <select  id="{{$el->printId()}}"
            {!! $el->name ? 'name="'.$el->name.'"' : '' !!}
            class="form-control">
        @foreach($el->getOptions() as $key => $value)
        <option value="{{$key}}">{{__($value)}}</option>
        @endforeach
    </select>

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
