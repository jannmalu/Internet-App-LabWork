$(document).ready(function(){

    var offset = new Date().getTimezoneOffset(); //returns the number of minutes ahead or behind the greenwich meridian

    var timestamp = new Date().getTime(); //returns the number of milliseconds

    var utc_timestamp =timestamp + (60000 * offset); //Converting time into Universal Time Coordinated(UTC)

    $('#time_zone_effect').val(offset);
    $('#utc_timestamp').val(utc_timestamp);
})