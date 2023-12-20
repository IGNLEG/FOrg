import {H3Event} from "h3";
import { $fetch } from "ofetch";

export default defineEventHandler(async (event: H3Event) => {
    const body = await readBody(event)
    const response = await $fetch(useRuntimeConfig().public.apiURL + '/login', {
        method: 'POST',
        body: body,
        headers: {
            Accept: 'application/json',
        }
    })

    setCookie(event, 'token', response.token)
    setCookie(event, 'name', response.name)
    setCookie(event, 'roles', response.roles as string)


    return response
})