function openSide() {

    document.getElementById("sideContent").style.visibility = "visible";


}

function closeSide() {

    document.getElementById("sideContent").style.visibility = "hidden";


}

 

function myFunction(image , price , description , P_ID ){

    document.getElementById("popMessage").style.display = "block";
    document.getElementById("backdrop").style.display = "block";   
    document.getElementById("images").src = image;
    document.getElementById("about").innerHTML = description;
    document.getElementById("price").innerHTML = "R "+ price;
    document.getElementById("ids").value = P_ID ;
    document.getElementById("Price").value = price ;

}

function close(){
    document.getElementById("popMessage").style.display = "none";
    document.getElementById("backdrop").style.display = "none"; 
}


function checkLogin(){

    window.location.href="Profile.php"; // Implication that you have to be logged in to add a product to the cart

}
document.getElementById("backdrop").addEventListener("click", close);// Function should be defined before this addEventListener, this is used instead of onclick because onclick does not appear to be working at run-tim
document.getElementById("close").addEventListener("click", close);

