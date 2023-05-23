let header = new Headers({"Content-Type": "application/json"});
let formulario = document.querySelector(".formulario");
let pre = document.querySelector("pre");

let estudiantes = [];

formulario.addEventListener("submit",async (e)=>{
    e.preventDefault();
    let data = Object.fromEntries(new FormData(e.target));
    estudiantes.push(data);
    config = {
        header: header,
        method: "POST",
        body: JSON.stringify(estudiantes),
    }
    let res = await (await fetch("api.php", config)).json();
    pre.innerHTML = `
    <div>
        <h3>El estudiante con la mayor nota fue :${res.notamayor.nombre}</h3>
        <h3>El estudiante con la menor nota fue :${res.notamenor.nombre}</h3>
        <h4>cantidad de estudiante femeninas :${res.cantmujeres}</h4>
        <h4>cantidad de estudiante masculinos :${res.canthombres}</h4>
    </div>
    <button onclick="location.reload()">Ingresar nuevos datos</button>`

    console.log(res);
    
    formulario.reset();
})

let detener = document.querySelector(".detener");
let selec = document.querySelector("section");

detener.addEventListener("click",(e)=>{
    formulario.style.display = "none";
    selec.style.display = "none";
    pre.style.display = "block";
})