<div class="grid grid-cols-2">
    <div class="resultado_left flex flex-col ">
        <p class="text-sm font-bold">{{$title}}</p>
        {!! $slot !!}
    </div>
    <div class="resultado_right">
        {{$rightSide}}
    </div>
</div> <hr>