<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link href="/admin/dist/images/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ilmiy tadqiqot muassasalari faoliyat monitoring tizimi.">
    <meta name="keywords" content="Ilmiy tadqiqot muassasalari faoliyat monitoring tizimi">
    <meta name="author" content="LEFT4CODE">
    <title>Kirish</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/admin/dist/css/app.css" />
</head>

<body class="login">
    <div class="container sm:px-10">
        {{ $slot }}
    </div>

    <script src="/admin/dist/js/app.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailInput = document.getElementById('email');
            const rememberCheckbox = document.getElementById('remember');

            // Avval saqlangan emailni o'qib olish
            if (localStorage.getItem('rememberMe') === 'true') {
                emailInput.value = localStorage.getItem('email');
                rememberCheckbox.checked = true;
            }

            // Formani yuborishdan oldin emailni saqlash
            document.getElementById('login-form').addEventListener('submit', function () {
                if (rememberCheckbox.checked) {
                    localStorage.setItem('email', emailInput.value);
                    localStorage.setItem('rememberMe', 'true');
                } else {
                    // Agar checkbox belgilanmagan bo'lsa, ma'lumotlarni o'chirish
                    localStorage.removeItem('email');
                    localStorage.removeItem('rememberMe');
                }
            });
        });
    </script>

</body>

</html>