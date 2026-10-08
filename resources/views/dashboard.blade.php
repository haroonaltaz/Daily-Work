<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>لوحة التحكم - Daily Work</title>

    @vite(['resources/css/tasks.css'])
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        {{-- Header --}}
        <div class="header">

            <div>
                <h1>Daily Work</h1>

                <p>
    أهلًا {{ auth()->user()->name }} 👋
    هنا تقدر تتابع مهامك، إنجازاتك، ونسبة تقدمك اليوم.
               </p>
               <p style="margin-top: 8px; color: #6b7280;">
    {{ now()->translatedFormat('l، d F Y') }}
</p>
            </div>

            <a
                href="{{ route('tasks.create') }}"
                class="btn btn-primary"
            >
                + إضافة مهمة
            </a>

        </div>


        {{-- الإحصائيات --}}
        <div class="stats-grid">

            <div class="stat-card total">
                <h3>إجمالي المهام</h3>
                <h2>{{ $totalTasks }}</h2>
            </div>

            <div class="stat-card completed">
                <h3>المهام المكتملة</h3>
                <h2>{{ $completedTasks }}</h2>
            </div>

            <div class="stat-card progress">
                <h3>قيد التنفيذ</h3>
                <h2>{{ $inProgressTasks }}</h2>
            </div>

            <div class="stat-card pending">
                <h3>المهام المعلقة</h3>
                <h2>{{ $pendingTasks }}</h2>
            </div>

        </div>


        {{-- نسبة الإنجاز --}}
        <div class="task-card">

            <div
                style="
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    margin-bottom:12px;
                "
            >

                <h3 style="margin:0;">
                   نسبة إنجاز المهام اليوم
                </h3>

                <strong>
                    {{ $completionPercentage }}%
                </strong>

            </div>

            <div
                style="
                    width:100%;
                    height:12px;
                    background:#e5e7eb;
                    border-radius:20px;
                    overflow:hidden;
                "
            >

                <div
                    style="
                        width:{{ $completionPercentage }}%;
                        height:100%;
                        background:#2563eb;
                        border-radius:20px;
                        transition:width 0.3s;
                    "
                ></div>

            </div>

        </div>


        {{-- آخر المهام --}}
        <div
            class="header"
            style="margin-bottom:15px;"
        >

            <div>
                <h2>آخر المهام</h2>

                <p>
                    أحدث المهام التي أضفتها.
                </p>
            </div>

            <a
                href="{{ route('tasks.index') }}"
                class="btn btn-view"
            >
               إدارة جميع المهام
            </a>

        </div>


        {{-- عرض آخر 5 مهام --}}
        @forelse($tasks->take(5) as $task)

            <div class="task-card">

                {{-- عنوان المهمة --}}
                <h3>
                    {{ $task->title }}
                </h3>


                {{-- الوصف --}}
                <div class="task-description">

                    {{ $task->description ?: 'لا يوجد وصف لهذه المهمة.' }}

                </div>


                {{-- معلومات المهمة --}}
                <div class="task-info">

                    {{-- الأولوية --}}
                    <span class="badge priority-{{ $task->priority }}">

                        الأولوية:

                        @if($task->priority === 'low')
                            منخفضة
                        @elseif($task->priority === 'medium')
                            متوسطة
                        @else
                            عالية
                        @endif

                    </span>


                    {{-- الحالة --}}
                    <span class="badge status-{{ $task->status }}">

                        الحالة:

                        @if($task->status === 'pending')
                            معلقة
                        @elseif($task->status === 'in_progress')
                            قيد التنفيذ
                        @else
                            مكتملة
                        @endif

                    </span>


                    {{-- تاريخ الاستحقاق --}}
                    @if($task->due_date)

                        <span class="badge">

                            تاريخ الاستحقاق:
                            {{ $task->due_date }}

                        </span>

                    @endif

                </div>


                {{-- الأزرار --}}
                <div class="actions">

                    <a
                        href="{{ route('tasks.show', $task) }}"
                        class="btn btn-view"
                    >
                        عرض
                    </a>

                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="btn btn-edit"
                    >
                        تعديل
                    </a>

                    <form
                        action="{{ route('tasks.destroy', $task) }}"
                        method="POST"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-delete"
                            onclick="return confirm('هل أنت متأكد من حذف المهمة؟')"
                        >
                            حذف
                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="empty">

                <h3>
                    ما عندك مهام حاليًا
                </h3>

                <p>
                    ابدأ بإضافة أول مهمة لك.
                </p>

                <a
                    href="{{ route('tasks.create') }}"
                    class="btn btn-primary"
                >
                    + إضافة مهمة
                </a>

            </div>

        @endforelse

    </div>

</body>

</html>