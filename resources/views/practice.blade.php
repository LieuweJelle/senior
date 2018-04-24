
@component('alert')
    @slot('title')
        Forbidden
    @endslot

    You are not allowed to access this resource!
@endcomponent

<div class="alert alert-danger">
    {{ $slot }}
</div>
