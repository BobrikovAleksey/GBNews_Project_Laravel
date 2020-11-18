@extends('layouts.main')

@section('content')
<div class="contact">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <x-contact-form></x-contact-form>
            </div>

            <div class="col-md-4">
                <x-contact-info></x-contact-info>
            </div>
        </div>
    </div>
</div>
@endsection
