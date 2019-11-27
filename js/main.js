
"use strict"
const app = new Vue({
    el: "#app",
    data: {
        comentario: {
            puntaje: "",
            comentario: "",
            idUsr: 34,
            idProducto: 5
        },
        url: "detalle/" + 5 + "/api/comentarios"
    },
    methods: {
        async comentar() {
            console.log(this.comentario.puntaje + "   " + this.comentario.comentario + "   " + this.comentario.idUsr + "   " + this.comentario.idProducto);
            // try {
            //     let p = await fetch(this.url, {
            //         method: 'POST',
            //         headers: {'Content-Type': 'application/json'},       
            //         body: JSON.stringify(this.comentario)
            //     });
            //     if (p.ok){
            //         console.log(p);
            //     }
            // } catch (error) {
            //     console.log(error);
            // }    
            try {
                let promesa = await fetch(this.url);
                if (promesa.ok) {
                    console.log(promesa);
                    let respuesta = await promesa.json();
                    if (respuesta) {
                        console.log(respuesta);
                    }
                } else {
                    alert("to mal");
                }
            } catch (error) {
                alert(error)
            }




        }
    }



})