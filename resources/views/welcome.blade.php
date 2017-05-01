@extends('layouts.app')

@section('content')

            <h2 align="center">Nr-Challenge</h2><br>
            <div class="row" align="center">
                <a href="{{ route('sebrae') }}" class="btn btn-primary" id="sebrae" title="">Sebrae</a><br><br>
                <a href="{{ route('cnpq') }}" class="btn btn-primary" id="cnpq" title="">Cnpq</a>
            </div>
@endsection
        

        
