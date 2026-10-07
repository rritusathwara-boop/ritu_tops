<?php
include_once('header.php');
?>

    <!-- Vendor Banner -->
    <img src="assets/images/catering.png" alt="Vendor Cover" class="detail-banner" onerror="this.src='https://images.unsplash.com/photo-1555244162-803834f87a4d?auto=format&fit=crop&q=80&w=2000'">

    <!-- Main Content -->
    <div class="container">
        <div class="vendor-details-card">
            
            <!-- Left Column: Info -->
            <div>
                <span class="badge badge-success mb-2" style="display:inline-block;">Verified Partner</span>
                <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem;">Luxe Catering Co.</h1>
                
                <div class="vendor-meta">
                    <span><i class="fas fa-star rating"></i> 4.9 (128 Reviews)</span>
                    <span><i class="fas fa-map-marker-alt"></i> Mumbai, India</span>
                    <span><i class="fas fa-utensils"></i> Cuisine: Multi-cuisine</span>
                </div>

                <h3 class="mt-4 mb-2">About the Vendor</h3>
                <p style="color: var(--text-secondary); margin-bottom: 2rem;">Luxe Catering Co. is a premier event catering service specializing in large-scale luxury weddings, corporate banquets, and intimate celebrations. With over a decade of experience, our executive chefs bring global flavors customized meticulously to your palette and aesthetic.</p>

                <h3 class="mb-2">Services & Features</h3>
                <ul style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; color: var(--text-secondary); margin-bottom: 2rem;">
                    <li><i class="fas fa-check" style="color: var(--success-color)"></i> Live Cooking counters</li>
                    <li><i class="fas fa-check" style="color: var(--success-color)"></i> Premium Tableware included</li>
                    <li><i class="fas fa-check" style="color: var(--success-color)"></i> Waitstaff provided</li>
                    <li><i class="fas fa-check" style="color: var(--success-color)"></i> Custom Menu Tasting</li>
                </ul>

                <!-- Photo Gallery Mock -->
                <h3 class="mb-2">Gallery</h3>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <img src="assets/images/decoration.png" style="border-radius: 8px; width: 100%; height: 150px; object-fit: cover;" alt="Gallery 1" onerror="this.src='https://images.unsplash.com/photo-1519167758481-83f550bb49b3?auto=format&fit=crop&q=80&w=600'">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=600&auto=format&fit=crop" style="border-radius: 8px; width: 100%; height: 150px; object-fit: cover;" alt="Gallery 2">
                </div>
            </div>

            <!-- Right Column: Booking panel -->
            <aside>
                <div class="booking-panel sticky-top" style="position: sticky; top: 120px;">
                    <p style="color: var(--text-secondary); font-weight: 600; text-transform: uppercase; font-size: 0.85rem;">Starting Package From</p>
                    <div class="booking-price">₹15,000</div>
                    <p style="color: var(--text-secondary); margin-bottom: 2rem; font-size: 0.9rem;">Per 50 guests (Standard Menu)</p>

                    <div class="form-group">
                        <label>Event Date</label>
                        <input type="date" name="event_date" class="form-control">
                    </div>
                    
					<div class="form-group">
                        <label>Total Amount</label>
                        <input type="number" name="total_amount" class="form-control">
                    </div>
					
                    <div class="form-group mb-4">
                        <label>Guest Count</label>
                        <input type="number" name="guest" class="form-control" placeholder="100">
                    </div>

                    <button class="btn btn-primary btn-block mb-2" onclick="alert('Booking Request Sent to Luxe Catering Co.!')">Request to Book</button>
                    <button class="btn btn-outline btn-block">Message Vendor</button>
                </div>
            </aside>

        </div>
    </div>

    <!-- Footer -->
<?php
include_once('footer.php');
?>