<nav class="navbar">

    <div class="navbar-container">

        <a href="{{ route('dashboard') }}" class="navbar-brand">
            Daily Work
        </a>

        <div class="navbar-links">

            <a href="{{ route('dashboard') }}">
                لوحة التحكم
            </a>

            <a href="{{ route('tasks.index') }}">
                المهام
            </a>

            <a href="{{ route('profile.edit') }}">
                الملف الشخصي
            </a>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-button"
                    onclick="return confirm('هل تريد تسجيل الخروج؟')"
                >
                    تسجيل الخروج
                </button>
            </form>

        </div>

    </div>

</nav>