@extends('layout')

@section('content')

@foreach ($scrapers as $scraper)
<div class="scraperinformation">	
	<div class="information">
		<span class="displayname">{!! $scraper->displayName !!}</span>
		<br>
	</div>
	<div class="calendar-graph">{!! $scraper->activitysvg !!}</div>
</div>
@endforeach

{!! $html !!}

@endsection