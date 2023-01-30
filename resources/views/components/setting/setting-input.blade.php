@props([
    'disabled'=>false,
])
{{--@php--}}
{{--$class=$errors->has($attributes->get('name'))?--}}
{{--            'form-control is-valid' :--}}
{{--            'form-control'--}}
{{--@endphp--}}

<input {{$disabled ? 'disabled':''}}  {{$attributes->merge(['class'=>'form-control'])}}/>


@error($attributes->get('name'))
<div class="text-sm text-danger">{{$message}}</div>
@enderror
