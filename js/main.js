
"use strict"
const app = new Vue({
    el: "#app",  
    created() {
       this.getComentario();
      },
    data: {
        comentario: {
            puntaje: "",
            comentario: "",
            usuario: {
                id_usuario : '',
                nombre : '',
                admin : 1
            },
            idProducto: ''
        },
        url: "api/comentarios",
        respuesta : []
    },
    methods: {

        async getComentario() {
            let id = document.querySelector("#idProducto").value.json();
            try {
                let promesa = await fetch(this.url+"/"+id);
                if (promesa.ok) {
                    let respuesta = await promesa.json();
                    if (respuesta) {
                        console.log(respuesta);
                       this.respuesta = respuesta;
                    }
                } else {
                    alert("Ocurrio un error");
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
                 let promesa = await fetch(this.url+"/"+this.comentario.usuario.idUsr, {
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