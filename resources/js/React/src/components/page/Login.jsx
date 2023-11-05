import { useNavigate } from "react-router-dom"
import FormLogin from "../macro/form/FormLogin"
import { useEffect, useState } from "react"
import axios from "axios"
import GeneralConst from "../../consts/GeneralConst"

const Login = () => {
    const token = localStorage.getItem('token')
    const navigate = useNavigate()
    const [isUseEffectDone, setIsUseEffectDone] = useState(false)

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
                setIsUseEffectDone(true)
                navigate('/login')
            })
        } else setIsUseEffectDone(true)
    }, [])

    return (
        <>
            {
                isUseEffectDone ?
                    <div className="container">
                        <div className="row justify-content-center">
                            <div className="col-xl-10 col-lg-12 col-md-9">
                                <FormLogin />
                            </div>
                        </div>
                    </div>
                :
                    ''
            }
        </>
    )
}

export default Login