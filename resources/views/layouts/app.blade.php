<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{config('app.name', 'hospital')}}</title>
      
    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @include('inc.check')
            <h1>{{$title}}</h1>
            @yield('content')
        </div>
    </body>
</html>

<script>
    
    function check(){
        var choice = confirm("are you sure you want to delete this?");
        if(choice){
            return true;
        }

        else {
            return false;
        }
    }

    function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementsByClassName("table")[0];
    switching = true;

    dir = "asc"; 

    while (switching) {

        switching = false;
        rows = table.getElementsByTagName("TR");

        for (i = 1; i < (rows.length - 1); i++) {

        shouldSwitch = false;

        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];

        if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {

            shouldSwitch= true;
            break;
            }
        } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {

            shouldSwitch= true;
            break;
            }
        }
        }
        if (shouldSwitch) {
        
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
       
        switchcount ++; 
        } else {
        
        if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
        }
        }
    }
    }



    
</script>