<div>
    @if (Auth::user())
    @if (Auth::user()->level == 1)
    <i class="far fa-plus-square"></i>
    <i class="fas fa-plus"></i>
    @endif
        
    @endif
</div>
