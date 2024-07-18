@extends('layouts.admin')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @if(empty($results))
        <p>No results found.</p>
    @else
        @foreach($results as $result)
            <h3>Table: {{ $result->table_name }}</h3>
            <ul>
                @foreach($result as $key => $value)
                    @if($key !== 'table_name')
                        <li>{{ $key }}: {{ $value }}</li>
                    @endif
                @endforeach
            </ul>
        @endforeach
    @endif
@endsection