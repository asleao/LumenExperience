<!DOCTYPE html>
<html lang="en" ng-app="StockController">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script>
            angular.module("StockController",[]);
            
            
        </script>
        
        <title>Stock Control</title>

        <!-- Bootstrap Core CSS -->
        {!! HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}

        <!-- MetisMenu CSS -->
        {!! HTML::style('bower_components/metisMenu/dist/metisMenu.min.css') !!}
        
        <!-- Timeline CSS -->
        {!! HTML::style('dist/css/timeline.css') !!}
        
        <!-- Custom CSS -->
        {!! HTML::style('dist/css/sb-admin-2.css') !!}
        
        <!-- Morris Charts CSS -->
        {!! HTML::style('bower_components/morrisjs/morris.css') !!}
        
        <!-- Custom Fonts -->
        {!! HTML::style('bower_components/font-awesome/css/font-awesome.min.css') !!}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Stock Control</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    @include ('includes.dropdown-usermessages')                    
                    @include ('includes.dropdown-useractions')
                </ul>
                
                <!-- Barra Lateral com as ações de navegação-->
                @include ('includes.sidebar')
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">@yield('brand-title')</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        {!! HTML::script('bower_components/jquery/dist/jquery.min.js') !!}

        <!-- Bootstrap Core JavaScript -->
        {!! HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
        
        <!-- Metis Menu Plugin JavaScript -->
        {!! HTML::script('bower_components/metisMenu/dist/metisMenu.min.js') !!}
        
        <!-- Morris Charts JavaScript -->
<!--        {!! HTML::script('bower_components/raphael/raphael-min.js') !!}-->
<!--        {!! HTML::script('bower_components/morrisjs/morris.min.js') !!}-->
<!--        {!! HTML::script('js/morris-data.js') !!}-->

        <!-- Custom Theme JavaScript -->
        {!! HTML::script('dist/js/sb-admin-2.js') !!}
        
<!--        Scripts adicionais incluidos em cada página-->
        @yield('custom-scripts')

    </body>

</html>
