<div class=" items-center">
    <label for="options">
        {{$title}}
    </label>
    <span class="open" >💭️</span>

    <dialog>
        <div class="popUp">
            <h3 class="flex justify-between p-0">
                <p>dica:</p>
                <span class="closeModal" >✖️</span>
            </h3>
            <p>{{$body}}</p>
        </div>
    </dialog>
    <select name="{{$name}}" >
        {!! $slot !!}
    </select>
</div>