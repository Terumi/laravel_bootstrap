<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{$page->meta_description or ''}}">
<meta name="author" content="{{Config::get('site_info')['author']}}">
<meta name="canonical" content="{{$page->meta_canonical != ''? $page->meta_canonical : url($page->path)}}">
<title>{{$page->meta_title or ''}}</title>