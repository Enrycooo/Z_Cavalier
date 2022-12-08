let r_affiche = document.getElementById("affiche");
let resp = document.getElementById("resp");
alert(resp);
r_affiche.addEventListener("click", () => {
  if (getComputedStyle(resp).display != "none") {
    resp.style.display = "none";
  } else {
    resp.style.display = "block";
  }
})