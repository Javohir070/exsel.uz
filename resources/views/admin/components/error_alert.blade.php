@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

@error('name')
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
    </div>
@enderror

@error('email')
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
    </div>
@enderror

@error('password')
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
    </div>
@enderror

@error('laboratory_id')
    <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
        <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
    </div>
@enderror

@error('tavsif')
<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
    <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
</div>
@enderror