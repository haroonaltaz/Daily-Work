<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>تعديل المهمة - Daily Work</title>

    @vite(['resources/css/tasks.css'])
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        <div class="header">

            <div>
                <h1>تعديل المهمة</h1>

                <p>
                    عدّل تفاصيل المهمة واحفظ التغييرات.
                </p>
            </div>

            <a href="{{ route('tasks.index') }}" class="btn btn-view">
                العودة للمهام
            </a>

        </div>

        <div class="task-card">

            <form action="{{ route('tasks.update', $task) }}" method="POST">

                @csrf
                @method('PUT')

                <div style="margin-bottom: 20px;">

                    <label for="title">عنوان المهمة</label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title', $task->title) }}"
                        required
                    >

                    @error('title')
                        <div style="color:#b91c1c; margin-top:6px;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div style="margin-bottom: 20px;">

                    <label for="description">الوصف</label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                    >{{ old('description', $task->description) }}</textarea>

                    @error('description')
                        <div style="color:#b91c1c; margin-top:6px;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div style="margin-bottom: 20px;">

                    <label for="priority">الأولوية</label>

                    <select id="priority" name="priority" required>

                        <option
                            value="low"
                            {{ old('priority', $task->priority) === 'low' ? 'selected' : '' }}
                        >
                            منخفضة
                        </option>

                        <option
                            value="medium"
                            {{ old('priority', $task->priority) === 'medium' ? 'selected' : '' }}
                        >
                            متوسطة
                        </option>

                        <option
                            value="high"
                            {{ old('priority', $task->priority) === 'high' ? 'selected' : '' }}
                        >
                            عالية
                        </option>

                    </select>

                    @error('priority')
                        <div style="color:#b91c1c; margin-top:6px;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div style="margin-bottom: 20px;">

                    <label for="status">الحالة</label>

                    <select id="status" name="status" required>

                        <option
                            value="pending"
                            {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}
                        >
                            معلقة
                        </option>

                        <option
                            value="in_progress"
                            {{ old('status', $task->status) === 'in_progress' ? 'selected' : '' }}
                        >
                            قيد التنفيذ
                        </option>

                        <option
                            value="completed"
                            {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}
                        >
                            مكتملة
                        </option>

                    </select>

                    @error('status')
                        <div style="color:#b91c1c; margin-top:6px;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div style="margin-bottom: 25px;">

                    <label for="due_date">تاريخ الاستحقاق</label>

                    <input
                        id="due_date"
                        type="date"
                        name="due_date"
                        value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}"
                    >

                    @error('due_date')
                        <div style="color:#b91c1c; margin-top:6px;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="actions">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        حفظ التعديلات
                    </button>

                    <a
                        href="{{ route('tasks.show', $task) }}"
                        class="btn btn-view"
                    >
                        إلغاء
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>

</html>