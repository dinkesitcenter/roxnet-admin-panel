<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('ruangadmin/dist/img/logo/logo2.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
    </a>
    <hr class="sidebar-divider my-0">

    <x-ruangadmin.nav-link 
        text="Dashboard" 
        icon="tachometer-alt" 
        url="{{ route('admin.dashboard') }}"
        active="{{ request()->routeIs('admin.dashboard') ? ' active' : '' }}"
    />
    
    <hr class="sidebar-divider mb-0">

    @can('member-list')
    <x-ruangadmin.nav-link 
        text="Member" 
        icon="users" 
        {{-- url="{{ route('admin.member') }}" --}}
        active="{{ request()->routeIs('admin.member') ? ' active' : '' }}"
    />
    @endcan

    @can('role-list')
    <x-ruangadmin.nav-link 
        text="Roles" 
        icon="th-list" 
        {{-- url="{{ route('admin.roles') }}" --}}
        active="{{ request()->routeIs('admin.roles') ? ' active' : '' }}"
    />
    @endcan

    {{-- <x-ruangadmin.nav-link-sub
        text="Referensi"
        icon="th-list"
        active="active"
        :submenu="[
            [
                'subactive'=>'',
                'suburl'=>route('admin.provinsi'),
                'subicon'=>'th-list',
                'subtext'=>'Provinsi'
            ],
            [
                'subactive'=>'',
                'suburl'=>route('admin.provinsi'),
                'subicon'=>'th-list',
                'subtext'=>'Kabupaten'
            ],
        ]"
    /> --}}

    <hr class="sidebar-divider mb-0">
    
    @can('setting-list')
    <x-ruangadmin.nav-link 
        text="Settings" 
        icon="cogs" 
        {{-- url="{{ route('admin.settings') }}" --}}
        active="{{ request()->routeIs('admin.settings') ? ' active' : '' }}"
    />
    @endcan
</ul>