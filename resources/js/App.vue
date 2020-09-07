<template>
    <main>
        <router-view></router-view>
        <FlashMessage position="right top"></FlashMessage>
    </main>
</template>

<script>
    import * as apiService from './services/auth';
    export default {
        name: "App",
        beforeCreate: async function(){
            try {
                if(apiService.isLoggedIn()){
                    const response = await apiService.getProfile();
                    this.$store.dispatch('authenticate_user', response.data.user);
                }
            } catch(error) {

            }
        }

    }
</script>
