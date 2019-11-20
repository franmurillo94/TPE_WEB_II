
const app = new Vue({
    el : "#app",
    data: {
        comentario: {
            puntaje : "",
            comentario: "",
            idUsr : "",
            idProducto: ""
        },
        url = "api/comentarios"
    },
    methods: {
        async comentar(){
            console.log(this.comentario.puntaje+"   "+this.comentario.comentario+"   "+this.comentarioidUsr+"   "+this.comentario.idProducto);
        
            let p = await fetch(this.url, { "method": "POST",
            'headers': { 'Content-Type' : 'application/json'},
            "body": JSON.stringify(this.comentario)

            });
            if (p.ok){
                let respuesta = await p.json();
                if (respuesta){
                    console.log("se guardo todo");
                }
            }





        }
    }
    


})