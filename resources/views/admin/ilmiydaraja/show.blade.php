@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiydaraja->tashkilot->name }}  Ilmiy bilan taminlangami  ma’lumot</h2>

        
        

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">{{ $ilmiydaraja->tashkilot->name ." xodim ". $ilmiydaraja->fish }}  xaqida ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('xodimlar.edit',['xodimlar'=>$ilmiydaraja->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha mavzusi</th>
                            <td class="border-b" >{{ $ilmiydaraja->mavzusi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha turi</th>
                            <td class="border-b">{{ $ilmiydaraja->turi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha dasturi</th>
                            <td class="border-b">{{ $ilmiydaraja->dastyri }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">"Qo‘shma loyiha bo‘yicha hamkor tashkilot"</th>
                            <td class="border-b">{{ $ilmiydaraja->q_hamkor_tashkilot }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Xalqaro qo‘shma loyihalardagi hamkor davlat</th>
                            <td class="border-b">{{ $ilmiydaraja->hamkor_davlat }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha mavzusi</th>
                            <td class="border-b">{{ $ilmiydaraja->muddat }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Loyihani amalga oshirish muddati (yil) 
                        bo‘lgan tashkilot</th>
                            <td class="border-b">{{ $ilmiydaraja->bosh_sana }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Loyihaning boshlanish sanasi
                        shug‘ullanishi</th>
                            <td class="border-b">{{ $ilmiydaraja->tug_sana }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Fan yo‘nalish</th>
                            <td class="border-b">{{ $ilmiydaraja->pan_yunalish }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha rahbarining F.I.Sh.</th>
                            <td class="border-b">{{ $ilmiydaraja->rahbar_name }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tuzilgan shartnoma Raqami 
                        haqiqiy a’zosi Ilmiy darajasi</th>
                            <td class="border-b">{{ $ilmiydaraja->raqami }}</td>
                        </tr>

                        <tr>
                            <th class="whitespace-no-wrap border-b">Tuzilgan shartnoma Sanasi </th>
                            <td class="border-b">{{ $ilmiydaraja->sanasi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Tuzilgan shartnoma summasi (ming so‘mda) </th>
                            <td class="border-b">{{ $ilmiydaraja->sum }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Umumiy ajratilgan mablag‘ (ming so‘mda) </th>
                            <td class="border-b">{{ $ilmiydaraja->umumiy_mablag  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Olingan asosiy natija </th>
                            <td class="border-b">{{ $ilmiydaraja->olingan_natija  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Joriy etish (Tatbiq etish) holati </th>
                            <td class="border-b">{{ $ilmiydaraja->joriy_holati  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tijoratlashtirish holati</th>
                            <td class="border-b">{{ $ilmiydaraja->tijoratlashtirish  }} </td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection