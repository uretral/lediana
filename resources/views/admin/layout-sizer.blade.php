<div class="resizer">
    @if($data)
        <div class="stand">
            <img src="{{asset('storage/'.$data['tpl'])}}" alt="tpl"/>

            @foreach($data['photos'] as $k => $photo)
                <div class="figure photo" data-elem="photos[{{$photo['id']}}]"
                     style="top: {{$photo['top']}}%; right: {{$photo['right']}}%; bottom: {{$photo['bottom']}}%; left: {{$photo['left']}}%;"></div>
            @endforeach

            @foreach($data['texts'] as $k => $text)
                <div class="figure text" data-elem="texts[{{$text['id']}}]"
                     style="top: {{$text['top']}}%; right: {{$text['right']}}%; bottom: {{$text['bottom']}}%; left: {{$text['left']}}%;"></div>
            @endforeach

            <div class="draggable top"></div>
            <div class="draggable right"></div>
            <div class="draggable bottom"></div>
            <div class="draggable left"></div>
        </div>
    @endif

</div>



<script>
    window.onload = function () {

        let figures = document.querySelectorAll('.figure')
        let e, stand,currentRect, index
        // let currentRect
        figures.forEach(function (el, i) {
            el.onclick = function () {
                e = figures[i];
                stand = document.querySelector('.stand').getBoundingClientRect()
                index = e.getAttribute('data-elem')
                initTop(e);
                initRight(e);
                initBottom(e);
                initLeft(e);

                rs()
            }
        })

        function getRight(left, width) {
            return stand.width - 2 - (left + width)
        }

        function getBottom(top, height) {
            return stand.height - 2 - (top + height)
        }

        function initTop(e) {
            currentRect = e.getBoundingClientRect()
            let draggableTop = document.querySelector('.draggable.top')
            draggableTop.style.top = e.offsetTop + 'px'
            draggableTop.style.left = e.offsetLeft + currentRect.width / 2 + 'px'
        }

        async function initRight(e) {
            currentRect = e.getBoundingClientRect()
            let draggableRight = await document.querySelector('.draggable.right')
            draggableRight.style.top = e.offsetTop + currentRect.height / 2 + 'px'
            draggableRight.style.left = 'unset'
            draggableRight.style.right =  (stand.width - 2 - e.offsetLeft - currentRect.width ) + 'px'
        }

        function initBottom(e) {
            currentRect = e.getBoundingClientRect()
            let draggableBottom = document.querySelector('.draggable.bottom')
            draggableBottom.style.bottom = getBottom(e.offsetTop, currentRect.height) + 'px'
            draggableBottom.style.top = 'unset'
            draggableBottom.style.left = e.offsetLeft + currentRect.width / 2 + 'px'
        }

        function initLeft(e) {
            currentRect = e.getBoundingClientRect()
            let draggableLeft = document.querySelector('.draggable.left')
            draggableLeft.style.top = e.offsetTop + currentRect.height / 2 + 'px'
            draggableLeft.style.left = e.offsetLeft + 'px'
        }





        function rs() {


            let draggable = document.querySelectorAll('.draggable');

            // TOP
            new Draggabilly(draggable[0], {
                axis: 'y',
                containment: '.stand',
            }).on('dragMove', function () {

                e.style.top = this.position.y + 'px'
                initRight(e);
                initBottom(e);
                initLeft(e);

                document.querySelector('input[name="' + index + '[top]"]').value = (this.position.y / stand.height * 100).toFixed(2)
            })

            // RIGHT
            new Draggabilly(draggable[1], {
                axis: 'x',
                containment: '.stand'
            }).on('dragMove', function () {
                // let R = document.querySelector('.stand').getBoundingClientRect()

                initTop(e);
                initBottom(e);
                initLeft(e);
                e.style.right = stand.width - 2 - this.position.x + 'px'
                document.querySelector('input[name="' + index + '[right]"]').value = ((stand.width - 2 - this.position.x) / stand.width * 100).toFixed(2)
            })

            // BOTTOM
            new Draggabilly(draggable[2], {
                axis: 'y',
                containment: '.stand'
            }).on('dragMove', function () {
                // let B = document.querySelector('.stand').getBoundingClientRect()
                e.style.bottom = stand.height - this.position.y + 'px'
                initRight(e);
                initTop(e);
                initLeft(e);
                document.querySelector('input[name="' + index + '[bottom]"]').value = ((stand.height - 2 - this.position.y) / stand.height * 100).toFixed(2)
            })

            // LEFT
            new Draggabilly(draggable[3], {
                axis: 'x',
                containment: '.stand'
            }).on('dragMove', function () {
                // let L = document.querySelector('.stand').getBoundingClientRect()
                e.style.left = this.position.x + 'px'
                initRight(e);
                initBottom(e);
                initTop(e);
                document.querySelector('input[name="' + index + '[left]"]').value = (this.position.x / stand.width * 100).toFixed(2)
            })

            draggable.forEach(function (el, i) {
                el.style.display = 'block'
            })
        }

    }
</script>
