@isset($testimonial)
  <div class="c-testimonial c-testimonial--media-border-radius-{{ $testimonial['media_border_radius'] }}  c-testimonial--desktop-media-{{ $testimonial['media_position_desktop'] }} c-testimonial--mobile-media-{{ $testimonial['media_position_mobile'] }} c-component-gap" style="--bg-color: {{ $testimonial['testimonial_background_color']  }};">
    <div class="c-testimonial__media c-component-gap">
      <x-media :media="$testimonial['media']" />
      <x-testimonial-author :testimonial="$testimonial" />
    </div>
    <div class="c-testimonial__content c-component-gap">
      <div class="c-testimonial__content__text c-component-gap">
        <x-text :text="$testimonial['text']"/>
        <x-testimonial-author :testimonial="$testimonial" />
      </div>
    </div>
  </div>
@endisset
