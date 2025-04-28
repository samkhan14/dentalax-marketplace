@extends('frontend.layouts.master')
@section('content')

<h1>Testing Data for {{ $city->name }}</h1>

@foreach($dentists as $dentist)
    <div style="border:1px solid #ccc; padding:15px; margin-bottom:20px;">
        <h3>Dentist ID: {{ $dentist->id }}</h3>
        <p>Practice: {{ $dentist->practice_name }}</p>
        <p>User: {{ $dentist->user ? $dentist->user->name : 'No user associated' }}</p>
        <p>City: {{ $dentist->city->name }}</p>
        <pre>{{ print_r($dentist->toArray(), true) }}</pre>
    </div>
@endforeach
@endsection
