<div class="">
    <label for="{{ $label }}">
        {{ $title }}
    </label>
    <span class="open" onclick="">💭️</span>
    <dialog>
        <div class="popUp">
            <h3 class="flex justify-between p-0">
                <p>dica:</p>
                <span class="closeModal" onclick="">✖️</span>
            </h3>
            <p>{{ $body }}</p>
        </div>
    </dialog>
    
    <input type="number" placeholder="0" name="{{ $name }}" {{ $required ?? null }} autocomplete="off"
        min="{{ $min ?? null }}" max="{{ $max ?? null }}">
</div>
