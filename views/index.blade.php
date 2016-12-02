<h1>test</h1>

@foreach ($scrapers as $scraper)
    <div class="calendar-graph">{!! $scraper->activitysvg !!}</div>
@endforeach

{!! $html !!}