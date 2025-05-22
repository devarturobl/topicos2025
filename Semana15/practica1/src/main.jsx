import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import {Encabezado, Pie, Contenido} from './MiApp.jsx'
import MiContenido from './MiContenido.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <App />
    <Encabezado />
    <Contenido />
    <MiContenido />
    <Pie />
  </StrictMode>,
)
