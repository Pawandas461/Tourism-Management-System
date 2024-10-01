// Fetch data for quick stats (replace with your actual data fetching logic)
fetch('/api/admin/stats')
    .then(response => response.json())
    .then(data => {
        document.getElementById('total-destinations').textContent = data.totalDestinations;
        document.getElementById('active-packages').textContent = data.activePackages;
        document.getElementById('bookings-this-month').textContent = data.bookingsThisMonth;
    });
