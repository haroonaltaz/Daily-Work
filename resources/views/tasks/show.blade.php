<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تفاصيل المهمة - Daily Work</title>

    @vite(['resources/css/tasks.css'])
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        <div class="header">

            <div>
                <h1>تفاصيل المهمة</h1>

                <p>
                    عرض جميع تفاصيل المهمة.
                </p>
            </div>

            <a href="{{ route('tasks.index') }}" class="btn btn-view">
                العودة للمهام
            </a>

        </div>

        <div class="task-card">

            <h2 class="task-title">
                {{ $task->title }}
            </h2>

            <div class="task-description">
                {{ $task->description ?: 'لا يوجد وصف لهذه المهمة.' }}
            </div>

            <div class="task-info">

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

                @if($task->due_date)

                    <span class="badge">
                        تاريخ الاستحقاق:
                        {{ $task->due_date->format('Y-m-d') }}
                    </span>

                @endif

            </div>

            <hr class="task-divider">

            <div class="actions">

                <a
                    href="{{ route('tasks.edit', $task) }}"
                    class="btn btn-edit"
                >
                    تعديل المهمة
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
                        حذف المهمة
                    </button>

                </form>

                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-view"
                >
                    العودة
                </a>

            </div>

        </div>

    </div>

</body>

</html>