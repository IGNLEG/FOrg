<template>
    <div>

    </div>
</template>

<script setup lang="ts">
logOut()
function logOut() {
      const token = useCookie('token')
      token.value = null
      const name = useCookie('name')
      name.value = null
      const roles = useCookie('roles')
      roles.value = null
      return navigateTo('/login')
    }
</script>

<style scoped>

</style>