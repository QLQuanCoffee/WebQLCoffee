const item = document.querySelectorAll(".row.size .d-flex");
item.forEach((item) => {
    item.addEventListener("click", function () {
        item.foreach((element) => element.classList.remove("choose"));
        this.classList.add("choose");
    });
});
