let formulario = document.querySelector(".formulario");
let pre = document.querySelector("pre");
let header = new Headers({"Content-Type":"application/json"});
let numeros = [];

formulario.addEventListener("submit", async(e)=>{
    e.preventDefault();
    let data = Object.fromEntries(new FormData(e.target));
    if(Number(data.numero) && data.numero != 0){
        numeros.push(data);
        let config = {
            Header: header,
            method: "POST",
            body: JSON.stringify(numeros),
        }
        let res = await (await fetch("api.php", config)).json();
        pre.innerHTML = `        
                    <h1>El numero mayor es: ${res.mayor}</h1>
                    <h1>El numero menor es: ${res.menor}</h1>
                    <h1>El promedio de los numeros es: ${res.promedio}</h1>
                    <h1>La suma de los nuemros es: ${res.suma}</h1>
                    <h1>La cantidad de numeros digitados fue: ${res.cant}</h1>
                    <button onclick="location.reload()">Ingresar nuevos datos</button>`;
        console.log(data);
        console.log(numeros);
        console.log(res);
        formulario.reset();
    }else{
        pre.style.display = "block";
        formulario.style.display= "none";
    }
})
