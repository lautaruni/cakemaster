<!DOCTYPE html>
<html lang="es" ng-app="CakeMaster">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CakeMaster</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    {!! Html::style("frontend/css/bootstrap.min.css") !!}

    <!-- Custom CSS -->
    {!! Html::style("frontend/css/freelancer.css") !!}

    <!-- Custom Fonts -->
    {!! Html::style("frontend/font-awesome/css/font-awesome.min.css") !!}
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <style>
        #cakeTable{
            border:2px solid #030303;
            border-radius: 5px;
            border-bottom:20px solid #000;
        }
        table tr{
            border:1px solid #222;
        }
        table td{
            background-color:#0090FF;
            height: 100px;
            width: 125px;
            padding: 0 0px 0 10px;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index" ng-controller="cakeMakerCtrl">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Cake MASTER</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#portfolio">Portfolio</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">About</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    {!! Html::image("frontend/img/profile.png",null,array('class'=>'img-responsive')) !!}
                    <div class="intro-text">
                        <span class="name">Armá tus propias tortas</span>
                        <hr class="star-light">
                        <span class="skills">Mirá cuales son las <i class="fa fa-birthday-cake"></i> más ricas! </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <form>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Arma tu propia torta</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label>Alto</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" name="height" min="3" max="10" value="<% cake_row %>" ng-model="cake_row" ng-change="updateIngredientsQty()" />
                        </div1>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label>Ancho</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" name="width" min="3" max="10" value="<% cake_col %>" ng-model="cake_col"  ng-change="updateIngredientsQty()" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label>Ingredientes</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="number" name="ingredients_qty" min="3" max="100" value="<% cake_ingredientsQty %>" ng-model="cake_ingredientsQty" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">
                            <label>Nombre</label>
                        </div>
                        <div class="col-sm-10">
                            <input type="text" name="name" placeholder="Nombre de la torta" value="<% cake_Name %>" ng-model="cake_name"/>
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-sm-5">
                    <h2><% cake_name %></h2>
                    <!-- BEGIN CAKE -->
                    {!! $table; !!}
                    <!-- END CAKE -->
                    <h3 ng-model="cake_points">Puntos <% cake_points %></h3>
                    <button ng-click="getCakePoints()">Calcular puntos</button>
                </div>
            </div>
        </form>
    </section>
    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
                </div>
                <div class="col-lg-4">
                    <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <a href="#" class="btn btn-lg btn-outline">
                        <i class="fa fa-download"></i> Download Theme
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Freelancer</h3>
                        <p>Freelance is a free to use, open source Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2014
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    {!! Html::script('frontend/js/jquery.js') !!}
    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('frontend/js/bootstrap.min.js') !!}
    <!-- Plugin JavaScript -->
    {!! Html::script('frontend/js/') !!}
    {!! Html::script('frontend/js/classie.js') !!}
    {!! Html::script('frontend/js/cbpAnimatedHeader.js') !!}
    {!! Html::script('frontend/js/angular.min.js') !!}
    <!-- Custom Theme JavaScript -->
    {!! Html::script('frontend/js/freelancer.js') !!}
    {!! Html::script('frontend/js/cakemaster_app.js') !!}
</body>

</html>