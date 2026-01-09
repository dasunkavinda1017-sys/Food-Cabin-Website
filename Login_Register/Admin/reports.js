document.querySelectorAll(".delete").forEach(btn => {
    btn.addEventListener("click", () => {
        if (confirm("Are you sure you want to remove this ad?")) {
            alert("Ad removed successfully!");
        }
    });
});

document.querySelectorAll(".approve").forEach(btn => {
    btn.addEventListener("click", () => {
        alert("Report dismissed, ad kept.");
    });
});
