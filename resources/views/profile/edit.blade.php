<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>الملف الشخصي - Daily Work</title>

    @vite([
        'resources/css/app.css',
        'resources/css/tasks.css',
        'resources/js/app.js'
    ])
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        <div class="header">

            <div>
                <h1>الملف الشخصي</h1>

                <p>
                   <p>
    أهلًا {{ auth()->user()->name }} 👋
    من هنا تقدر تدير معلومات حسابك وإعداداتك الشخصية.
</p>
                </p>
            </div>

            <a href="{{ route('dashboard') }}" class="btn btn-view">
                لوحة التحكم
            </a>

        </div>

        <div class="task-card">

    @include('profile.partials.update-profile-information-form')

</div>

       <div class="task-card">

    @include('profile.partials.update-password-form')

</div>

        <div class="task-card">

    @include('profile.partials.delete-user-form')

</div>

    </div>

</body>

</html>