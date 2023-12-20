<template>
    <div>
        <v-img class="mx-auto my-6" max-width="228"
            src="assets/logo.svg"></v-img>

        <v-card class="mx-auto pa-12 pb-8" elevation="8" max-width="448" rounded="lg">
            <v-form v-model="valid" style="width: 100%" @submit.prevent="handleLogin">
                <v-container>
                    <v-row>
                        <v-col cols="12">
                            <v-text-field v-model="email" label="E-mail" required></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-text-field v-model="password" label="Password" required type="password"></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <v-btn type="submit">Login</v-btn>
                        </v-col>
                    </v-row>
                </v-container>
                <v-card-text class="text-center">
                    <NuxtLink class="text-blue text-decoration-none" to="/register" rel="noopener noreferrer">Sign up now
                        <v-icon icon="mdi-chevron-right"></v-icon></NuxtLink>
                </v-card-text>
            </v-form>
        </v-card>
    </div>
</template>
<script setup lang="ts">
definePageMeta({
    layout: 'guest',
    middleware: 'guest'
})
const valid = ref(false)
const email = ref('')
const password = ref('')



async function handleLogin() {
    if (valid.value) {
        const response = await useFetch('/api/auth/login', {
            method: 'POST',
            body: {
                email: email.value,
                password: password.value,
            },
        })

        await navigateTo('/')
    }
}
</script>

<style scoped></style>