const vendorsData = [
    {
        id: 1,
        name: "Luxe Catering Co.",
        category: "catering",
        budget: "high",
        rating: 4.9,
        reviews: 128,
        price: "15,000",
        image: "assets/images/catering.png",
        location: "Mumbai"
    },
    {
        id: 2,
        name: "Elite Florals & Decor",
        category: "decoration",
        budget: "medium",
        rating: 4.8,
        reviews: 84,
        price: "8,500",
        image: "assets/images/decoration.png",
        location: "Delhi"
    },
    {
        id: 3,
        name: "Cinematic Event Photography",
        category: "photography",
        budget: "high",
        rating: 4.9,
        reviews: 210,
        price: "12,000",
        image: "https://images.unsplash.com/photo-1520854221256-17451cc331bf?q=80&w=2070&auto=format&fit=crop",
        location: "Bangalore"
    },
    {
        id: 4,
        name: "budget Bites Catering",
        category: "catering",
        budget: "low",
        rating: 4.2,
        reviews: 56,
        price: "3,500",
        image: "https://images.unsplash.com/photo-1555244162-803834f87a4d?q=80&w=2070&auto=format&fit=crop",
        location: "Pune"
    },
    {
        id: 5,
        name: "Enchanted Themes",
        category: "decoration",
        budget: "high",
        rating: 4.7,
        reviews: 92,
        price: "20,000",
        image: "https://images.unsplash.com/photo-1519167758481-83f550bb49b3?q=80&w=2098&auto=format&fit=crop",
        location: "Mumbai"
    },
    {
        id: 6,
        name: "Memories Studio",
        category: "photography",
        budget: "medium",
        rating: 4.6,
        reviews: 145,
        price: "6,000",
        image: "https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=2069&auto=format&fit=crop",
        location: "Delhi"
    }
];

// Document ready
document.addEventListener("DOMContentLoaded", () => {
    // 1. Mobile Menu Toggle
    const menuBtn = document.getElementById("mobile-menu-btn");
    const navLinks = document.getElementById("nav-links");
    
    if (menuBtn && navLinks) {
        menuBtn.addEventListener("click", () => {
            navLinks.classList.toggle("show");
        });
    }

    // 2. Render Vendors Page Logic
    const vendorsGrid = document.getElementById("vendors-grid");
    if (vendorsGrid) {
        renderVendors(vendorsData);

        // Filter functionality
		const categoryFilter = document.getElementById("filter-category");
		const budgetFilter = document.getElementById("filter-budget");
		const locationFilter = document.getElementById("filter-location");

		const applyFilters = () => {
			const category = categoryFilter.value;
			const budget = budgetFilter.value;
			const location = locationFilter.value.toLowerCase();

			const filtered = vendorsData.filter(vendor => {
				const matchCategory = category === "all" || vendor.category === category;
				const matchBudget = budget === "all" || vendor.budget === budget;
				const matchLocation = location === "" || vendor.location.toLowerCase().includes(location);

				return matchCategory && matchBudget && matchLocation;
			});

			renderVendors(filtered);
};

// Apply on change
if (categoryFilter) categoryFilter.addEventListener("change", applyFilters);
if (budgetFilter) budgetFilter.addEventListener("change", applyFilters);

// ✅ LIVE LOCATION SEARCH
if (locationFilter) locationFilter.addEventListener("input", applyFilters);
    }
});

function renderVendors(vendors) {
    const vendorsGrid = document.getElementById("vendors-grid");
    vendorsGrid.innerHTML = "";
    
    if (vendors.length === 0) {
        vendorsGrid.innerHTML = `
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <h3>No vendors found matching your criteria</h3>
                <p class="text-secondary mt-2">Try adjusting your filters</p>
            </div>
        `;
        return;
    }

    vendors.forEach(vendor => {
        const card = document.createElement('div');
        card.className = 'card';
        card.innerHTML = `
            <img src="${vendor.image}" alt="${vendor.name}" class="card-img" onerror="this.src='https://images.unsplash.com/photo-1505369711656-7ee61bb161e1?auto=format&fit=crop&q=80&w=600'">
            <div class="card-body">
                <div style="font-size: 0.8rem; text-transform: uppercase; color: var(--primary-color); font-weight: 700; margin-bottom: 5px;">
                    ${vendor.category} • ${vendor.location}
                </div>
                <h3 class="card-title">${vendor.name}</h3>
                <p class="card-text"><i class="fas fa-star rating"></i> ${vendor.rating} (${vendor.reviews} reviews)</p>
                <div class="card-footer">
                    <span class="price">₹${vendor.price}</span>
                    <a href="vendor-details" class="btn btn-outline" style="padding: 5px 15px; font-size: 0.9rem;">View</a>
                </div>
            </div>
        `;
        vendorsGrid.appendChild(card);
    });
}
