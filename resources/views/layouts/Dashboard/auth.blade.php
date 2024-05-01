<x-layouts::scaffold {{ $attributes->merge(['class' => 'd-flex flex-column']) }}>
    <div class="page">
        <div class="container container-tight py-4 my-auto">
            <div class="text-center mb-4">
                <a href="{{ route('dashboard.index') }}" class="navbar-brand">
                    <img src="{{ asset('assets/images/logo-light.svg') }}" alt="{{ env('APP_NAME') }}"
                        class="hide-theme-dark" loading="lazy" height="24"/>
                </a>
            </div>

            {{ $slot }}
        </div>
    </div>
</x-layouts::scaffold>
