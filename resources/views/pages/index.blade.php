@extends('template')

@section('content')
	<h3>Директория: storage/{!! $path !!}</h3>
	<table>
		<thead>  
			<tr>  
				<th>Объект</th>  
				<th>Тип</th>  
			</tr>  
		</thead>
		<tbody>
			@if (count($dir_objects) > 0)
				@foreach ($dir_objects as $obgect)
					<tr>
						<td>
					@if($obgect['type'] == 'dir')
						<a href="/{!! $obgect['url'] !!}">{!! $obgect['name'] !!}</a>
					@else
						{!! $obgect['name'] !!}
					@endif
						</td>
						<td>
						{!! $obgect['type'] !!}
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="2" style="font-weight: bold">Директория пуста или не найдена</td>
				</tr>
			@endif
		</tbody>	
	</table>
@endsection