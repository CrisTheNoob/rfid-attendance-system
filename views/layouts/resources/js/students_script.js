function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('show');
}

function filterByCourse() {
    const filter = document.getElementById("courseFilter").value;
    const rows = document.querySelectorAll("#studentTable tbody tr");

    rows.forEach(row => {
        const course = row.getAttribute("data-course");
        if (filter === "ALL" || course === filter) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}