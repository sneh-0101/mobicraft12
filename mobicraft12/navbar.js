// Navbar Toggle and Dropdown Functionality
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('navbar-toggle');
    const navbar = document.getElementById('navbar-menu');
    const dropdowns = document.querySelectorAll('.dropdown');
    
    console.log('Navbar elements found:', { toggleBtn, navbar, dropdowns: dropdowns.length });
    
    // Toggle navbar menu
    if (toggleBtn && navbar) {
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            console.log('Toggle button clicked');
            navbar.classList.toggle('active');
            toggleBtn.classList.toggle('active');
            
            console.log('Navbar classes:', navbar.className);
            console.log('Toggle classes:', toggleBtn.className);
            
            // Close all dropdowns when toggling main menu
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        });
    } else {
        console.error('Toggle button or navbar not found!');
    }
    
    // Handle dropdown toggles
    dropdowns.forEach(dropdown => {
        const dropdownBtn = dropdown.querySelector('.dropdown-btn');
        const dropdownContent = dropdown.querySelector('.dropdown-content');
        
        if (dropdownBtn && dropdownContent) {
            dropdownBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                // Close other dropdowns
                dropdowns.forEach(otherDropdown => {
                    if (otherDropdown !== dropdown) {
                        otherDropdown.classList.remove('active');
                    }
                });
                
                // Toggle current dropdown
                dropdown.classList.toggle('active');
            });
        }
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown') && !e.target.closest('#navbar-toggle')) {
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });
    
    // Close navbar on mobile when clicking a link
    const navLinks = document.querySelectorAll('#navbar-menu a:not(.dropdown-btn)');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                navbar.classList.remove('active');
                toggleBtn.classList.remove('active');
            }
        });
    });
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            navbar.classList.remove('active');
            toggleBtn.classList.remove('active');
            dropdowns.forEach(dropdown => {
                dropdown.classList.remove('active');
            });
        }
    });
});

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
