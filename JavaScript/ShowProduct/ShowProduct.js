function openSide() {

    document.getElementById("sideContent").style.visibility = "visible";


}

function closeSide() {

    document.getElementById("sideContent").style.visibility = "hidden";


}

let Product_id = 0; // Initiialising a global variable that will hold the product id 

function myFunction(image , price , description, P_id ){

    document.getElementById("popMessage").style.display = "block";
    document.getElementById("backdrop").style.display = "block";   
    document.getElementById("images").src = image;
    document.getElementById("about").innerHTML = description;
    document.getElementById("price").innerHTML = "R "+ price;
    Product_id = P_id; 

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

function AddCart (){

    window.location.href="Cart.php?id=Product_id";

}