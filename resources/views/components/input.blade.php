<div class="form-group {{$errors->has($name) ? 'has-error' : ''}}">
    <label for="{{$name}}">{{ $label }}</label>

    <input
            id="{{$name}}"
            type="{{isset($type) ? $type : 'text'}}"
            class="form-control @error($name) is-invalid @enderror"
            name="{{$name}}"
            value="@if(old($name)){{old($name)}}@elseif(isset($default)){{$default}}@endif"
            placeholder="{{isset($placeholder) ? $placeholder : ''}}"
    >

    @error($name)
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
