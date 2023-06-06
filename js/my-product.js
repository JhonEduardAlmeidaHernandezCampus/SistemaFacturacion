export class myProduct extends HTMLElement{

    constructor() {
        super();
        const link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css";
        document.head.appendChild(link);
    }

    async components() {
        return await (await fetch("view/my-product.html")).text();
    }

    selection(e) {
        let $ = e.target;
        if ($.nodeName == "BUTTON") {
            let box = e.target.parentNode.parentNode;
            let inputs = box.querySelectorAll(`input`);
           
            if ($.innerHTML == "-") {
                inputs.forEach(element => {
                    if (element.name == "amount" && element.value == 0) {

                        if(box.parentNode.parentNode.children.length > 1 && box.parentNode.parentNode.children.length == 2){
                            box.remove();
                        } else {
                            box.parentNode.remove();
                        }

                    } else if (element.name == "amount") {
                        element.value--;
                    }
                });
            } else if ($.innerHTML == "+") {
                inputs.forEach(element => {
                    if (element.name == "amount") {
                        element.value++;
                    }
                });
            }
        }
    }

    connectedCallback(){
        this.components().then(html => {
            this.innerHTML = html;
            this.container = document.querySelector("#products");
            this.container.addEventListener("click", this.selection);
        })
    }
}
customElements.define("my-product", myProduct);