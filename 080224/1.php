//by som 
$themes = Theme::where('status', 1)->orderBy('id', 'asc')->limit(12)->get();

// echo '<pre>';
// print_r($themes);
// die;

@foreach ($themes as $theme)
<div class="case-block-one">
    <div class="inner-box">
        <div class="image-box">
            <figure class="image"><img src="{{ asset('backend/img/vCards/' . $theme['theme_thumbnail']) }}" alt=""></figure>
            <div class="box">
                <a href="{{ asset('backend/img/vCards/' . $theme['theme_thumbnail']) }}" class="lightbox-image" data-fancybox="gallery"><i class="fas fa-search"></i></a>
                <a href="#"><i class="fas fa-link"></i></a>
            </div>
        </div>
        <div class="lower-content">
            <h2><a href="#">{{ $theme['theme_name'] }}</a></h2>
            <div class="text">{{ $theme['theme_description'] }}</div>
        </div>
    </div>
</div>
@endforeach