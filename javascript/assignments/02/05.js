(function () {
    // Arrays for days and for months
    var dateDays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var dateMonths = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    // Get current date information
    var dateNow = new Date();
    var dateNowYear = dateNow.getFullYear();
    var dateNowMonthNumber = dateNow.getMonth();
    var dateNowMonthName = dateMonths[dateNowMonthNumber];
    var dateNowDate = dateNow.getDate();
    var dateNowDayNumber = dateNow.getDay();
    var dateNowDayName = dateDays[dateNowDayNumber];

    // Find elements and update content
    var elDateToday = document.getElementById("date-today");
    elDateToday.textContent = dateNowDayName + ", " + dateNowMonthName + " " + dateNowDate + ", " + dateNowYear;

    var elCopyrightYear = document.getElementById("copyright-year");
    elCopyrightYear.textContent = dateNowYear;
})();