<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daily Work</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="min-h-screen flex flex-col">

        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

                <h1 class="text-2xl font-bold text-gray-800">
                    Daily Work
                </h1>

                <div class="flex gap-3">

                    <a href="{{ route('login') }}"
                       class="px-5 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                        تسجيل الدخول
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2 rounded-lg bg-gray-800 text-white hover:bg-gray-700">
                        إنشاء حساب
                    </a>

                </div>
            </div>
        </header>


        <main class="flex-1 flex items-center justify-center px-6">

            <div class="text-center max-w-2xl">

                <h2 class="text-4xl font-bold text-gray-800 mb-5">
                    نظّم يومك، وأنجز مهامك بسهولة
                </h2>

                <p class="text-lg text-gray-600 mb-8">
                    خلّي يومك أكثر تنظيمًا، وتابع مهامك وإنجازاتك بسهولة.
رتّب أولوياتك، وتابع تقدمك، وخلّي كل يوم أكثر إنتاجية.
                </p>

                <a href="{{ route('register') }}"
                   class="inline-block px-8 py-3 bg-gray-800 text-white rounded-lg hover:bg-gray-700">
                   ابدأ بتنظيم يومك
                </a>

            </div>

        </main>
<section class="bg-white py-12">
    <div class="max-w-6xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="text-center p-6 rounded-xl bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800 mb-3">
                    تنظيم المهام
                </h3>
                <p class="text-gray-600">
                    أضف مهامك ورتبها بطريقة تساعدك على إنجاز يومك.
                </p>
            </div>

            <div class="text-center p-6 rounded-xl bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800 mb-3">
                    متابعة التقدم
                </h3>
                <p class="text-gray-600">
                    تابع حالة مهامك واعرف إيش أنجزت وإيش باقي عليك.
                </p>
            </div>

            <div class="text-center p-6 rounded-xl bg-gray-50">
                <h3 class="text-xl font-bold text-gray-800 mb-3">
                    ترتيب الأولويات
                </h3>
                <p class="text-gray-600">
                    حدد أولوية كل مهمة عشان تعرف إيش الأهم أولًا.
                </p>
            </div>

        </div>

    </div>
</section>
    </div>
<footer class="bg-gray-800 text-white py-6 text-center">
    <p>
        © {{ date('Y') }} Daily Work - جميع الحقوق محفوظة
    </p>
</footer>
</body>
</html>