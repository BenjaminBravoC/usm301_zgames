
//async espera q se envien los datos, await espera
const cargarMarcas = async()=>{
    //1. Ir a buscar las marcas a la API
    let resultado = await axios.get("api/marcas/get");
    let marcas = resultado.data;
    //console.log(resultado.data);

    //2. Cargar las marcas dentro del select
    let marcaSelect = document.querySelector("#marca-select");
    marcas.forEach(m=>{ //foreach por cada uno, el for comun recorre con indice
        let option = document.createElement("option");
        option.innerText = m;
        marcaSelect.appendChild(option);
    });
};
//Esto ejecuta un codigo aseguarndose que el total de la pagina
//incluidos todos sus recursos este cargado antes de jecutar
document.addEventListener("DOMContentLoaded", ()=>{
    cargarMarcas();
}); 
document.querySelector("#registrar-btn").addEventListener("click", async ()=>{
    let nombre = document.querySelector("#nombre-txt").value;
    let marca = document.querySelector("#marca-select").value;
    let anio = document.querySelector("#anio-txt").value;
    let consola = {};
    consola.nombre = nombre;
    consola.marca = marca;
    consola.anio = anio
    //falta validar
    //solo esta linea hace:
    //1. va al controlador, le pasa los datos
    //2. el controlador crea el modelo
    //3. el modelo ingresa en la base de datos
    //4. todos felices
    let res = await crearConsola(consola);
    //mostrar un mensaje de texto con sweet alert
    await Swal.fire("consola creada", "consola creada exitosamente","info")
    //La linea que viene despues del Swal.fire se va a ejecutar solo cuando la persona aprete el OK
    //aqui a redirigir a otra pagina
    
    window.location.href = "ver_consolas";
    //abrir nueva pestaña
    //windows.opne("www.google.cl","_blank")
      
});