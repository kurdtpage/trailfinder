@extends('master')
@section('title', 'Homepage')
@section('content')
	Create a track:
	<form action="/create" method="post">
		<input type="text" name="text" placeholder="Text"><br>
		<textarea name="description" placeholder="Description"></textarea><br>
		<textarea name="directions" placeholder="Directions"></textarea><br>
		<input type="number" name="gps_start_x" placeholder="GPS start X" min="-360" max="360" step="0.0000000001"><input type="number" name="gps_start_y" placeholder="GPS start Y" min="-360" max="360" step="0.0000000001"><br>
		<input type="number" name="gps_end_x" placeholder="GPS end X" min="-360" max="360" step="0.0000000001"><input type="number" name="gps_end_y" placeholder="GPS end Y" min="-360" max="360" step="0.0000000001"><br>
		<select name="category">
			@foreach($categorys as $category)
				<option value="{{ $category->id }}">{{ $category->text }}</option>
			@endforeach
		</select>
		{{ csrf_field() }}
		<button type="submit">Submit</button>
	</form>
	<br>
	Current tracks:
	<ul>
		@foreach($tracks as $track)
			<li>
				<strong>{{ $track->text }}</strong><br>
				{{ $track->content }}<br>
				{{ $track->created_at->diffForHumans() }}<br>
				<a href="/track/{{ $track->id }}">View</a>
			</li>
		@endforeach
	</ul>
@endsection