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

    async send() {

        let inputs = document.querySelectorAll("input"); //hace referencia al documento principal
        let arrayInputs = Array.prototype.slice.call(inputs) // Convierte el notList en un array
        let Invoice = {}, Seller = {}, Client = {}, Products = {};
        let data = {
            Productos: []
        }

        arrayInputs.forEach((val, id) => {
            if(val.name.includes("Invoice")){
                Invoice[val.name] = val.value
            }

            else if(val.name.includes("Client")){
                Client[val.name] = val.value
            }

            else if (val.name.includes("Product")){
                Products[val.name] = val.value;
                if(Object.keys(Products).length == 4){
                    data.Productos.push(Products);
                    Products = {};
                }
            }
            
            else {
                Seller[val.name] = val.value
            }

        });

        data.InvoiceChiquito = Invoice;
        data.Seller = Seller;
        data.Client = Client;
        
        let config = {
            method: "POST",
            header: {"Content-Type": "application/json"},
            body:JSON.stringify(data)
        }

        let peticion = await(await fetch("uploads/app.php")).text();
        document.querySelector("pre").innerHTML = peticion;
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