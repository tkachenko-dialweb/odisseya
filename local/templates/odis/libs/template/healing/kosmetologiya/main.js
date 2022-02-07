let acc = document.getElementsByClassName("accordion-title");
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        console.log(1)
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
}