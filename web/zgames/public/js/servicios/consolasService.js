//ESTE ARCHIVO VA A TENER LAS OPERACIONES TRIPICAS PARA COMUNICARSE CON EL CONTROLADOR

//getConsolas
const getConsolas = async ()=>{
    let resp = await axios.get("api/consolas/get");
    return resp.data;
};
//crearConsola
const crearConsola = async(consola)=>{
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