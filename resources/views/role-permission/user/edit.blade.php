@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-6 mb-6">

    <h2 class="intro-y text-lg font-medium">Users qo'shish </h2>

    @role('super-admin')
        <a href="{{ url('users') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    @endrole
    @role('admin')
        <a href="{{ url('/') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    @endrole
</div>



<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 4px">
    @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ url('users/'.$user->id) }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                @role(['super-admin', 'admin'])
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>F.I.Sh
                        </label>
                        <input type="text" name="name" value="{{ $user->name }}" class="input w-full border mt-2" >
                    </div>
                @endrole
                    @role('admin121')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xodimlar
                        </label>
                        <select name="name" class="input border w-full mt-2" required="">
                            <option value=""> Xodimni biriktirish</option>
                            @foreach ($xodimlar as $role)
                                <option value="{{ $role->fish }}">{{ $role->fish }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endrole

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Login (foydalanuvchi email adresini kiriting)
                        </label>
                        <input type="email" name="email"  value="{{ $user->email }}" readonly  class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> Parolni kiriting
                        </label>
                        <input type="text" name="password" class="input w-full border mt-2">
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Rol (foydalanuvchining tizimdagi roli)
                        </label>
                        <select name="roles[]" class="input border w-full mt-2" required="">
                            <option value=""> Rolni tanlang</option>
                            @foreach ($roles as $role)
                              @if ($role !== 'super-admin' && $role !== 'admin' &&  $role !== 'Itm-tashkilotlar')
                              <option
                                        value="{{ $role }}"
                                        {{ in_array($role, $userRoles) ? 'selected':'' }}
                                    >
                                        {{ $role }}
                                    </option>
                              @endif
                            @endforeach
                        </select>
                    </div>

                    @role('super-admin')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">  Viloyat
                        </label>
                        <select name="region_id" class="input border w-full mt-2">
                            <option value=""> Viloyat tanlash</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ $region->id == $user->region_id ? 'selected' : '' }}>{{ $region->oz }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endrole
                    <!-- @role('admin')
                        <input type="hidden" name="tashkilot_id" value="{{ auth()->user()->tashkilot->id }}">
                    @endrole     -->
            </div>
        </form>
        <div class="px-5 pb-5 text-center mt-4">
            <a href="#"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>











    <!-- <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit User
                            <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('users/'.$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" readonly value="{{ $user->email }}" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="text" name="password" class="form-control" />
                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option
                                        value="{{ $role }}"
                                        {{ in_array($role, $userRoles) ? 'selected':'' }}
                                    >
                                        {{ $role }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endsection

