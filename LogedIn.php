<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/Index/Navigation/nav&Title.css">
    <link rel="stylesheet" href="CSS/Index/TableMain.css">
    <link rel="stylesheet" href="CSS/Index/Footer.css">
    <link rel="stylesheet" href="CSS/Animation.css">
    <link rel="icon" type="png" href="Images/favicon.png">
    <link rel="stylesheet" href="CSS/Sign/Sign.css">
    <title>Bit's Hardwares</title>

</head>


<body style="background-image:url(Images/Background.jpg) ; margin:auto; width: fit-content;">
    <h2 id="title"> <img src="Images/favicon.png" alt="Image of CPU" id="animation"> <Strong> Bit's Hardwares </Strong> </h2>

    <header>

        <nav id="nav">
            <ul>
                <li>
                    <a href="index.php" > Home </a> 
                </li>

                <li>
                    <a href="About.html" > About </a> 
                </li>

                <li>
                    <a href="javascript:void(0)"  > Your cart </a> 
                </li>

                <li>
                    <a href="javascript:void(0)"  > Search </a> 
                </li>
            </ul>
        </nav>

    </header>

    <div id="LogIn"  >
        <form action="MidPoint.php" id="fomSign2" name="OldAccount" method="post"> <!-- Post method, used to post things on the database -->
          <table> <!-- Used to make sure that all the content are aligned -->
            <h2 style="font-family: Monospace font-size=large"><img src="Images/248961.png" alt="Image of gear" id="load" class="Icons" > Log In </h2>
            <div>
              
               <img src="Images/user.png" alt="Image of User"  class="Icons"> 
          </div>

          <tr>
            <td><input autofocus type="email" class="field" id="Email" name="E" class="Icon1s" placeholder="Email" autofocus required ></td>
          </tr>

          <tr>
            <td> <input type="password" class="field" id="ps" name="p" class="Icons1" placeholder="Password" required> </td>
          </tr>
          
          <tr>
            <td> <input type="submit" value="Log In" id="SignUp" > </td>
          </tr>
          </table>

          <span> Don't have an Account ? </span> <a href="Profile.html" class="button" id="Log" style="color: #fc8129;">Register</a>
        </form>
      </div><br>

      <!--- The following code will be initially nullified and only displayed when the user click the Sign In button , it will replace the above code once displayed-->
    
    <footer style="background-image:url(Images/Background.jpg) ;">
        <h4 style="font-family:Serif; " > &copy;  Copyright <strong> Bit's Hardwares</strong> </h4>
        <p > <h5>All Rights Reserved </h5></p>
        <p > for more information click the following link: <a href="information.html" onMouseOver="this.style.color='#818181'" onMouseOut="this.style.color='#fc8129'" style="color: #fc8129;font-family: Monospace">click</a></p>
    </footer>

    
    <script type="text/javascript" src="JavaScript/Profile/Sign.js"></script>

</body>
</html>