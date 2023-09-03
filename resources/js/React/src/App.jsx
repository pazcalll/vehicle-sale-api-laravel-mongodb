import '../public/vendor/jquery/jquery'
import '../public/vendor/bootstrap/js/bootstrap'
import '../public/vendor/bootstrap/scss/bootstrap.scss'

import '../../../css/sb-admin-2.css'

import CheckAuth from './components/service/Auth'
import Login from './components/page/Login'
import { BrowserRouter, Route, Routes } from 'react-router-dom'

function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path='/login' element={<Login/>} />
        <Route path='/' element={<CheckAuth/>} >
          <Route index element={"logged in"} />
        </Route>
        <Route path='*' element={"Page not found"} />
      </Routes>
    </BrowserRouter>
  )
}

export default App
