//ESTE ARCHIVO VA A TENER LAS OPERACIONES TRIPICAS PARA COMUNICARSE CON EL CONTROLADOR

//getConsolas
const getConsolas = async (filtro ="todos")=>{
    let resp;
    if(filtro == "todos"){
         resp = await axios.get("api/consolas/get");
    }else{
         resp = await axios.get(`api/consolas/filtrar?filtro=${filtro}`);
    }
    return resp.data;
};
//crearConsola

const crearConsola = async(consola)=>{ //arrow functions

    //Estructura de peticion post al sservidor con axios
    let resp = await axios.post("api/consolas/post" , consola, {
        headers: {
            'content-type': 'application/json'
        }
    });
    return resp.data    
};




const eliminarConsola = async(id)=>{
    try{
        let resp = await axios.post("api/consolas/delete", {id}, {
            headers:{
                "Content-Type": "application/json"
            }
        });
        return resp.data == "ok";
    }catch(e){
        return false;
    }    

}