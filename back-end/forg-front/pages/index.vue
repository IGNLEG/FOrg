<template>    
    <v-container  justify="center" >
        <v-row dense justify="center" >
            <v-col v-for="card in cards" :key="card.title" :cols="card.flex" sm="4">
                    <v-card class="mx-auto" max-height="325px" max-width="300px" link :to="card.to">
                        <v-img :src="card.src" class="align-end pa-2 ma-2 " gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
                            max-height="300px" max-width="300px" cover>
                            <v-card-title class="text-white" v-text="card.title"></v-card-title>
                    </v-img>                    
                    </v-card>
            </v-col>                
        </v-row>
    </v-container>
</template>

<script setup lang ='ts'>
definePageMeta({
    middleware: 'auth'
})
const cards = ref([
    { title: 'Contracts', src: 'https://images.unsplash.com/photo-1564846824194-346b7871b855?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', to:'contracts', flex: 12 },
    { title: 'Requisites', src: 'https://images.unsplash.com/photo-1512403754473-27835f7b9984?q=80&w=2000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', to:'/requisites', flex: 12 },
    { title: 'Log out', src: 'https://i.imgur.com/Lsa3xSr.png', to:'/logout', flex: 12 },
])

</script>

<style scoped></style>