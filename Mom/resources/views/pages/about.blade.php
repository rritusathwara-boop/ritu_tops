@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-center position-relative d-flex align-items-center" style="background: url('{{ asset('assets/images/black_partyware.jpeg') }}') no-repeat center center/cover; min-height: 50vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.65);"></div>
    <div class="container position-relative text-white z-1 py-5 animate-on-scroll">
        <span class="text-uppercase tracking-widest text-warning small fw-bold mb-2 d-inline-block" style="letter-spacing: 3px;">Our Heritage</span>
        <h1 class="display-4 fw-bold mb-3 font-playfair text-white">About Mom &amp; Me</h1>
        <p class="lead mx-auto text-light" style="max-width: 600px;">Your premier destination for elegant, contemporary ladies western wear in Ahmedabad.</p>
    </div>
</section>

<div class="container py-5">
    <div class="row g-5 align-items-center mb-5 animate-on-scroll">
        <div class="col-md-6">
            <span class="text-uppercase small text-muted tracking-wider fw-bold">Since Our Inception</span>
            <h2 class="font-playfair display-6 fw-bold mt-1 mb-4">Crafting Confident Styles for Modern Women</h2>
            <p class="text-muted mb-3" style="line-height: 1.8;"><strong>Mom &amp; Me – Ladies Western Wear</strong> was founded with a clear purpose: to bring sophisticated, chic, and accessible western fashion to women who want to feel confident, stylish, and comfortable in every setting.</p>
            <p class="text-muted mb-4" style="line-height: 1.8;">Located in Maninagar, Ahmedabad, we specialize in dresses, gowns, stylish co-ords, trendy tops, and statement party outfits. Each silhouette is handpicked for its drape, craftsmanship, and modern flair.</p>
            <a href="{{ route('shop') }}" class="btn btn-dark rounded-0 px-4 py-2 text-uppercase fw-semibold" style="background-color: var(--primary-color);">Discover Our Collection</a>
        </div>
        <div class="col-md-6">
            <div class="position-relative shadow-lg border p-2 bg-white">
                <img src="{{ asset('assets/images/partyware.jpeg') }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;" alt="Fashion Story">
            </div>
        </div>
    </div>
    
    <div class="row g-5 align-items-center animate-on-scroll flex-md-row-reverse mt-4 pt-4 border-top">
        <div class="col-md-6">
            <span class="text-uppercase small text-muted tracking-wider fw-bold">Our Philosophy</span>
            <h2 class="font-playfair display-6 fw-bold mt-1 mb-4">Every Outfit Tells a Story</h2>
            <p class="text-muted mb-3" style="line-height: 1.8;">We believe what you wear is an extension of your individuality. That's why our team curates garments that strike the ideal harmony between trendiness and timeless class.</p>
            <p class="text-muted mb-0" style="line-height: 1.8;">From daytime brunches to grand evening galas, Mom &amp; Me ensures you always dress to impress with effortless charm.</p>
        </div>
        <div class="col-md-6">
            <div class="row g-3">
                <div class="col-6">
                    <img src="{{ asset('assets/images/light_pink_frock.jpeg') }}" class="img-fluid w-100 shadow-sm border p-1" style="height: 250px; object-fit: cover;" alt="Pastel Fashion">
                </div>
                <div class="col-6">
                    <img src="{{ asset('assets/images/yellow_frock.jpeg') }}" class="img-fluid w-100 shadow-sm border p-1 mt-4" style="height: 250px; object-fit: cover;" alt="Summer Collection">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
