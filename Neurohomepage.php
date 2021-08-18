<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            NeuroBox Homepage
        </title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald:400" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    </head>

    <body>
        <div class="container">
        <div id="main_menu">
            <div class="logo_area">
                <a href=""><img src="neuro.png" alt="" height="300px" width="350px"></a>
            </div>
            <div class="inner_main_menu">
                <ul id="menu">
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Projects</a>
                        <ul>
                            <li><a href="">Dropdown Menu</a></li>
                            <li><a href="">Dropdown Menu</a>
                                <ul>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="">Dropdown Menu</a></li>
                            <li><a href="">Dropdown Menu</a></li>
                        </ul>
                    </li>
                    <li><a href="">Contact</a></li>
                    <li><a href="">Map</a>
                        <ul>
                            <li><a href="">Dropdown Menu</a></li>
                            <li><a href="">Dropdown Menu</a>
                                <ul>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                    <li><a href="">Dropdown Sub Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="">Dropdown Menu</a></li>
                            <li><a href="">Dropdown Menu</a></li>
                        </ul>
                    </li>
                    <li><a href="">Newsletter</a></li>
                </ul>
            </div>
        </div>
        <div class="header" style="margin-top: 250px;margin-left: -150;">
            <h1 style="margin-left:45%;"> NEUROBOX </h1>
            <h2 style="margin-left: 41%;">Great Ideas from Great Minds</h2>
        </div>
        <div class="cardbox">
            <a href="InvestorPage.php">
                <div class="investor" >
                    <div>
                        <div class="cardName"><h2>Investor</h2></div>
                    </div>
                    <div class="iconBox"> 
                        <i class="material-icons">local_atm</i>
                    </div>
                </div>
            </a>
            <a href="InnovatorPage.php">
                <div class="innovator">

                    <div>
                        <div class="cardName"><h2>Innovator</h2></div>
                    </div>
                    <div class="iconBox">
                        <i class="material-icons">psychology</i>
                    </div>
                </div>
            </a>
            
            </div>
    </div>
        
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script src="jquery.slicknav.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#menu').slicknav();
        });
    </script>
    </body>
</html>