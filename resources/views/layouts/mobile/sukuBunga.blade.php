@extends('layouts.mobile.app')
@section('content')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Suku Bunga</th>
			<th>Bunga p.a</th>
		</tr>
	</thead>
	<tbody>
		@foreach($SukuBungas as $key => $sukuBunga)
		<tr>
			<td>{{ $sukuBunga->name }}</td>
			<td>{{ $sukuBunga->value }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection