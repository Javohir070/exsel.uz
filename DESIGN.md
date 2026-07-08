---
name: Exsel Monitoring Admin
description: Ilmiy-innovatsion faoliyat monitoringi tizimi — Midone asosidagi admin panel dizayn tizimi
colors:
  primary: "#1C3FAA"
  primary-deep: "#2B51B4"
  content-bg: "#F1F5F8"
  surface-card: "#FFFFFF"
  surface-ghost: "#F9FAFC"
  shell-bg: "#1C3FAA"
  ink: "#1F2937"
  ink-muted: "#4B5563"
  border-subtle: "#E2E8F0"
typography:
  display:
    fontFamily: "Roboto, system-ui, sans-serif"
    fontSize: "1.125rem"
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: "normal"
  body:
    fontFamily: "Roboto, system-ui, sans-serif"
    fontSize: "0.875rem"
    fontWeight: 400
    lineHeight: 1.5
    letterSpacing: "normal"
  label:
    fontFamily: "Roboto, system-ui, sans-serif"
    fontSize: "0.75rem"
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: "0.02em"
rounded:
  sm: "4px"
  md: "6px"
  lg: "30px"
  full: "9999px"
spacing:
  xs: "4px"
  sm: "8px"
  md: "12px"
  lg: "16px"
  xl: "20px"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.surface-card}"
    rounded: "{rounded.md}"
    padding: "8px 12px"
  button-primary-hover:
    backgroundColor: "{colors.primary-deep}"
    textColor: "{colors.surface-card}"
    rounded: "{rounded.md}"
    padding: "8px 12px"
  button-ghost:
    backgroundColor: "{colors.surface-card}"
    textColor: "{colors.primary}"
    rounded: "{rounded.md}"
    padding: "8px 12px"
  input-default:
    backgroundColor: "{colors.surface-card}"
    textColor: "{colors.ink}"
    rounded: "{rounded.md}"
    padding: "8px 12px"
  card-default:
    backgroundColor: "{colors.surface-card}"
    textColor: "{colors.ink}"
    rounded: "{rounded.md}"
    padding: "20px"
---

# Design System: Exsel Monitoring Admin

## Overview

**Creative North Star: "The Institutional Ledger"**

Bu hujjat loyihadagi **joriy** Midone admin panel vizual tizimini qayd etadi — redesign boshlashdan oldingi asosiy holat. Tizim ofis muhitida ishlaydigan xodimlar uchun ma'lumot markazli admin panel sifatida qurilgan: ko'k shell fon, och kulrang kontent maydoni, oq kartalar va jadvallar.

Dizayn maqsadi — murakkab ilmiy ma'lumotlarni tez skaner qilish. Ranglar tartibli, komponentlar takrorlanuvchi, vizual ierarxiya jadval va forma ustunligida. PRODUCT.md dagi anti-referencelarga zid bo'lgan elementlar (gradient text, AI cream fon, bir xil card gridlar) hozirgi tizimda ham ba'zi joylarda uchraydi — redesign jarayonida ularni yo'q qilish kerak.

**Key Characteristics:**

- Ko'k shell (`#1C3FAA`) + och kulrang kontent (`#F1F5F8`) ikki qavatli layout
- Roboto, 14px asosiy matn — ixcham admin zichligi
- Yumshoq soyalar (`0px 3px 20px #0000000b`) — yengil ko'tarilgan kartalar
- Yumaloq navigatsiya (`rounded-full` side-menu) — Midone shablon imzosi
- Ma'lumot birinchi: jadvallar, formalar, holat tugmalari
- Redesign uchun asos: bu fayl "hozirgi holat", yangi dizayn shu yerda yangilanadi

## Colors

Ko'k-kulrang institutsional palitra: asosiy aksent ko'k, fon och kulrang, matn to'q kulrang.

### Primary

- **Institutional Blue** (`#1C3FAA` / oklch(38% 0.16 264)): Tugmalar, aktiv tab, checkbox/radio, breadcrumb aksent, HTML shell fon. Asosiy brend rangi.
- **Deep Blue** (`#2B51B4` / oklch(42% 0.15 264)): Login gradient pastki rangi, hover holati uchun chuqurroq ko'k.

### Neutral

- **Cool Slate Canvas** (`#F1F5F8` / oklch(96% 0.01 250)): Kontent maydoni fon (`bg-theme-2`), aktiv menu pill fon.
- **Card White** (`#FFFFFF`): Kartalar, modallar, input fonlari.
- **Ghost Surface** (`#F9FAFC`): Report-box orqa fon, ikkinchi darajali yuzalar.
- **Ink** (`#1F2937` / gray-800): Asosiy matn, jadval sarlavhalari.
- **Muted Ink** (`#4B5563` / gray-600): Ikkinchi darajali matn, placeholderlar (kontrast tekshiruvi talab qilinadi).
- **Subtle Border** (`#E2E8F0`): Jadval chegaralari, dividerlar.

### Named Rules

**The Shell Rule.** Tashqi shell doim to'q ko'k (`shell-bg`). Kontent esa och kulrang yuzada — bu ikki qavatli ajratish navigatsiya va ma'lumot o'rtasidagi vizual kontrakt.

**The Accent Restraint Rule.** Primary ko'k faqat CTA, aktiv holat va navigatsiya aksentida. Butun sahifani ko'k qilib bo'yash taqiqlanadi.

## Typography

