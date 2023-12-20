<template>
  <v-layout class="font-display">

    <v-app-bar color="grey-darken-1" prominent class="d-md" v-model="isMobile">
      <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-app-bar-title class="font-weight-bold font-display">Menu</v-app-bar-title>
    </v-app-bar>

    <v-navigation-drawer v-model="drawer" expand-on-hover rail>
      <v-list>
        <v-list-item class="bg-grey-lighten-1 pa-3 ma-1 rounded" prepend-avatar="https://randomuser.me/api/portraits/lego/1.jpg"
          :title="name"></v-list-item>
      </v-list>

      <v-divider></v-divider>

      <v-list density="compact" nav>
        <v-list-item prepend-icon="mdi-home-city" title="Home" value="/" to="/"></v-list-item>
        <v-list-item prepend-icon="mdi-text-box-outline" title="Contracts" value="contract" to="/contracts"></v-list-item>
        <v-list-item prepend-icon="mdi-account-hard-hat-outline" title="Requisites" value="requisites"
          to="/requisites"></v-list-item>
        <v-list-item prepend-icon="mdi-logout" title="Log out" value="log_out" @click="logOut"></v-list-item>
      </v-list>
    </v-navigation-drawer>
    <v-main style="min-height: 300px">
      <v-container>
        <v-col>
          <v-row>
            <v-img class="mx-auto my-6" max-width="228" src="assets/logo.svg"></v-img>
          </v-row>
          <v-row>
            <slot />
          </v-row>
        </v-col>
      </v-container>
      <v-footer class="bg-black d-flex w-100">FOrg, 2023. All rights reserved.</v-footer>

    </v-main>
    
  </v-layout>

</template>

<style scoped>
.font-display {
  font-family: 'Nunito'
}
</style>

<script>
export default {
  data: () => ({
    drawer: true,
    isMobile: false,
    name: useCookie('name').value
  }),
  beforeDestroy() {
    if (typeof window === 'undefined') return

    window.removeEventListener('resize', this.onResize, { passive: true })
  },

  mounted() {
    this.onResize()

    window.addEventListener('resize', this.onResize, { passive: true })
  },

  methods: {
    onResize() {
      this.isMobile = window.innerWidth < 1280
    },
    logOut() {
      const token = useCookie('token')
      token.value = null
      const name = useCookie('name')
      name.value = null
      const roles = useCookie('roles')
      roles.value = null
      return navigateTo('/login')
    }
  },

}
</script>