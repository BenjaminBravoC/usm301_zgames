       const cargarMarcas = async ()=>{
           //1. ir a buscar el filtro-cbx
           let filtroCbx = document.querySelector("#filtro-cbx")
           //2. ir a buscar las marcas
           let marcas = await getMarcas();
           marcas.forEach(m=>{
               let option = document.createElement("option");
               option.innerText = m;
               option.value = m;
               filtroCbx.appendChild(option);
           });
       }; 







       const iniciarEliminacion = async function(){
            //1. obtener el id a eliminar
            let id = this.idConsola
            let resp = await Swal.fire({title:"Esta seguro?", text:"Esta operacion es irreversible"
            , icon:"error", showCancelButton:true});
            if(resp.isConfirmed){
                Swal.fire("La persona quiere eliminar");
                //1. eliminar
                if(await eliminarConsola(id)){
                    //2. si la eliminacion fue exitosa, recargar la tabla
                    let consolas = await getConsolas();
                    cargarTabla(consolas);
                    Swal.fire("consola eliminada", "consola eliminada exitosamente", "info");
                }else {

                    //3. si no fue exitosa, mostrar un mensaje de error
                    Swal.fire("Error", "No se pudo atender la solicitud", "info");
                }
            }else {
                Swal.fire("Cancelado", "Cancelado a peticion del usuario", "info");

            }
             
       }; 

       const cargarTabla = (consolas)=>{
            //1. obtener una referencia al cuerpo de la tabla
            let tbody = document.querySelector("#tbody-consola");
            tbody.innerHTML = "";
            //2. recorrer todas las consolas
            for(let i=0; i < consolas.length; ++i){
                //3. por cada consola generar una fila
                let tr = document.createElement("tr");
                //4. generarpor cada atributo de la consola, un td
                let tdNombre = document.createElement("td");
                tdNombre.innerText = consolas[i].nombre;
                let tdMarca = document.createElement("td");
                tdMarca.innerText = consolas[i].marca;
                let tdAnio = document.createElement("td");
                tdAnio.innerText = consolas[i].anio;
                let tdAcciones = document.createElement("td");
                let botonEliminar = document.createElement("button");
                botonEliminar.innerText= "Eliminar";
                botonEliminar.classList.add("btn", "btn-danger");
                botonEliminar.idConsola = consolas[i].id;
                botonEliminar.addEventListener("click", iniciarEliminacion);
                tdAcciones.appendChild(botonEliminar);
                //5. agregar los td al tr
                tr.appendChild(tdNombre);
                tr.appendChild(tdMarca);
                tr.appendChild(tdAnio);
                tr.appendChild(tdAcciones);
                //6. agregar el tr al cuerpo de la tabla
                tbody.appendChild(tr);
            } 
        };
        //El listener change sirve para cuando quieres ejecutar algo cuando el valor cambia
        document.querySelector("#filtro-cbx").addEventListener("change", async ()=>{
            let filtro = document.querySelector("#filtro-cbx").value
            let consolas = await getConsolas(filtro);
            cargarTabla(consolas);
        });



        document.addEventListener("DOMContentLoaded", async ()=>{
            //aqui voy a cargar la tabla de consolas, porque si entra aqui
            //lo que haga en esta parte estoy seguro que se esta ejecutando
            //cuando la pagina esta totalemente cargada
            await cargarMarcas();
            let consolas = await getConsolas();
            cargarTabla(consolas);
        });