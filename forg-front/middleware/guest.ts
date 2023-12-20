import {useJWT} from "~/composables/useJWT";

export default defineNuxtRouteMiddleware((to, from) => {
    const nuxtApp = useNuxtApp()
    if (process.client && nuxtApp.isHydrating && nuxtApp.payload.serverRendered) return
    
    const jwt = useJWT()
    let token = jwt.getToken() as string
    
    if(token) return navigateTo('/')

})