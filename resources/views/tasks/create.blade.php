<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>إضافة مهمة - Daily Work</title>

    @vite(['resources/css/tasks.css'])
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        <div class="header">

            <div>
                <h1>إضافة مهمة جديدة</h1>

                <p>
                    أضف مهمة جديدة ونظّم يومك بشكل أفضل.
                </p>
            </div>

            <a href="{{ route('tasks.index') }}" class="btn btn-view">
                العودة للمهام
            </a>

        </div>

        <div class="task-card">

            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf

                <div style="margin-bottom: 20px;">

                    <label for="title">عنوان المهمة</label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="مثال: إنهاء مشروع الجامعة"
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
                        placeholder="اكتب تفاصيل المهمة هنا..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <div style="color:#b91c1c; margin-top:6px;">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div style="margin-bottom: 20px;">

                    <label for="priority">الأولوية</label>

                    <select id="priority" name="priority" required>

                        <option value="low" {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}>
                            منخفضة
                        </option>

                        <option value="medium" {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}>
                            متوسطة
                        </option>

                        <option value="high" {{ old('priority', 'medium') === 'high' ? 'selected' : '' }}>
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

                        <option value="pending" {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}>
                            معلقة
                        </option>

                        <option value="in_progress" {{ old('status') === 'in_progress' ? 'selected' : '' }}>
                            قيد التنفيذ
                        </option>

                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>
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
                        value="{{ old('due_date') }}"
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
                        حفظ المهمة
                    </button>

                    <a
                        href="{{ route('tasks.index') }}"
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