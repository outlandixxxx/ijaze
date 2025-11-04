@extends('layouts.app')

@section('content')
<div class="container mt-11">

    <div class="privacy-section mb-4">
        <div class="px-4">

            <div id="index-title">
                <span>{{ $content['title'] }}</span>
            </div>

            <p>{{ $content['intro'] }}</p>

            <p>
                <strong>{{ $content['publisher'] }}:</strong> B2S PROD
            </p>

            <p>
                <strong>{{ $content['editorial'] }}:</strong><br>
                {{ $content['director'] }}
            </p>

            <p>
                <strong>{{ $content['video'] }}:</strong> {{ $content['video_team'] }}
            </p>

            <p>
                <strong>{{ $content['tech'] }}:</strong> {{ $content['tech_name'] }}
            </p>

            <div id="index-title">
                <span>{{ $content['contact_title'] }}</span>
            </div>

            <p>
                {{ $content['email'] }}: 
                <a href="mailto:contact@ijazplus.com">contact@ijazplus.com</a> 
                {{ $content['or'] }} 
                <a href="mailto:ijazplusmedia@gmail.com">ijazplusmedia@gmail.com</a>
            </p>

            <p>
                {{ $content['phone'] }}: 0633370418
            </p>

            <div id="index-title">
                <span>{{ $content['advertising_title'] }}</span>
            </div>

            <p>
                <a href="mailto:contact@ijazplus.com">contact@ijazplus.com</a> 
                {{ $content['or'] }} 
                <a href="mailto:ijazplusmedia@gmail.com">ijazplusmedia@gmail.com</a>
            </p>

        </div>
    </div>

</div>
@endsection
