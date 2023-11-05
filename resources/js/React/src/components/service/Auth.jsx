import axios from "axios"
import { Navigate, Outlet, useNavigate } from "react-router-dom"
import GeneralConst from "../../consts/GeneralConst"
import { useEffect, useState } from "react"

const CheckAuth = () => {
    const token = localStorage.getItem('token')
    const navigate = useNavigate()
    const [isLoading, setIsLoading] = useState(true)

    useEffect(() => {
        if (token) {
            axios.get(GeneralConst.baseApiUrl + '/user', {
                headers: {
                    Authorization: 'Bearer ' + token
                }
            })
            .then((res) => {
                navigate('/')
            })
            .catch((err) => {
                if (err.response.status == 401) {
                    navigate('/login')
                }
            })
            .finally(() => {
                setIsLoading(false)
            })
        } else {
            localStorage.removeItem('token')
            navigate('/login')
        }
    }, [])

    if (isLoading) return isLoading

    return <Outlet />
}

export default CheckAuth