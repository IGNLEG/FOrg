import {jwtDecode, type JwtPayload} from "jwt-decode";

export const useJWT = () => {
    const getToken = () => {
        return useCookie('token').value
    }

    const setToken = (token: string) => {
        const tokenCookie = useCookie('token')

        tokenCookie.value = token
    }

    const decodeToken = (token: string): JwtPayload => {
        return jwtDecode(token);
    }

    const isTokenExpired = (token: string) => {
        const tokenObject = decodeToken(token)

        return Date.now() >= (tokenObject.exp as number) * 1000;
    }


    return { getToken, setToken, isTokenExpired, decodeToken }
}