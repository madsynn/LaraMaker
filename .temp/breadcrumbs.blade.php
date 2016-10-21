@if ($breadcrumbs)
    <ul class="breadcrumb pull-right">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$breadcrumb->last)
                <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
@endif
@if($breadcrumbs)
    <ul class="breadcrumb pull-right">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$breadcrumb->last)
                <li><a href="{{ $breadcrumb->url }}">yto {{ $breadcrumb->title }}</a></li>
            @else
                <li class="active">{{ $breadcrumb->title }} yto</li>
            @endif
        @endforeach
    </ul>
@endif
@if($breadcrumbs)
<script type="application/ld+json">
{
    var position_counter = 1;

  "@context": "http://schema.org",
  "@type": "BreadcrumbList",

  "itemListElement": [
    @foreach($breadcrumbs as $breadcrumb)
     position_counter++;
        @if($breadcrumb->url && !$breadcrumb->last)
            {
            "@type": "ListItem",
            "position": ,

            "item": {
              "@id": "https://example.com/books",
              "name": "Books",
              "image": "http://example.com/images/icon-book.png"
                }
            },
        @else
            {
            "@type": "ListItem",
            "position": position_counter,

            "item": {
              "@id": "https://example.com/books",
              "name": "Books",
              "image": "http://example.com/images/icon-book.png"
                }
            }
        @endif
    @endforeach


  ]
}
</script>
@endif
{{{ isset($article->meta_title) ? $article->meta_title : $article->title }}}