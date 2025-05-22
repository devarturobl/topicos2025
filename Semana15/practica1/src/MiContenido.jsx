import { Fragment } from "react";

const MyButton = () => {
    const handleClick = () => {
        alert("Hola, has hecho click en el botón");
    }

    return (
        <button onClick={handleClick}>Haz click aquí</button>
    );
}

const EsVerdad = () => {
    return(
    <div>
        <img src="https://ajalpan.gob.mx/media/municipio/1636658845.jpg" alt="Placeholder" height={500} width={500}/>
        <p>Esto es verdadero</p>
    </div>
    );
}

const EsFalso = () => {
    return(
    <div>
        <img src="https://ajalpan.gob.mx/media/news/1747722803.jpg" alt="Placeholder" height={500} width={500}/>
        <p>Esto es falso</p>
    </div>
    );
}
const MiContenido = () => {
    const nombre = "Juanito Perez";
    const pais = {
        nombre: "España",
        continente: "Europa",
        poblacion: 47000000,
        capital: "Madrid"
    };
    const user = true;
    const emojics = ["😡", "😠", "😤", "😨", "😩", "😫", "🥵"];

    return (
        <Fragment>
            <p>Lorem {nombre} {pais.nombre} {pais.continente} ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt incidunt eligendi inventore corrupti, amet vero, cupiditate tempora necessitatibus provident repudiandae esse magni doloribus voluptatem suscipit officia neque quia culpa?</p>
            <img src="https://thispersondoesnotexist.com/" alt="Placeholder" height={500} width={500}/>
            <br></br>
            <MyButton />
            {/*user ? <EsVerdad/> : <EsFalso/> usando true y false el de abajo solo true*/}
            {user && <EsVerdad/>}
            <lu>
                {emojics.map((emoji) => (
                <li>{emoji}</li>
                ))}
            </lu>
            
        </Fragment>
    );
}

export default MiContenido;

/*
Alternativa al uso de fragmentos:
Caso 1 usando un div:

const MiContenido = () => {
    return (
        <div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt incidunt eligendi inventore corrupti, amet vero, cupiditate tempora necessitatibus provident repudiandae esse magni doloribus voluptatem suscipit officia neque quia culpa?</p>
            <img src="https://thispersondoesnotexist.com/" alt="Placeholder" height={200} width={200}/>
        </div>
    );
}

export default MiContenido;

Caso 2 usando un solo fracmento:

const MiContenido = () => {
    return (
        <>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt incidunt eligendi inventore corrupti, amet vero, cupiditate tempora necessitatibus provident repudiandae esse magni doloribus voluptatem suscipit officia neque quia culpa?</p>
            <img src="https://thispersondoesnotexist.com/" alt="Placeholder" height={200} width={200}/>
        </>
    );
}

export default MiContenido;

Caso 3 usando el componente Fragment de React:

import React, { Fragment } from 'react';
const MiContenido = () => {
    return (
        <Fractment>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt incidunt eligendi inventore corrupti, amet vero, cupiditate tempora necessitatibus provident repudiandae esse magni doloribus voluptatem suscipit officia neque quia culpa?</p>
            <img src="https://thispersondoesnotexist.com/" alt="Placeholder" height={200} width={200}/>
        </Fragment>
    );
}

export default MiContenido;
*/