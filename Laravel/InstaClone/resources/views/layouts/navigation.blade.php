@if(Auth::check())
    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-link">
            Logout
        </button>
    </form>
@endif