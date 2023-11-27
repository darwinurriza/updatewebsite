
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";  
  document.getElementById("main-content").style.marginLeft = "250px";
  document.getElementById("main").style.display="none";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";  
  document.getElementById("main").style.display="block";  
}
function showUsers() {
  console.log("showUsers function is executed!");
  // Hide other tables if necessary
  hideCustomersTable();
  // Show the users table
  document.getElementById("users-table").style.display = "block";
}

function hideCustomersTable() {
  // Hide the customers table
  document.getElementById("customers-table").style.display = "none";
}
