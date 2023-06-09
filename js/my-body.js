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

    async add(e){
        let $ = e.target;
        if ($.nodeName == "BUTTON") {
            let plantilla = this.querySelector("#products").children;
            plantilla = plantilla[plantilla.length-1];
            plantilla = plantilla.cloneNode(true);
            document.querySelector("#products").insertAdjacentElement("beforeend", plantilla);
        }
    }

    async send(){
        let input = document.querySelectorAll("input");
        let info = {}, producto = {}, lista = {}, data = {}, count = 0;
        producto.product = [];
        input.forEach((val, id) => {
            if (id <= 7) {
                info[val.name] = val.value;
            } else if (count <= 4) {
                lista[val.name] = val.value;
                count++;
                if (count == 4) {
                producto.product.push(lista);
                lista = {};
                count = 0;
                }
            }
        });
        data.info = info;
        data.producto = producto.product;

        let peticio = await fetch("uploads/app.php");
        let res = await peticio.text();                     //VER ESTE CODIGO 
        document.querySelector("pre").innerHTML = res;
    }

    connectedCallback() {
        this.components().then(html => {
            this.innerHTML = html;
            this.add = this.querySelector("#addInvoice").addEventListener("click", this.add.bind(this));
            this.send = this.querySelector("#finalizePurchase").addEventListener("click", this.send.bind(this));
        })
    }
}
customElements.define('my-body',myBody);