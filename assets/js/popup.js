document.addEventListener("DOMContentLoaded", function () {
    fetch("/wp-json/artistudio/v1/popup")
        .then(response => response.json())
        .then(data => {
            data.forEach(popup => {
                let popupDiv = document.createElement("div");
                popupDiv.classList.add("popup-container");
                popupDiv.innerHTML = `<div class="popup">
                    <h2>${popup.title}</h2>
                    <p>${popup.description}</p>
                    <button class="close-popup">Close</button>
                </div>`;
                document.body.appendChild(popupDiv);

                popupDiv.querySelector(".close-popup").addEventListener("click", () => {
                    popupDiv.style.display = "none";
                });
            });
        })
        .catch(error => console.error("Error loading popups:", error));
});
