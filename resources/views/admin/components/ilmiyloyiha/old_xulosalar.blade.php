<div class="tab-content__pane" id="old-expert">

    @forelse ($quarters as $quarter)
        <div class="p-5">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="border" style="width: 40px;">T/r</th>
                        <th colspan="2" class="border" style="text-align: center;">EKSPERT XULOSASI</th>
                    </tr>
                    <tr>
                        <td class="border">1.</td>
                        <td class="border" style="width: 50%;">Ilmiy-tadqiqot ishlarining shartnoma va uning kalendar
                            rejasiga
                            asosan bajarilish holati</td>
                        <td class="border">{{ $quarter->kalendar }}</td>
                    </tr>
                    <tr>
                        <td class="border">2.</td>
                        <td class="border">Ijrochi tashkilot tomonidan loyihaning amalga oshirilishi
                            uchun zarur
                            shart-sharoitlar yaratib berilganligi</td>
                        <td class="border">{{ $quarter->shart_sharoit_yaratib }}</td>
                    </tr>
                    <tr>
                        <td class="border">3.</td>
                        <td class="border">Loyiha doirasida qo‘lga kiritilgan yakuniy natijalar va
                            ularni
                            tijoratlashtirish imkoniyatlari</td>
                        <td class="border">{{ $quarter->yakuniy_natijalar }}</td>
                    </tr>
                    <tr>
                        <td class="border">4.</td>
                        <td class="border">Loyiha ijrochilarining o‘zgarishi holati</td>
                        <td class="border">{{ $quarter->loyiha_ijrochilari }}</td>
                    </tr>
                    <tr>
                        <td class="border">5.</td>
                        <td class="border">Monitoring xulosasi</td>
                        <td class="border">{{ $quarter->status }}</td>
                    </tr>
                    <tr>
                        <td class="border">6.</td>
                        <td class="border">Izoh</td>
                        <td class="border">{{ $quarter->comment }}</td>
                    </tr>
                    <tr>
                        <td class="border">7.</td>
                        <td class="border">Ishchi guruh rahbari F.I.Sh</td>
                        <td class="border">{{ $quarter->fish }}</td>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">8.</td>
                        <td class="border border-b-2 ">Ishchi guruh azosi F.I.Sh</td>
                        <td class="border border-b-2 ">
                            {{ $quarter->user?->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border">9.</td>
                        <td class="border">Ekspert F.I.Sh</td>
                        <td class="border">{{ $quarter->ekspert_fish }}</td>
                    </tr>
                    <tr>
                        <td class="border">9.</td>
                        <td class="border">Tashkilotning mas'ul rahbari F.I.Sh</td>
                        <td class="border">{{ $quarter->t_masul }}</td>
                    </tr>
                    <tr>
                        <td class="border">10.</td>
                        <td class="border">Monitoring o‘tkazilgan sana</td>
                        <td class="border">{{ $quarter->updated_at }}</td>
                    </tr>
                    <tr>
                        <td class="border">11.</td>
                        <td class="border">Fayl</td>
                        <td class="border">
                            @if ($quarter->file)
                                <a href="{{ asset('storage/' . $quarter->file) }}"
                                    class="button  bg-theme-1 text-white" target="_blank">Faylni
                                    ko'rish</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @empty
        <div class="alert alert-danger">
            <p>Xulosalar topilmadi</p>
        </div>
    @endforelse

</div>
