@php
    $types = [
        'success' => 'fa-solid fa-check-circle',
        'danger' => 'fa-solid fa-exclamation-circle',
        'warning' => 'fa-solid fa-exclamation-triangle',
        'info' => 'fa-solid fa-info-circle',
    ];

    foreach (array_keys($types) as $type) {
        if (session()->has($type)) {
            $status = $type;
            $icon = $types[$type];
            $color = $type == 'error' ? 'danger' : $type;
        }
    }
@endphp

@if (session()->has($status))
    <div class=>"alert alert-{{ $type }} alert-dismissible" role="alert">
        <div class="d-flex">
            <i class="{{ $icon }} me-3"></i>

            @if (is_array(session($status)))
                <ul class="mb-0">
                    @foreach (session($status) as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </ul>
            @else
                {{ session($status) }}
            @endif
        </div>

        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
