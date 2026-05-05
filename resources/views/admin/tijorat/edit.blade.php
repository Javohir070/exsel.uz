@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">
            <h2 class="intro-y text-lg font-medium">Tijorat loyihasini tahrirlash</h2>
            <a href="{{ route('tijorat.index', request()->query()) }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        </div>

        @if (session('status'))
            <div class="alert alert-success show mb-3">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 p-5" style="background-color: white; border-radius: 8px;">
            <form method="POST" action="{{ route('tijorat.update', array_merge(['tijorat' => $tijorat], request()->query())) }}" class="validate-form">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Loyiha nomi</label>
                        <input type="text" name="name" value="{{ old('name', $tijorat->name) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('name')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Loyiha rahbari</label>
                        <input type="text" name="loyiha_rahbari" value="{{ old('loyiha_rahbari', $tijorat->loyiha_rahbari) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('loyiha_rahbari')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Ijrochi tashkilot</label>
                        <input type="text" name="ijrochi_tashkilot" value="{{ old('ijrochi_tashkilot', $tijorat->ijrochi_tashkilot) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('ijrochi_tashkilot')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Summasi (ming soʻmda)</label>
                        <span class="text-xs text-gray-600 block -mt-1 mb-1">Faqat raqam va bitta nuqta (o‘nlik); mingliklar uchun bo‘shliq ishlatishingiz mumkin.</span>
                        <input type="text" name="summa" value="{{ \App\Models\Tijorat::formatMoneyDisplay(old('summa', $tijorat->summa)) }}"
                            class="input w-full border mt-2 tijorat-money-input" required maxlength="32" inputmode="numeric"
                            placeholder="masalan: 1 170 000" autocomplete="off">
                        @error('summa')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Tashabbuskor mablagʻi (ming soʻmda)</label>
                        <span class="text-xs text-gray-600 block -mt-1 mb-1">Faqat raqam va bitta nuqta (o‘nlik); mingliklar uchun bo‘shliq ishlatishingiz mumkin.</span>
                        <input type="text" name="tash_summasi" value="{{ \App\Models\Tijorat::formatMoneyDisplay(old('tash_summasi', $tijorat->tash_summasi)) }}"
                            class="input w-full border mt-2 tijorat-money-input" required maxlength="32" inputmode="numeric"
                            placeholder="masalan: 100 000" autocomplete="off">
                        @error('tash_summasi')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Loyiha amalga xudud</label>
                        <select name="region_id" class="input border w-full mt-2" required>
                            <option value="">Tanlang</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" @selected((string) old('region_id', $tijorat->region_id) === (string) $region->id)>{{ $region->oz }}</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Loyiha turi (tijoratlashtirish/tijoratlashtirishgacha tayorlash)</label>
                        <input type="text" name="turi" value="{{ old('turi', $tijorat->turi) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('turi')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Yaratilgan ish oʻrni</label>
                        <input type="text" name="yar_ish_urni" value="{{ old('yar_ish_urni', $tijorat->yar_ish_urni) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('yar_ish_urni')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Tegishli Soha</label>
                        <input type="text" name="t_soha" value="{{ old('t_soha', $tijorat->t_soha) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('t_soha')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Qoʻllanish sohasi</label>
                        <input type="text" name="q_soha" value="{{ old('q_soha', $tijorat->q_soha) }}" class="input w-full border mt-2" required maxlength="600">
                        @error('q_soha')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-12">
                        <label class="flex flex-col sm:flex-row"><span class="mt-1 mr-1 text-xs text-red-600">*</span>Moliyalashtirilish asosi</label>
                        <textarea name="m_asosi" class="input w-full border mt-2" rows="3" required maxlength="600">{{ old('m_asosi', $tijorat->m_asosi) }}</textarea>
                        @error('m_asosi')
                            <div class="text-theme-6 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 text-center sm:text-right">
                    <button type="submit" class="button w-32 bg-theme-1 text-white mr-2">Saqlash</button>
                    <a href="{{ route('tijorat.index', request()->query()) }}" class="button w-32 border text-gray-700">Bekor qilish</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        (function() {
            function sanitize(el) {
                var v = el.value.replace(/[^\d\s\u00a0.]/g, '');
                var d = v.indexOf('.');
                if (d !== -1) {
                    v = v.slice(0, d + 1) + v.slice(d + 1).replace(/\./g, '');
                }
                el.value = v;
            }
            document.querySelectorAll('.tijorat-money-input').forEach(function(el) {
                el.addEventListener('input', function() {
                    sanitize(this);
                });
                el.addEventListener('paste', function() {
                    var self = this;
                    setTimeout(function() {
                        sanitize(self);
                    }, 0);
                });
            });
        })();
    </script>
@endsection
