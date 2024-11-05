(function() {
    // Set up the object
    var campsite = new Object();
    campsite.name = 'Potawatomi State Park';
    campsite.totalSites = 123;
    campsite.occupied = 42;
    campsite.checkAvailability = function() {
        return this.totalSites - this.occupied;
    };
 
    // Get elements and update HTML
    var elName = document.getElementById('campsiteName');
    elName.textContent = campsite.name;

    var elTotal = document.getElementById('totalSites');
        elTotal.textContent = campsite.totalSites;
 
    var elAvailable = document.getElementById('available');
    elAvailable.textContent = campsite.checkAvailability();
 })();