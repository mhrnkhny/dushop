@php($icon = isset($icon) ? $icon : null )
@php($class = isset($class) ? $class : 'btn btn-success' )

<button class="{{$class}}">
    {{$icon}}
    {{$buttonName}}
</button>
