@php $class ??= ''; @endphp
@if(isset($buttons) && empty($buttons['buttons']))
  @php $class = str_replace(['c-section-header--include-buttons','c-section-header--include-buttons-and-pagination'], '', $class); @endphp
@endif
@if (isset($header) && !empty($header) && is_array($header))
    @if ($header['show_section_header'])
        <div class="c-section-header {{ $class }}">
            <div class="c-section-header__content c-component-gap">
                <x-title :title="$header['tagline']" tag="h6" class='c-section-header--tagline' />
                <x-title :title="$header['title']" tag="h2" class='c-section-header--title' />
                <x-title :title="$header['subtitle']" tag="h3" class='c-section-header--subtitle' />
            </div>
            @if(isset($buttons) && !empty($buttons))
              <x-buttons :buttons="$buttons" class="hide--on-mobile" />
            @endif

            @if (isset($class) && str_contains($class, 'c-section-header--include-pagination'))
                <x-section-header-carousel-pagination />
            @endif
        </div>
    @endif
@endif
