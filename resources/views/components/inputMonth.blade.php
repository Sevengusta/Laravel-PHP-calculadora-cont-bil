<div class="">

    <label for="{{$label}}">
        {{$title}}
        {{-- Data inicial do contrato de trabalho  --}}
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
    <input type="{{$type}}" placeholder="mm/aaaa" name="{{$name}}" value="200" required autocomplete="off">
</div>