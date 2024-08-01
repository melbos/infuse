{{--
  Keywords: Carousel, Karussell, Testimonial, Referenzen, Referenz, example, Beispiel
  Description: To display testimonials as carousel.
  Description-de: Um Referenzen in einem Karussell darzustellen.
  Category: team-jobs-testimonial
--}}

<x-block :block="$block_info">
    @isset($background)
      <x-background :background="$background"/>
    @endisset
    <div class="b-testimonials-carousel__body c-component-gap c-js-carousel">
        <div class="container">
            <x-section-header :header="$section_header" class="c-section-header--include-pagination" />
            <x-text :text="$text" />
        </div>

        <div
            class="container{{ floor($items_mobile) != $items_mobile ? ' container--no-padding-mobile' : '' }}{{ floor($items_tablet) != $items_tablet ? ' container--no-padding-tablet' : '' }}">
            <div class="b-testimonials-carousel__body-carousel swiper" data-items-desktop="{{ $items_desktop }}"
                data-items-tablet="{{ $items_tablet }}" data-items-mobile="{{ $items_mobile }}"
                data-autoplay="{{ $autoplay }}"
                @if ($autoplay == 1) data-autoplay-speed="{{ $autoplay_speed }}" @endif>
                @if (isset($testimonials) && is_array($testimonials) && !empty($testimonials))
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <x-testimonial :testimonial="$testimonial['testimonial']" />
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div class="container">
            <x-buttons :buttons="$buttons" class="c-buttons--justify-center" />
        </div>
    </div>
</x-block>
