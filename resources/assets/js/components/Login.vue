<template>
    <form v-on:submit.prevent="onSubmit" @keydown="form.errors.clear()">
      <div class="col-sm-4 col-sm-offset-4">
        <h2>Log In</h2>
        <p>Log in to your account.</p>

        <div class="alert alert-danger" v-if="error">
          <p>{{ error }}</p>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your email address" v-model="form.email">
          <span style="color:red;" class="help-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
        </div>

        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password" v-model="form.password">
          <span style="color:red;" class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></span>
        </div>

        <div class="form-group">

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>

        </div>

        <button type='submit' class="btn btn-primary">Login</button>
        <a class="btn btn-link" href="">Forgot Your Password?</a>

      </div>
    </form>
</template>

<script>

    import router from '../routes';
      
    export default {

        data() {
          return {
            error: false,
            form: new Form({email:'',password:''})

          }
        },

        methods: {

            onSubmit() {

                this.form.post('/api/login').then( (data) => {

                    auth.userName = data.user.name
                    auth.setToken(data.user.api_token)
                    axios.defaults.headers.common['Authorization'] = auth.getAuthBearer();

                    router.push({name: "Home"})
                })

            }
        }

    }

</script>