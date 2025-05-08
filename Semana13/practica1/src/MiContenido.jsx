import { Fragment } from "react";

const MiContenido = () => {
    const nombre = "Juanito Perez";
    const pais = {
        nombre: "España",
        continente: "Europa",
        poblacion: 47000000,
        capital: "Madrid"
    };
    return (
        <Fragment>
            <p>Lorem {nombre} {pais.nombre} {pais.continente} ipsum dolor sit amet consectetur adipisicing elit. Eaque sunt incidunt eligendi inventore corrupti, amet vero, cupiditate tempora necessitatibus provident repudiandae esse magni doloribus voluptatem suscipit officia neque quia culpa?</p>
            <img src="https://thispersondoesnotexist.com/" alt="Placeholder" height={500} width={500}/>
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