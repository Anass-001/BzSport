@extends('layouts.master')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

        <dotlottie-player src="https://lottie.host/38ef32e2-cb37-4c70-9ae1-0868b10f2ad4/r4tmaKkL1d.json"
            background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
        </dotlottie-player>

        <h1 class="mt-4">Thank you for your order!</h1>
        <p>Your order has been placed successfully.</p>
    </div>
@endsection
