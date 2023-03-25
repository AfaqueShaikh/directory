<!doctype html>
<html>
<head>
    @include('includes.head')
    @yield('header')
</head>
<body>

<div class="wrapper">
    <input type="hidden" id="loggedId" value="{{ isset(auth()->user()->id) ? auth()->user()->id : '' }}" />
    <div id="body" class="active">
        <!-- sidebar navigation component -->
    @include('includes.header')
    <!-- end of navbar navigation -->
        <div class="content">
            @yield('content')
        </div>
    </div>
</div>
@include('includes.footer')
@include('includes.message')
<script>
    localStorage.setItem('ID', '{{ isset(auth()->user()->id) ? auth()->user()->id : '' }}');
    var email = '{{ isset(auth()->user()->email) ? auth()->user()->email : '' }}';
    var d = new Date();
    d.setTime(d.getTime() + (1*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = 'email' + "=" + email + ";" + expires + ";path=/";

/*
    //track time on website:

    let loggedInAt;
    let loggedOutAt;

    let userId = getUserId();

    // let url = document.URL;
    // let url = document.location.origin;
    let url = document.location.host;

    function getUserId () {
        //return userId; // Define a mathod for getting the user if from a cookie or any local variables.
        return '{{ isset(auth()->user()->id) ? auth()->user()->id : '' }}'; // Define a mathod for getting the user if from a cookie or any local variables.
    }

    function getTotalTimeSpent() {
        return (loggedOutAt - loggedInAt);
    }

    $(document).ready(function() {
        loggedInAt = new Date().getTime(); // get the start time when the user logged in

        $(window).on("unload", function() {
            loggedOutAt = new Date().getTime();
            totalTimeSpent = getTotalTimeSpent(loggedOutAt, loggedInAt);
            let minuteVal = totalTimeSpent / 60000; // in minutes

            $.ajax({
                url: "{{ route('time-spent-tracker') }}",
                method: 'post',
                data: {'url': url, 'totalTimeSpent': parseFloat(minuteVal.toFixed(2)), 'userId' : userId}
            });
        });
    });*/
</script>
@yield('footer')
</body>
</html>
