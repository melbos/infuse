@if(isset($buttons) && ! empty($buttons) && is_array($buttons) && ! empty($buttons['buttons']) )
	<div class="c-buttons {{ $class }}">
		@foreach($buttons['buttons'] as $btn)
		 	@if($btn['button_type'] == 'link' && is_array($btn['link']) && !empty($btn['link']['url']))
				<a href="{{ App\ia_update_domain_in_url($btn['link']['url']) }}" target="{{ $btn['link']['target'] ?: '_self' }}" class="{{ $btn['btn_class'] }}" @if(in_array('download', $btn['button_variation'])) download @endif>
					<x-button-label :label="$btn['link']['title']" :btn="$btn" />
				</a>
			@elseif($btn['button_type'] == 'page-or-post')
				<a href="{{ get_the_permalink($btn['page_or_post']) }}" class="{{ $btn['btn_class'] }}" @if(in_array('download', $btn['button_variation'])) download @endif>
					<x-button-label :label="$btn['button_label']" :btn="$btn" />
				</a>
			@elseif($btn['button_type'] == 'modal')
				TO DO MODAL
			@endif
		@endforeach
	</div>
@endif
