@extends("layouts.admin")
@section("content")
    <div class="flex justify-between align-center mt-6 mb-6">
        <h2 class="intro-y text-lg font-medium">Role : {{ $role->name }}
            <a href="{{ url('roles') }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        </h2>
    </div>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card">
                    <form id="science-paper-create-form" method="POST" action="{{ url('roles/' . $role->id . '/give-permissions') }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')

                            <div class="w-full col-span-12">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Permissions
                                </label>
                                <div class="grid grid-cols-12 gap-2">
                                    @foreach ($permissions as $permission)
                                        <div class="w-full col-span-3">
                                            <input
                                                type="checkbox"
                                            name="permission[]"
                                            value="{{ $permission->name }}"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                        />
                                        {{ $permission->name }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="px-5 pb-5 text-center mt-4">
                                <a href="{{ url('roles') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                                    Bekor qilish
                                </a>
                                <button type="submit" form="science-paper-create-form"
                                    class="update-confirm button w-24 bg-theme-1 text-white">
                                    Tastiqlash
                                </button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
