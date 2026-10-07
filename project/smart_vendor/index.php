<?php
include_once('header.php');
?>
    <!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>Discover Perfect Vendors for Your Next Event</h1>
        <p>Find top-rated professionals tailored to your budget and style.</p>

        <div class="search-box">
            <select id="home-category">
                <option value="" disabled selected>Event Type</option>
                <option value="catering">Catering</option>
                <option value="birthday">Birthday</option>
                <option value="photography">Photography</option>
                <option value="engagement">Engagement</option>
                <option value="wedding">Wedding</option>
                <option value="reception">Reception</option>
            </select>

            <input type="text" placeholder="Location (e.g. Mumbai, Delhi)">

            <button class="btn btn-primary"
                onclick="window.location.href='vendors'">
                <i class="fas fa-search"></i> Search
            </button>
        </div>
    </div>
</section>

<!-- Services -->
<section class="section">
    <div class="container">
        <h2 class="section-title">Our Top Services</h2>

        <div class="grid">

            <!-- Catering -->
            <div class="card">
                <img src="assets/images/catering.png" class="card-img"
                onerror="this.src='https://images.unsplash.com/photo-1555244162-803834f87a4d?auto=format&fit=crop&q=80&w=600'">
                <div class="card-body text-center">
                    <i class="fas fa-utensils"></i>
                    <h3 class="card-title">Catering</h3>
                    <p class="card-text">Best food services for your event.</p>
                    <a href="vendors.php?category=catering" class="btn btn-outline">Browse</a>
                </div>
            </div>

            <!-- Birthday -->
            <div class="card">
                <img src="assets/images/birthday.jpeg" class="card-img"
                onerror="this.src='https://images.unsplash.com/photo-1519681393784-d120267933ba'">
                <div class="card-body text-center">
                    <i class="fas fa-birthday-cake"></i>
                    <h3 class="card-title">Birthday</h3>
                    <p class="card-text">Make birthdays special with great vendors.</p>
                    <a href="vendors.php?category=birthday" class="btn btn-outline">Browse</a>
                </div>
            </div>

            <!-- Photography -->
            <div class="card">
                <img src="assets/images/photography.png" class="card-img"
                onerror="this.src='https://images.unsplash.com/photo-1520854221256-17451cc331bf'">
                <div class="card-body text-center">
                    <i class="fas fa-camera"></i>
                    <h3 class="card-title">Photography</h3>
                    <p class="card-text">Capture your best moments professionally.</p>
                    <a href="vendors.php?category=photography" class="btn btn-outline">Browse</a>
                </div>
            </div>

            <!-- Engagement -->
            <div class="card">
                <img src="assets/images/engagement.png" class="card-img"
                onerror="this.src='https://images.unsplash.com/photo-1522673607200-164d1b6ce486'">
                <div class="card-body text-center">
                    <i class="fas fa-ring"></i>
                    <h3 class="card-title">Engagement</h3>
                    <p class="card-text">Plan a perfect engagement ceremony.</p>
                    <a href="vendors.php?category=engagement" class="btn btn-outline">Browse</a>
                </div>
            </div>

            <!-- Wedding -->
            <div class="card">
                <img src="assets/images/wedding.jpg" class="card-img"
                onerror="this.src='https://images.unsplash.com/photo-1519741497674-611481863552'">
                <div class="card-body text-center">
                    <i class="fas fa-heart"></i>
                    <h3 class="card-title">Wedding</h3>
                    <p class="card-text">Complete wedding planning services.</p>
                    <a href="vendors.php?category=wedding" class="btn btn-outline">Browse</a>
                </div>
            </div>

            <!-- Reception -->
            <div class="card">
                <img src="assets/images/reception.jpg" class="card-img"
                onerror="this.src='https://images.unsplash.com/photo-1505236858219-8359eb29e329'">
                <div class="card-body text-center">
                    <i class="fas fa-glass-cheers"></i>
                    <h3 class="card-title">Reception</h3>
                    <p class="card-text">Elegant reception arrangements.</p>
                    <a href="vendors.php?category=reception" class="btn btn-outline">Browse</a>
                </div>
            </div>

        </div>
    </div>
</section>

	<!-- About Section -->
    <section class="section" style="background: white;">
        <div class="container" style="display: flex; gap: 4rem; align-items: center; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <img src="https://images.unsplash.com/photo-1505369711656-7ee61bb161e1?auto=format&fit=crop&q=80&w=800" alt="About System" style="border-radius: var(--border-radius); box-shadow: var(--shadow-xl);">
            </div>
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">Why Choose SmartEvents?</h2>
                <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 1.1rem;">Our Artificial Intelligence-driven recommendation system analyzes your budget, location, and aesthetic preferences to match you with exactly the right vendors for your special day. No more endless scrolling—just pure event magic.</p>
                
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <i class="fas fa-check-circle" style="color: var(--success-color); font-size: 1.5rem;"></i>
                    <span style="font-weight: 500;">Verified, High-Quality Professionals</span>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                    <i class="fas fa-check-circle" style="color: var(--success-color); font-size: 1.5rem;"></i>
                    <span style="font-weight: 500;">Transparent Pricing & Reviews</span>
                </div>
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem;">
                    <i class="fas fa-check-circle" style="color: var(--success-color); font-size: 1.5rem;"></i>
                    <span style="font-weight: 500;">Smart Budget Allocation Algorithms</span>
                </div>
                <a href="register" class="btn btn-primary">Join Platform</a>
            </div>
        </div>
    </section>

    <!-- Feedback -->
	
	<div class="container" style="padding:50px">
	<h1>Feedback</h1>
	<form method="post" name="feedback" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="number" name="customer_id" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Vendor Name</label>
                <input type="number" name="vendor_id" class="form-control">
            </div>
			<div class="mb-3">
                <label class="form-label">Rating</label>
                <input type="number" name="rating" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Comment</label>
                <textarea class="form-control"  name="comment" rows="3"></textarea>
            </div>
			<div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control">
            </div>
			<button type="submit" name="submit" class="btn btn-primary">Send Feedback</button>
	
	  </form>
	</div>

    <!-- Footer -->
 <?php
include_once('footer.php');
?>