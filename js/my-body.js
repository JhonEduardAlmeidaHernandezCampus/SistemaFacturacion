export class myBody extends HTMLElement{
    constructor() {
        super();
        const link = document.createElement("link");
        link.rel = "stylesheet";
        link.href = "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css";
        document.head.appendChild(link);
    }

    async components(){
        return await (await fetch("view/my-body.html")).text();
    }

    selection(e){
        let $ = e.target;
        if($.nodeName == "BUTTON") {
            let inputss = this.querySelectorAll(`#${$.dataset.row} input`);
            if($.innerHTML == "-"){
                inputss.forEach(element => {
                    if(element.getAttribute("name") == "amount" && element.value == 0){
                        this.querySelector(`#${$.dataset.row}`).remove();
                    } else if(element.name == "amount"){
                        element.value--;
                    }
                });
            } else{
                inputss.forEach(element => {
                    if(element.getAttribute("name") == "amount"){
                        element.value++;
                    }
                });
            }
        }
    }

    connectedCallback(){
        this.components().then(html=>{
            this.innerHTML = html;
            this.container = this.querySelector("#products");
            this.container.addEventListener("click", this.selection);
        })
    }
}
customElements.define('my-body',myBody);