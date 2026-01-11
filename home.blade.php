@if(!empty(get_option('home_style')))
{{ get_element('home.'.str(get_option('home_style'))->slug()) }}
@else
{{ get_element('home.default') }}
@endif
