<div class="rating">
    @for($i = 1; $i <= 5; $i++ )
        <svg aria-hidden="true" class="rating__icon @if($rate >= $i) rating__icon--active @endif "><use href="/assets/svg/svg.svg#star"></use></svg>
    @endfor
</div>
