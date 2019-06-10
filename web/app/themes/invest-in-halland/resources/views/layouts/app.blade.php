<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphp
    <h1>{{ get_bloginfo('name', 'display') }}</h1>
    @php wp_footer() @endphp
  </body>
</html>
