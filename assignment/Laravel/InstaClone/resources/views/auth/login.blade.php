@if(request('wishlist_error'))
    <div class="alert alert-danger">
        {{ request('wishlist_error') }}
    </div>
@endif