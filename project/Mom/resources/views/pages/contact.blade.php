@extends('layouts.app')

@section('content')
<div class="bg-light py-5">
    <div class="container text-center">
        <h1 class="font-playfair mb-0">Contact Us</h1>
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mt-3">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>

<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-6 animate-on-scroll">
            <h2 class="font-playfair mb-2">Get in Touch</h2>
            <p class="text-muted mb-4">Have questions about an outfit, custom sizing, bulk inquiries, or orders? Send us a message and our team will get back to you promptly.</p>
            
            <form onsubmit="event.preventDefault(); alert('Thank you for contacting Mom & Me! We have received your message and will respond shortly.'); this.reset();">
                <div class="mb-3">
                    <label class="form-label small fw-bold">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control rounded-0 p-3" placeholder="Enter your full name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="form-control rounded-0 p-3" placeholder="name@example.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-bold">Phone Number</label>
                    <input type="tel" class="form-control rounded-0 p-3" placeholder="e.g. 9783074387">
                </div>
                <div class="mb-4">
                    <label class="form-label small fw-bold">Message <span class="text-danger">*</span></label>
                    <textarea class="form-control rounded-0 p-3" rows="5" placeholder="How can we help you?" required></textarea>
                </div>
                <button type="submit" class="btn btn-dark rounded-0 px-5 py-3 text-uppercase fw-semibold shadow-sm" style="background-color: var(--primary-color); letter-spacing: 1px;">Send Message</button>
            </form>
        </div>
        
        <div class="col-lg-5 offset-lg-1 animate-on-scroll">
            <div class="card border-0 shadow-sm rounded-0 p-4 bg-light">
                <h4 class="font-playfair mb-4 border-bottom pb-3">Store Information</h4>
                
                <div class="d-flex mb-4">
                    <div class="text-dark me-3"><i class="fas fa-map-marker-alt fa-2x text-warning"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1 font-playfair">Visit Our Boutique</h6>
                        <p class="text-muted small mb-0">Shop No. 24, Milan Park Society<br>Prakash Nagar Bus Stand, Near Jawahar Chowk<br>Maninagar, Ahmedabad – 380008, Gujarat</p>
                    </div>
                </div>
                
                <div class="d-flex mb-4">
                    <div class="text-dark me-3"><i class="fas fa-phone fa-2x text-warning"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1 font-playfair">Phone &amp; WhatsApp</h6>
                        <p class="text-muted small mb-0">+91 9783074387</p>
                        <small class="text-muted">Mon - Sun: 10:30 AM to 9:30 PM</small>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="text-dark me-3"><i class="fas fa-envelope fa-2x text-warning"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1 font-playfair">Email</h6>
                        <p class="text-muted small mb-0">hello@momandme.com</p>
                    </div>
                </div>
                
                <div class="d-flex mb-3">
                    <div class="text-dark me-3"><i class="fab fa-instagram fa-2x text-warning"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1 font-playfair">Instagram</h6>
                        <p class="text-muted small mb-0"><a href="https://instagram.com" target="_blank" class="text-decoration-none text-dark fw-semibold">@mom_and_me1799</a></p>
                    </div>
                </div>
            </div>

            <div class="mt-4 shadow-sm border p-2 bg-white">
                <img src="{{ asset('assets/images/partyware.jpeg') }}" class="img-fluid w-100" style="height: 220px; object-fit: cover;" alt="Store Banner">
            </div>
        </div>
    </div>
</div>
@endsection
