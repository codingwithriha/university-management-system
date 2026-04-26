<!-- <div class="navbar">
    <div class="navbar-brand">
        <div class="logo">🏫</div>
        <span>College Management System</span>
    </div>
    
    <div class="navbar-nav">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>
        <a href="/students" class="{{ request()->is('students*') ? 'active' : '' }}">Students</a>
        <a href="/teachers" class="{{ request()->is('teachers*') ? 'active' : '' }}">Teachers</a>
        <a href="/courses" class="{{ request()->is('courses*') ? 'active' : '' }}">Courses</a>
        <a href="#">Logout</a>
    </div>
</div> -->


<div class="navbar">
    
    <!-- Left Side (Brand) -->
    <div class="navbar-brand">
        <div class="logo">🏫</div>
        <span>College Management System</span>
    </div>

    <!-- Center / Navigation Links -->
    <div class="navbar-nav">
        <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a>

        @auth
            <a href="/students" class="{{ request()->is('students*') ? 'active' : '' }}">Students</a>
            <a href="/teachers" class="{{ request()->is('teachers*') ? 'active' : '' }}">Teachers</a>
            <a href="/courses" class="{{ request()->is('courses*') ? 'active' : '' }}">Courses</a>

            {{-- Role-based Dashboard --}}
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            @elseif(auth()->user()->isTeacher())
                <a href="{{ route('teacher.dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('student.dashboard') }}">Dashboard</a>
            @endif
        @endauth
    </div>

    <!-- Right Side (Auth Section) -->
    <div class="navbar-auth">
        @auth
            <span class="user-info">
                {{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})
            </span>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>

</div>