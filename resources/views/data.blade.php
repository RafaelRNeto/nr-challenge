@extends('layouts.app')

@section('content')
    <h2 align="center">{{ $title }}</h2>
	<p>
        @if($title == 'Sebrae')
    		@for ($i = 0; $i < count($data); $i++)
    			<p>
                    {{ $unit[$i]}}<br>
    				{{ $concurrence[$i]}}<br>
                    {{ $data[$i] }} <br>
                    <hr>
    			</p>
		  @endfor
        @elseif($title == 'Cnpq')
            @for ($i = 0; $i < count($category); $i++)
                <p>
                    <strong>{{ $category[$i] }}</strong><br>
                    {{ $object[$i]}}<br>                   
                    {{ $opening[$i]}}<br>                    
                    <hr>
                    
                </p>
            @endfor
        @endif

	</p>

@endsection



