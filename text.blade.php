@if(isset($text) && ! empty($text) && is_array($text) && !empty($text['text']) )
  <div class="{{ $classes }}" @if($text['use_custom_color']) style="--color:{{ $text['color'] }};" @endif >
    {!! $text['text'] !!}
  </div>
@endif
