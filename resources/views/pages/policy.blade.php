@extends('layouts.app')

@section('content')
<div class="container mt-11">

    @foreach(range(0, 9) as $i)
        @if($i == 0)
            <div class="privacy-section mb-4">
                <div class="px-4">
                    <div id="index-title">
                        <span>{{ $content['title'] }}</span>
                    </div>
                    <p>{{ $content['intro'] }}</p>
                </div>
            </div>
        @elseif($i <= 3 || $i == 7)
            <div class="privacy-section mb-4">
                <div class="px-4">
                    <div id="index-title">
                        <span>{{ $content['section'.$i.'_title'] }}</span>
                    </div>
                    @if($i == 1)
                        <p>{{ $content['company_name'] }}: B2S PROD</p>
                        <p>{{ $content['address'] }}: 17 PLACE CHARLES NICOLE, RÉS. PASTEUR BUILD. ÉTAGE 7, N°2, CASABLANCA</p>
                        <p>{{ $content['capital'] }}: 100.000 {{ $content['mad'] }}</p>
                        <p>{{ $content['email'] }}: contact@ijazplus.com {{ $content['or'] }} ijazplusmedia@gmail.com</p>
                    @else
                        <ul>
                            @for($j = 1; $j <= ($i == 3 ? 5 : 3); $j++)
                                <li>{{ $content['section'.$i.'_item'.$j] }}</li>
                            @endfor
                        </ul>
                        @if(isset($content['section'.$i.'_text']))
                            <p>{{ $content['section'.$i.'_text'] }}</p>
                        @endif
                        @if($i == 7)
                            <p>{{ $content['section7_text'] }}: contact@ijazplus.com {{ $content['or'] }} ijazplusmedia@gmail.com</p>
                        @endif
                    @endif
                </div>
            </div>
        @else
            <div class="privacy-section mb-4">
                <div class="px-4">
                    <div id="index-title">
                        <span>{{ $content['section'.$i.'_title'] }}</span>
                    </div>
                    <p>{{ $content['section'.$i.'_text'] }}</p>
                </div>
            </div>
        @endif
    @endforeach

</div>
@endsection
