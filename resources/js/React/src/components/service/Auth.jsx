import { Navigate, Outlet } from "react-router-dom"

const CheckAuth = () => {
    const token = localStorage.getItem('token')
    return token == '' || token == null ? <Navigate to={'/login'} /> : <Outlet />
}

export default CheckAuth