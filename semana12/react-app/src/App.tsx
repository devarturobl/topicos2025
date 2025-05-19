//En react la funcion principal se llama App
// y se exporta por defecto

import MiComponente from "./miComponente";
import Segundo from "./segundo";


function App(){
  //Declara y usar una constante
  return <div>
    <MiComponente/>
    <MiComponente/>
    <MiComponente/>
    <MiComponente/>
    <MiComponente/>
    <MiComponente/>
    <MiComponente/>
    <Segundo/>
  </div>
  
}

export default App;