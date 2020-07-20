<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--    Bootsrap CSS link    -->
    <link rel="stylesheet" href="{{ mix('/css/theme.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/myCustomTheme.css')}}"> 
    <!-- Fontawesome CSS link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <title> ClassHome - Dashboard </title>

    <script>
        window.onload = function () {
        
        var options = {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Monthly Subscriptions Data"
            },
            axisX: {
                valueFormatString: "MMM"
            },
            axisY: {
                prefix: "",
                labelFormatter: addSymbols
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [
                {
                    type: "column",
                    name: "Actual Subscriptions",
                    showInLegend: true,
                    xValueFormatString: "MMMM YYYY",
                    yValueFormatString: "",
                    dataPoints: [
                        { x: new Date(2017, 0), y: 2000 },
                        { x: new Date(2017, 1), y: 2500 },
                        { x: new Date(2017, 2), y: 3000 },
                        { x: new Date(2017, 3), y: 7000 },
                        { x: new Date(2017, 4), y: 4000 },
                        { x: new Date(2017, 5), y: 6000 },
                        { x: new Date(2017, 6), y: 5500 },
                        { x: new Date(2017, 7), y: 3300 },
                        { x: new Date(2017, 8), y: 4500 },
                        { x: new Date(2017, 9), y: 3000 },
                        { x: new Date(2017, 10), y: 5000 },
                        { x: new Date(2017, 11), y: 3500 }
                    ]
                },
                {
                    type: "line",
                    name: "Expected Subscriptions",
                    showInLegend: true,
                    yValueFormatString: "",
                    dataPoints: [
                        { x: new Date(2017, 0), y: 3200 },
                        { x: new Date(2017, 1), y: 3700 },
                        { x: new Date(2017, 2), y: 4000 },
                        { x: new Date(2017, 3), y: 5200 },
                        { x: new Date(2017, 4), y: 4500 },
                        { x: new Date(2017, 5), y: 4700 },
                        { x: new Date(2017, 6), y: 4200 },
                        { x: new Date(2017, 7), y: 4300 },
                        { x: new Date(2017, 8), y: 4100 },
                        { x: new Date(2017, 9), y: 4200 },
                        { x: new Date(2017, 10), y: 5000 },
                        { x: new Date(2017, 11), y: 4500 }
                    ]
                },
            ]
        };
        $("#chartContainer").CanvasJSChart(options);
        
        function addSymbols(e) {
            var suffixes = ["", "", "", ""];
            var order = Math.max(Math.floor(Math.log(e.value) / Math.log(100)), 0);
        
            if (order > suffixes.length - 1)
                order = suffixes.length - 1;
        
            var suffix = suffixes[order];
            return CanvasJS.formatNumber(e.value / Math.pow(10, order)) + suffix;
        }
        
        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }
        
        
        }
        </script>

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0 shadow">
        <div class="container">
            <a class="navbar-brand">ClassHome</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a href="{{ url('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ url('classes') }}" class="nav-link">Classes</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ url('teachers') }}" class="nav-link">Teachers</a>
                    </li>
                    <li class="nav-item px-2">
                        <a href="{{ url('students') }}" class="nav-link">Students</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown mr-3">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="fas fa-user"></i> Admin
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-user-times"></i> {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    
<!---------------------- HEADER-------------------------------->
<header class="py-1 bg-primary text-white">
    <div class="container ">
        <div class="row " id="main_header">
            <div class="col-md-6 ">
                <h4><i class="fas fa-cog"></i> Dashboard</h4>
            </div>
        </div>
    </div>
</header>
<!---------------------------- END HEADER------------------------------>

<!------------------------------- CONTENT ------------------------------->
<section id="posts">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div id="chartContainer" style="height: 450px; width: 90%;"></div>
                
            </div>
    
            <!------------------------- BOXES---------------------->
            <div class="col-md-3">
                <div class="card text-center bg-primary text-white mb-3 shadow">
                    <div class="card-body">
                        <h3>Classes</h3>
                        <h4 class="display-4">
                            <i class="fas fa-school"></i> {{ $nbClasses }}
                        </h4>
                        <a href="{{ url('classes') }}" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>
                <div class="card text-center bg-success text-white mb-3 shadow">
                    <div class="card-body">
                        <h3>Teachers</h3>
                        <h4 class="display-4">
                            <i class="fas fa-chalkboard-teacher"></i> {{ $nbTeachers }}
                        </h4>
                        <a href="{{ url('teachers') }}" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>
                <div class="card text-center bg-warning text-white mb-3 shadow">
                    <div class="card-body">
                        <h3>Students</h3>
                        <h4 class="display-4">
                            <i class="fas fa-user-graduate"></i> {{ $nbStudents }}
                        </h4>
                        <a href="{{ url('students') }}" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>
            </div>
            <!-------------------------END BOXES---------------------->
        </div>
    </div>
</section>
<!------------------------------- END CONTENT ------------------------------->

<!-- FOOTER -->
<footer id="sticky-footer " class="py-4 bg-dark text-white-50 ">
    <div class="container text-center ">
        <small>Copyright &copy; Home Classroom <script type="text/JavaScript "> document.write(new Date().getFullYear()) </script></small>
    </div>
</footer>
<!-- END FOOTER -->


<!-- Jquery link -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    
<!-- Popper link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- Bootstrap JS link -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

</body>

</html>

