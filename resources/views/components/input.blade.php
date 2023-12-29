<input class="border border-{{$color}}-600 {{$size}} p-2 rounded-md text-{{$color}}-600 placeholder-{{$color}}-400 @error($name) border-red-600 @enderror focus:outline-none focus:border-{{$color}}-600"
       type="{{$type}}"
       name="{{$name}}"
       placeholder="{{$placeholder}}"
       value="{{old($name)}}"
>
@error($name)
    <p class="text-red-600 text-xl w-72">{{$error_message}}</p>
@enderror
