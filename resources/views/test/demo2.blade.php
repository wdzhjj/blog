@extends('test/demo1')

@section('title','wdz')      <!-- @yield('title') -->


@section('sidebar')

@parent
        <p>这部分追加</p>

@endsection

@section('content')
    <p>content</p>

@endsection


{{--<div class="alert alert-danger">--}}
{{--    {{ $slot }}--}}
{{--</div>--}}

{{--@component('alert')--}}
{{--    <strong>Whoops!</strong> sth wrong!--}}
{{--    @endcomponent--}}

<script>
    var app = <?php json_encode($array); ?>;
</script>