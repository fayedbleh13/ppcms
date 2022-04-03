<div>
    {{-- @if ($user == Null)
        <a class="dropdown-item" href="{{ route('user.dashboard', ['id' => $users->id] ) }}">Dashboard</a>
    @else
        <a class="dropdown-item" href="{{ route('user.dashboard', ['user_id' => $user->user_id] ) }}">Dashboard</a>
    @endif --}}
    <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
</div>
