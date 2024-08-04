document.addEventListener("DOMContentLoaded", function() {
    var toggleButtons = document.querySelectorAll(".toggleContentButton");

    toggleButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var contentDiv = this.closest("tr").nextElementSibling.querySelector(".content-div");
            var hiddenRow = this.closest("tr").nextElementSibling;

            if (contentDiv.classList.contains("hidden")) {
                hiddenRow.classList.remove("row-hidden");
                hiddenRow.classList.add("row-visible");
                contentDiv.classList.remove("hidden");
                contentDiv.classList.add("show");
            } else {
                contentDiv.classList.remove("show");
                contentDiv.classList.add("hide");

                // Menghapus kelas hidden setelah transisi selesai
                setTimeout(function() {
                    contentDiv.classList.add("hidden");
                    contentDiv.classList.remove("hide");
                    hiddenRow.classList.remove("row-visible");
                    hiddenRow.classList.add("row-hidden");
                }, 0); // Sesuaikan dengan durasi transisi di CSS
            }
        });
    });
});
