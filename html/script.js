// Fetch and display lost/found items
db.collection("lost_found").orderBy("timestamp", "desc").onSnapshot((snapshot) => {
    const listingsDiv = document.getElementById("listings");
    listingsDiv.innerHTML = "";

    snapshot.forEach((doc) => {
        const item = doc.data();
        listingsDiv.innerHTML += `
            <div class="item">
                <img src="${item.imageUrl}" width="100">
                <h3>${item.name}</h3>
                <p>${item.description}</p>
            </div>
        `;
    });
});
document.getElementById("lostButton").addEventListener("click", function () {
    window.location.href = "lost_items.html"; // Redirect to Lost Items page
});
// Search Functionality
function searchItems() {
    const searchText = document.getElementById("searchBox").value.toLowerCase();
    const items = document.querySelectorAll(".item");

    items.forEach(item => {
        const title = item.querySelector("h3").innerText.toLowerCase();
        if (title.includes(searchText)) {
            item.style.display = "block";
        } else {
            item.style.display = "none";
        }
    });
}
function toggleDropdown() {
    let dropdown = document.getElementById("categoryDropdown");
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}

// Close dropdown when clicking outside
document.addEventListener("click", function (event) {
    let dropdown = document.getElementById("categoryDropdown");
    let button = document.querySelector(".category-btn");

    if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.style.display = "none";
    }
});
// Language Change Function (Mock - Replace with real translation API)
function changeLanguage(lang) {
    alert("Language changed to: " + lang.toUpperCase());
}
document.querySelector(".dropbtn").addEventListener("mouseover", function() {
    document.querySelector(".dropdown-content").style.display = "block";
});




document.querySelector(".dropdown").addEventListener("mouseleave", function() {
    document.querySelector(".dropdown-content").style.display = "none";
});
