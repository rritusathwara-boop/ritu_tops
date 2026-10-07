<?php
include_once('header.php');
?>
    <div style="background: var(--primary-color); padding: 4rem 0; color: white; text-align: center;">
        <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 10px;">Find Your Perfect Vendor</h1>
        <p style="opacity: 0.9; font-size: 1.1rem;">Filter curated professionals for your event</p>
    </div>

    <!-- Main Listing Layout -->
    <section class="section" style="padding-top: 3rem;">
        <div class="container vendors-layout">
            
            <!-- Sidebar Filter -->
            <aside class="filter-sidebar">
                <h3 style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-filter"></i> Filters
                </h3>
                
                <div class="filter-group">
                    <label for="filter-category">Service Category</label>
                    <select id="filter-category">
                        <option value="" disabled selected>Event Type</option>
						<option value="catering">Catering</option>
						<option value="birthday">Birthday</option>
						<option value="photography">Photography</option>
						<option value="engagement">Engagement</option>
						<option value="wedding">Wedding</option>
						<option value="reception">Reception</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="filter-budget">Budget Range</label>
                    <select id="filter-budget">
                        <option value="all">Any Budget</option>
                        <option value="low">Economy (< ₹5k)</option>
                        <option value="medium">Standard (₹5k - ₹10k)</option>
                        <option value="high">Premium (> ₹10k)</option>
                    </select>
                </div>
                
                <div class="filter-group mb-4">
                    <label>Location</label>
                    <input type="text" id="filter-location" placeholder="Type city...">
                </div>

                <button class="btn btn-primary btn-block">Apply Filters</button>
            </aside>

            <!-- Vendors Grid Container -->
            <div>
                <div class="grid" id="vendors-grid">
                    <!-- Populated by script.js -->
                </div>
            </div>

        </div>
    </section>

    <!-- Footer -->
<?php
include_once('footer.php');
?>