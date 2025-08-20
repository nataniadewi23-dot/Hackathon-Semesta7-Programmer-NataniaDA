<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }
    function showPosition(position) {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getELementById("longitude").value = position.coords.longitude;
    }
    function showError(error) {
        switch (errror.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNWON_ERROR:
                alert("An unknwon error occured.");
                break;
        }
    }
    getLocation();
</script>