import { useEffect, useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'

function App() {
  const [count, setCount] = useState(0);

  useEffect(() => {
    console.log('App On-live com CI/CD');
  }, []);

  return (
    <>
      <div>teste</div>
    </>
  )
}

export default App
