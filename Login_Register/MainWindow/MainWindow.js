 // Placeholder for future JS interactions
document.addEventListener("DOMContentLoaded", function() {
    console.log("Main window loaded!");
});

 // reporting 
function toggleReport(id) {
    const box = document.getElementById("report-" + id);
    if (!box) return;

    box.style.display = (box.style.display === "none") ? "block" : "none";
}

 
function submitReport(id) {
    const textArea = document.getElementById("text-" + id);
    if (!textArea) return;

    const text = textArea.value.trim();
    if (text === "") {
        alert("Please type a report");
        return;
    }

    // Send report via POST to PHP
    fetch("submit_report.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "product_id=" + id + "&report=" + encodeURIComponent(text)
    })
    .then(response => response.text())
    .then(msg => {
        alert(msg);
        // Hide textarea and clear
        const box = document.getElementById("report-" + id);
        if (box) box.style.display = "none";
        textArea.value = "";
    })
    .catch(err => {
        console.error("Error submitting report:", err);
        alert("Failed to submit report");
    });
}

 
