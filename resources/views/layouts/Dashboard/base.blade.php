<x-layouts::scaffold :title="$attributes->get('title', $title)" {{ $attributes->except('title') }}>
    <div class="page">
        <aside class="navbar navbar-vertical navbar-expand-lg d-print-none"
            data-bs-theme="dark" style="overflow: auto">
            <div class="container-fluid">
                <a class="navbar-brand py-3 py-lg-5 my-lg-5 px-lg-5 px-2" href="{{ route('dashboard.index') }}">
                    <x-components::logo class="navbar-brand-image" height="24" style="max-height: 24px" />
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav">
                        @include('layouts.dashboard.partials.sidebar', ['items' => $sidebar])

                        <li class="nav-item mt-auto mb-md-2">
                            <a class="nav-link cursor-pointer" onclick="$('#logout-form').submit();">
                                <span class="nav-link-icon"><i class="fa fa-sign-out-alt"></i></span>
                                <span class="nav-link-title">{{ __('Logout') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </aside>

        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-fluid justify-content-end px-3">
                <div class="navbar-nav flex-row order-md-last gap-3">
                    <div class="nav-item">
                        <a href="{{ route('website.index') }}" target="_blank" class="nav-link px-0">
                            <span class="nav-link-icon"><i class="fa fa-external-link-alt"></i></span>
                            <span class="nav-link-title">{{ __('Website') }}</span>
                        </a>
                    </div>

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown">
                            <span @if ($admin->profile_picture) @style('background-image: url(' . $admin->profile_picture . ')') @endif
                                {{ $attributes->merge(['class' => 'avatar avatar-' . $size]) }}>
                                {{ $admin->profile_picture ? '' : mb_substr($admin->name, 0, 1) }}
                            </span>

                            <div class="d-none d-xl-block ps-2">
                                <div>{{ $admin->name }}</div>
                                <div class="mt-1 small text-muted">
                                    {{ \Illuminate\Support\Str::limit($admin->email, 20) }}</div>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('dashboard.profile.edit') }}" class="dropdown-item">
                                <span class="dropdown-item-icon"><i class="fa fa-user"></i></span>
                                <span class="dropdown-item-title">{{ __('Profile') }}</span>
                            </a>

                            <a class="dropdown-item cursor-pointer" onclick="$('#logout-form').submit();">
                                <span class="dropdown-item-icon"><i class="fa fa-sign-out-alt"></i></span>
                                <span class="dropdown-item-title">{{ __('Logout') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-fluid">
                    {{ $slot }}

                    <footer class="mt-4 text-muted text-center">
                        <div>
                            {{ __('All rights reserved for') }}
                            <a href="{{ config('app.url') }}" target="_blank">{{ setting('app_name') }}</a>
                            &copy; {{ date('Y') }}
                        </div>
                        <div>
                            {{ __('Developed by') }}
                            <a href="https://linkedin.com/in/ahmedwaeel" target="_blank">Ahmed Wael</a>
                            &
                            <a href="https://www.linkedin.com/in/hassan-ahmed-elsayed/" target="_blank">Hassan Ahmed</a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    <x-components::form id="logout-form" :action="route('dashboard.logout')" method="POST" class="d-none" disable-validation />
</x-layouts::scaffold>
