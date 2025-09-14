import { useEffect } from 'react'
import './App.css'

function App() {

  useEffect(() => {
    console.log('App On-live com CI/CD');
  }, []);

  return (
    <>
      <div>App On-live com CI/CD</div>
    </>
  )
}

export default App
