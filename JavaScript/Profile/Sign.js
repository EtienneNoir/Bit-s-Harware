// Creating animation with JavaScript
  setInterval(rotate, 1);

  function rotate(){
      document.getElementById("load").style.transform = "rotate(90deg)";
      setInterval(function(){ document.getElementById("load").style.transform = "rotate(100deg)"},1);
      setInterval(rotate2,1);
      setInterval(function(){ document.getElementById("load").style.transform ="rotate(180deg)"},1);
      
      setInterval(rotate3,1);

    }

  function rotate2(){
  
    document.getElementById("load").style.transform = "rotate(150deg)";
      
  }
  
  function rotate3(){
    document.getElementById("load").style.transform = "rotate(200deg)";
      
  }
  /* The following function is used to make the Login Form replace the place Register form*/
  function LogIn(){

    document.getElementById("LogIn").style.display = "block";
    document.getElementById("main2").style.display = "none";


  }


  /* The following function makes the Register form visible again and the hodes the LogIn form when a button is selected */

  function Register(){

    document.getElementById("LogIn").style.display = "none";
    document.getElementById("main2").style.display = "block";


  }

/* The following is the rotating animation for the Log in Page */

  setInterval(rotate2, 1);

  function rotate2(){
      document.getElementById("load2").style.transform = "rotate(90deg)";
      setInterval(function(){ document.getElementById("load2").style.transform = "rotate(100deg)"},1);
      setInterval(rotate4,1);
      setInterval(function(){ document.getElementById("load2").style.transform ="rotate(180deg)"},1);
      
      setInterval(rotate5,1);

    }

  function rotate4(){
  
    document.getElementById("load2").style.transform = "rotate(150deg)";
      
  }
  
  function rotate5(){
    document.getElementById("load2").style.transform = "rotate(200deg)";
      
  }