**Display Font:** Roboto (system-ui fallback)
**Body Font:** Roboto (system-ui fallback)
**Label Font:** Roboto Medium

**Character:** Texnik, ixcham, o'qilishi oson. Geometrik sans-serif — institutsional admin panel uchun standart tanlov. Figtree va Nunito Laravel auth qismida alohida ishlatiladi; admin panelda Roboto ustun.

### Hierarchy

- **Display** (500, 1.125rem / text-lg, 1.4): Sahifa sarlavhalari (`intro-y text-lg font-medium`).
- **Headline** (500, 1rem, 1.4): Bo'lim sarlavhalari, aktiv menu.
- **Title** (500, 0.875rem, 1.5): Jadval sarlavhalari, form label.
- **Body** (400, 0.875rem / text-sm, 1.5): Asosiy matn, jadval qatorlari. Maks 65–75ch uzun matnlar uchun.
- **Label** (500, 0.75rem / text-xs, 0.02em tracking): Badge, indicator, kichik holat matnlari.

### Named Rules

**The Density Rule.** Admin panelda matn 14px dan kichik bo'lmasin. Jadval va forma zichligi ma'lumot sig'imini oshiradi, lekin kontrastdan voz kechilmaydi.

## Elevation

Tizim yengil soyalar va tonal qatlam bilan chuqurlik beradi — qattiq material dizayn emas.

Kontent maydoni (`#F1F5F8`) ustida oq kartalar (`#FFFFFF`) yengil soya bilan ajraladi. Report-box komponentida ikkinchi darajali ghost fon (`#F9FAFC`) qo'shimcha chuqurlik beradi. Modallar qorong'u overlay (`#00000080`) va oq rounded kontent bilan ishlaydi.

### Shadow Vocabulary

- **Card lift** (`box-shadow: 0px 3px 20px #0000000b`): `.box`, report-box, asosiy kartalar.
- **Input subtle** (`box-shadow: 0px 3px 5px #00000007`): Login inputlari.
- **Switch knob** (`box-shadow: 1px 1px 3px rgba(0,0,0,0.25)`): Toggle switch.

### Named Rules

**The Soft Shadow Rule.** Soyalar 4% dan oshmasin. Agar element "ko'tarilgan" ko'rinsa, soya qalinligi oshirilmaydi — fon rangi o'zgaradi.

## Components

### Buttons

- **Shape:** Yumaloq burchaklar (6px / `rounded-md`)
- **Primary:** `bg-theme-1 text-white`, padding 8px 12px, font-medium 14px
- **Ghost:** Oq fon, `border border-theme-1 text-theme-1` — ikkinchi darajali harakatlar
- **Hover / Focus:** `shadow-outline` focus halqasi; hover uchun `primary-deep` ga o'tish
- **O'lchamlar:** `button--sm` (py-1 px-2), default, `button--lg` (py-3 px-4)

### Cards / Containers

- **Corner Style:** 6px (`rounded-md`); kontent wrapper 30px (`border-radius: 30px`)
- **Background:** Oq (`#FFFFFF`) yoki ghost (`#F9FAFC`)
- **Shadow Strategy:** Card lift soya
- **Internal Padding:** 20px (`p-5`) standart

### Inputs / Fields

- **Style:** Oq fon, 6px radius, `appearance-none`
- **Focus:** `outline-none shadow-outline` — ko'k focus halqasi
- **Checkbox/Radio:** 16px, checked holatda `bg-theme-1`
- **Switch:** 38×24px, rounded-full, checked da knob oq

### Navigation

- **Side menu:** 230px kenglik, oq matn ko'k fonda, `rounded-full` pill shakl, aktiv holat `bg-theme-2` + `text-gray-800`
- **Submenu:** `bg-theme-28` rounded-md, nested `bg-theme-29`
- **Top bar:** Breadcrumb + account menu, mobil da yashirin
- **Mobile:** `mobile-menu` — to'liq ekran overlay

### Tables

- **Style:** `table-report`, chapga tekislangan
- **Cell padding:** 20px gorizontal, 12px vertikal (`px-5 py-3`)
- **Header:** font-medium, nowrap qatorlar

### Report Box (signature)

- **Style:** `report-box zoom-in` — intro animatsiya bilan
- **Icon:** 28px feather icon, `text-theme-10` / `text-theme-11` rangli aksentlar
- **Ghost layer:** Orqada `#F9FAFC` soya qatlami

## Do's and Don'ts

### Do:

- **Do** Midone komponentlaridan foydalaning: `.button`, `.box`, `.input`, `.table`, `.side-menu`
- **Do** primary ko'kni faqat CTA va aktiv holatlarda ishlating
- **Do** jadval va forma kontrastini ≥4.5:1 saqlang
- **Do** `prefers-reduced-motion` uchun intro animatsiyalarni o'chiring
- **Do** redesignda bu faylni yangilang — u joriy holatning yagona manbai

### Don't:

- **Don't** yorqin gradientlar va "startup landing" estetikasi qo'shmang
- **Don't** ko'p rangli, chalkash dashboardlar yarating
- **Don't** kichik kontrastli kulrang matn ishlating
- **Don't** har bir bo'limda bir xil icon + card grid takrorlang
- **Don't** AI generatsiya qilingan ko'rinish qo'shing: cream/sand fon, gradient text, side-stripe borderlar
- **Don't** inline style (`style="color: #1C3FAA"`) o'rniga tokenlardan foydalaning — redesignda bularni tozalang
