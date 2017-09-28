<template>

    <div >
        
        <nav class="navbar navbar-default">
          <div class="container">

            <div class="navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="">
                    Larvel Bootstrap Crud
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">

                    <li><router-link to="/" exact v-if="auth.authenticated">Home</router-link></li>
                    <li><router-link to="/jobs" v-if="auth.authenticated">Jobs</router-link></li>
                    <li><router-link to="/users" v-if="auth.authenticated">Users</router-link></li>
                    <li><router-link to="/register" v-if="!auth.authenticated" >Register</router-link></li>
                    <li><router-link to="/login" v-if="!auth.authenticated" >Login</router-link></li>
                    <li><a v-if="auth.authenticated" href="#" @click="logout">Log Out</a></li>

                </ul>
            </div>

          </div>    
        </nav>

        <div class="container" ><router-view></router-view></div>

    </div>

</template>

<script>

    import router from '../routes';

    export default {

        data() {
            return {
                auth: window.auth,
            }
        },
        methods: {
            logout() {
                auth.deAuthorise()
                router.push({name:"Login"})
            }
        }

    }
    
</script>