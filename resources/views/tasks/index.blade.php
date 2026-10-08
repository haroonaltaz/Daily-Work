<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>المهام - Daily Work</title>

    @vite(['resources/css/tasks.css'])
</head>

<body>

    @include('layouts.navigation')

    <div class="container">

        {{-- Header --}}
        <div class="header">

            <div>
                <h1>مهامي</h1>

                <p>
                    نظّم مهامك وأنجز يومك بشكل أفضل.
                </p>
            </div>

            <a
                href="{{ route('tasks.create') }}"
                class="btn btn-primary"
            >
                + إضافة مهمة
            </a>

        </div>


        {{-- Search & Filters --}}
        <div class="task-card">

            <h3 style="margin-top: 0; margin-bottom: 18px;">
                البحث والفلترة
            </h3>

            <form
                action="{{ route('tasks.index') }}"
                method="GET"
            >

                <div class="filters-grid">

                    {{-- Search --}}
                    <div class="filter-group filter-search">

                        <label for="search">
                            البحث عن مهمة
                        </label>

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="اكتب اسم المهمة أو الوصف..."
                        >

                    </div>


                    {{-- Status Filter --}}
                    <div class="filter-group">

                        <label for="status">
                            الحالة
                        </label>

                        <select
                            id="status"
                            name="status"
                        >

                            <option value="">
                                كل الحالات
                            </option>

                            <option
                                value="pending"
                                {{ request('status') === 'pending' ? 'selected' : '' }}
                            >
                                معلقة
                            </option>

                            <option
                                value="in_progress"
                                {{ request('status') === 'in_progress' ? 'selected' : '' }}
                            >
                                قيد التنفيذ
                            </option>

                            <option
                                value="completed"
                                {{ request('status') === 'completed' ? 'selected' : '' }}
                            >
                                مكتملة
                            </option>

                        </select>

                    </div>


                    {{-- Priority Filter --}}
                    <div class="filter-group">

                        <label for="priority">
                            الأولوية
                        </label>

                        <select
                            id="priority"
                            name="priority"
                        >

                            <option value="">
                                كل الأولويات
                            </option>

                            <option
                                value="low"
                                {{ request('priority') === 'low' ? 'selected' : '' }}
                            >
                                منخفضة
                            </option>

                            <option
                                value="medium"
                                {{ request('priority') === 'medium' ? 'selected' : '' }}
                            >
                                متوسطة
                            </option>

                            <option
                                value="high"
                                {{ request('priority') === 'high' ? 'selected' : '' }}
                            >
                                عالية
                            </option>

                        </select>

                    </div>


                    {{-- Sort --}}
                    <div class="filter-group">

                        <label for="sort">
                            ترتيب المهام
                        </label>

                        <select
                            id="sort"
                            name="sort"
                        >

                            <option
                                value=""
                                {{ request('sort') === '' ? 'selected' : '' }}
                            >
                                الأحدث إضافة
                            </option>

                            <option
                                value="due_asc"
                                {{ request('sort') === 'due_asc' ? 'selected' : '' }}
                            >
                                الأقرب للاستحقاق
                            </option>

                            <option
                                value="due_desc"
                                {{ request('sort') === 'due_desc' ? 'selected' : '' }}
                            >
                                الأبعد للاستحقاق
                            </option>

                        </select>

                    </div>


                    {{-- Search Button --}}
                    <div>

                        <button
                            type="submit"
                            class="btn btn-primary filter-button"
                        >
                            بحث
                        </button>

                    </div>

                </div>

            </form>

        </div>


        {{-- Clear Filters --}}
        @if(request('search') || request('status') || request('priority') || request('sort'))

            <div style="margin-bottom: 20px;">

                <a
                    href="{{ route('tasks.index') }}"
                    class="btn btn-view"
                >
                    إلغاء الفلترة
                </a>

            </div>

        @endif


        {{-- Success Message --}}
        @if(session('success'))

            <div
                class="empty"
                style="margin-bottom: 20px;"
            >
                {{ session('success') }}
            </div>

        @endif


        {{-- Tasks --}}
        @forelse($tasks as $task)

            <div class="task-card">

                {{-- Task Title --}}
                <h3>
                    {{ $task->title }}
                </h3>


                {{-- Description --}}
                <div class="task-description">

                    {{ $task->description ?: 'لا يوجد وصف لهذه المهمة.' }}

                </div>


                {{-- Task Information --}}
                <div class="task-info">

                    {{-- Priority --}}
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


                    {{-- Status --}}
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


                    {{-- Due Date --}}
                    @if($task->due_date)

                        <span class="badge">

                            الاستحقاق:

                            {{ $task->due_date->format('Y-m-d') }}

                        </span>

                    @endif

                </div>


                {{-- Actions --}}
                <div class="actions">

                    {{-- View --}}
                    <a
                        href="{{ route('tasks.show', $task) }}"
                        class="btn btn-view"
                    >
                        عرض
                    </a>


                    {{-- Edit --}}
                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="btn btn-edit"
                    >
                        تعديل
                    </a>


                    {{-- Change Status --}}
                    @if($task->status !== 'completed')

                        <form
                            action="{{ route('tasks.updateStatus', $task) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <input
                                type="hidden"
                                name="status"
                                value="completed"
                            >

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                ✓ مكتملة
                            </button>

                        </form>

                    @endif


                    @if($task->status !== 'in_progress')

                        <form
                            action="{{ route('tasks.updateStatus', $task) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <input
                                type="hidden"
                                name="status"
                                value="in_progress"
                            >

                            <button
                                type="submit"
                                class="btn btn-edit"
                            >
                                ↻ قيد التنفيذ
                            </button>

                        </form>

                    @endif


                    @if($task->status !== 'pending')

                        <form
                            action="{{ route('tasks.updateStatus', $task) }}"
                            method="POST"
                        >

                            @csrf
                            @method('PATCH')

                            <input
                                type="hidden"
                                name="status"
                                value="pending"
                            >

                            <button
                                type="submit"
                                class="btn btn-view"
                            >
                                ○ معلقة
                            </button>

                        </form>

                    @endif


                    {{-- Delete --}}
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

            {{-- Empty State --}}
            <div class="empty">

                @if(request('search') || request('status') || request('priority') || request('sort'))

                    <h3>
                        ما لقينا مهام مطابقة
                    </h3>

                    <p>
                        جرّب تغيير البحث أو الفلاتر.
                    </p>

                    <a
                        href="{{ route('tasks.index') }}"
                        class="btn btn-view"
                    >
                        عرض جميع المهام
                    </a>

                @else

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
                        + إضافة أول مهمة
                    </a>

                @endif

            </div>

        @endforelse

    </div>

</body>

</html>