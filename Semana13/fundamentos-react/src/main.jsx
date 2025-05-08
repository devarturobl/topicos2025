import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'
import MiComponente from './Mi.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <MiComponente/>
    <App />
  </StrictMode>,
)
