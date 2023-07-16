<div class="amazingslider-wrapper" id="amazingslider-wrapper-1">
    <div class="amazingslider" id="amazingslider-1">
        <ul class="amazingslider-slides">
            @foreach($slide as $s)
            <li><a target="_blank" title=""><img src="{!! asset('uploads/slider/'.$s->slider_image)!!}" alt="" title="" /></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- <div class="quangcao">

    <div class="row">
        <div class="rundt wrap_1200">
            @foreach($slide as $s)
            <li><a href="#" target="_blank" title=""><img src="{!! asset('uploads/slider/'.$s->slider_image)!!}" alt="" title="" /></a>
            </li>
            @endforeach
        </div>
    </div>

</div> -->