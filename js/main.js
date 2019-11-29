
"use strict"
const app = new Vue({
    el: "#app",
    data: {
        comentario: {
            puntaje: "",
            comentario: "",
            idUsr: '',
            idProducto: ''
        },
        url: "api/comentarios"
    },
    methods: {

        async getComentario() {
            console.log(this.comentario.puntaje + "   " + this.comentario.comentario + "   " + this.comentario.idUsr + "   " + this.comentario.idProducto);
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
        },
        async postComentario() {  
           try {
                 let promesa = await fetch(this.url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},       
                     body: JSON.stringify(this.comentario)
                 });
                 if (promesa.ok){
                     let respuesta = await promesa.text();
                     if (respuesta){
                         console.log(respuesta);
                     }
                 }
             } catch (error) {
                 console.log(error);
             }  
        },
        async deleteComentario() {
            try {
                 let promesa = await fetch(this.url+"/"+this.comentario.idUsr, {
                    method: 'DELETE',
                    headers: {'Content-Type': 'application/json'},       
                     body: JSON.stringify(this.comentario)
                 });
                 if (promesa.ok){
                     console.log(p);
                 }
             } catch (error) {
                 console.log(error);
             }    
        }
    }



})