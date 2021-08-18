<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>
            NeuroBox 
        </title>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Oswald:400" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> 
    </head>

    <body>

        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <a href="#">
                        <span class = "icon"><img src="neuro.png" alt="" width="50" height="50"></i></i></i></span>
                        <span class = "title">
                            <h2>
                                Innovator 
                            </h2>
                        </span>
                    </a>
                    </li>
                    <li>
                        <a href="#">
                        <span class = "icon" ><i class="material-icons">home</i></i></span>
                        <span class = "title">
                                Home
                        </span>
                    </a>
                    </li>
                    <li>
                        <a href='#'>
                        <span class = "icon"><i class="material-icons">build_circle</i></i></i></span>
                        <span class = "title">
                                Projects
                        </span>
                    </a>
                    </li>
                    <li>
                        <a href="login.php">
                        <span class = "icon"><i class="material-icons">login</i></span>
                        <span class = "title">
                                Login
                        </span>
                        </a>
                    </li>
                    <li>
                        <a href="Neurohomepage.php">
                        <span class = "icon"><i class="material-icons">logout</i></span>
                        <span class = "title">
                                Go back
                        </span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu();"></div>
                    <div class="headerTitle">
                        <label>
                            <h1> THE INNOVATOR </h1>
                        </label>
                    </div>
                </div>
                <div class="detail">
                    <div class="info">
                        <h3>In NeuroBox, the Innovator submits or upload their project(s) based on the category they are in to attract investors
                            to fund their work. The Innovator can choose whether to place their project(s) in two contracts namely: One to One contract 
                            an One to Many contract but not both at the same time. In a One to One contract, the Innovator may choose the most suitable 
                            investor to work with. In the One to Many contract, multiple investors invest a certain amount to your work while you monitor 
                            who has invested. Do you want to become an Innovator? Sign Up below!
                        </h3>
                    </div>
                </div>
                <a href="#" class="btn" style="left: 45%; width: 130px; height: 32px;"> Sign Up</a>
            </div>
        </div>

        <script>
            function toggleMenu(){
                    let toggle = document.querySelector('.toggle');
                    let navigation = document.querySelector('.navigation');
                    let main = document.querySelector('.main');
                    toggle.classList.toggle('active')
                    navigation.classList.toggle('active')
                    main.classList.toggle('active')
            }
        </script>

    </body>
</html>