@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} xodim xaqida ma’lumot</h2>

        <a href="{{ route("tashkilotrahbari.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a>
        

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">{{ $ilmiyloyiha->tashkilot->name ." xodim ". $ilmiyloyiha->fish }}  xaqida ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('xodimlar.edit',['xodimlar'=>$ilmiyloyiha->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha mavzusi</th>
                            <td class="border-b" >{{ $ilmiyloyiha->mavzusi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha turi</th>
                            <td class="border-b">{{ $ilmiyloyiha->turi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha dasturi</th>
                            <td class="border-b">{{ $ilmiyloyiha->dastyri }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">"Qo‘shma loyiha bo‘yicha hamkor tashkilot"</th>
                            <td class="border-b">{{ $ilmiyloyiha->q_hamkor_tashkilot }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Xalqaro qo‘shma loyihalardagi hamkor davlat</th>
                            <td class="border-b">{{ $ilmiyloyiha->hamkor_davlat }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha mavzusi</th>
                            <td class="border-b">{{ $ilmiyloyiha->muddat }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Loyihani amalga oshirish muddati (yil) 
                        bo‘lgan tashkilot</th>
                            <td class="border-b">{{ $ilmiyloyiha->bosh_sana }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Loyihaning boshlanish sanasi
                        shug‘ullanishi</th>
                            <td class="border-b">{{ $ilmiyloyiha->tug_sana }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Fan yo‘nalish</th>
                            <td class="border-b">{{ $ilmiyloyiha->pan_yunalish }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Loyiha rahbarining F.I.Sh.</th>
                            <td class="border-b">{{ $ilmiyloyiha->rahbar_name }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tuzilgan shartnoma Raqami 
                        haqiqiy a’zosi Ilmiy darajasi</th>
                            <td class="border-b">{{ $ilmiyloyiha->raqami }}</td>
                        </tr>

                        <tr>
                            <th class="whitespace-no-wrap border-b">Tuzilgan shartnoma Sanasi </th>
                            <td class="border-b">{{ $ilmiyloyiha->sanasi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Tuzilgan shartnoma summasi (ming so‘mda) </th>
                            <td class="border-b">{{ $ilmiyloyiha->sum }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Umumiy ajratilgan mablag‘ (ming so‘mda) </th>
                            <td class="border-b">{{ $ilmiyloyiha->umumiy_mablag  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Olingan asosiy natija </th>
                            <td class="border-b">{{ $ilmiyloyiha->olingan_natija  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Joriy etish (Tatbiq etish) holati </th>
                            <td class="border-b">{{ $ilmiyloyiha->joriy_holati  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tijoratlashtirish holati</th>
                            <td class="border-b">{{ $ilmiyloyiha->tijoratlashtirish  }} </td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection