import {type AsyncData, type UseFetchOptions} from "nuxt/app";
import type {NavigationFailure, RouteLocationRaw} from "vue-router";

export default async (route: string, options: UseFetchOptions<any>): Promise<AsyncData<any, any>|Promise<void | NavigationFailure | false> | false | void | RouteLocationRaw> => {
    const jwt = useJWT()
    console.log("entered")
    let token = useCookie('token').value
    if (token) {
        const t = jwt.decodeToken(token)
        if (jwt.isTokenExpired(token)) {
            console.log('token expired')
            const token = useCookie('token')
            token.value = null
            const name = useCookie('name')
            name.value = null
            const roles = useCookie('roles')
            roles.value = null
            return navigateTo('/login')
        }
        token = useCookie('token').value
    }

    options.headers = {
        ...options.headers,
        Authorization: 'Bearer ' + token
    }


    const response = useFetch(useRuntimeConfig().public.apiURL + route, options)
    
    // console.log('response', response)

    return response
}