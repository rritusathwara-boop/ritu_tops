<form action="{{ route('caption.generate') }}" method="POST">
    @csrf

    <label>Photo Topic</label>
    <input type="text" name="topic" required>

    <label>3-5 Keywords</label>
    <input type="text" name="keywords" required>

    <button type="submit">Generate Caption</button>
</form>