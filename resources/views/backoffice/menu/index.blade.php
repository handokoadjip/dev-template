@extends('layouts.dashboard')

@section('title', 'Menu')


@push('style')
<link rel="stylesheet" href="{{asset('vendor/fapicker/dist/css/fontawesome-iconpicker.min.css')}}">
<style>
    .iconpicker-popover.popover.fade.bottom.in {
        opacity: 1 !important;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <section class="row">
        <div class="col-lg-12">
            {!! Menu::render() !!}
        </div>
    </section>
</div>

@endsection

@push('script')
{!! Menu::scripts() !!}

<script src="{{asset('vendor/fapicker/dist/js/fontawesome-iconpicker.min.js')}}"></script>
<script>
    $('.icp-auto').iconpicker();

    $("#custom-menu-item-name").keyup(function() {
        let menuLabel = $("#custom-menu-item-name").val();

        let slug = menuLabel.toLowerCase()
            .replace(/ /g, '-')
            .replace(/[^\w-]+/g, '');

        $("#custom-menu-item-url").val(`/backoffice/${slug}`)
    })
</script>
@endpush