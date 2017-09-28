  <template>
    <div class="col-sm-4 col-sm-offset-4">
        <h2>Register</h2>
        <p>Register for a account...</p>

        <form @submit.prevent="onSubmit" @keydown="form.errors.clear()">

            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your Name" v-model="form.name">                   
                <span style="color:red;" class="help-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
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
                <input type="password" class="form-control" placeholder="Confirm Password" v-model="form.password_confirmation">
                <span style="color:red;" class="help-block" v-if="form.errors.has('password_confirmation')" v-text="form.errors.get('password_confirmation')"></span>
            </div>

            <button type='submit' class="btn btn-primary" >Access</button>
            <a class="btn btn-link" href="/login">Already have a Login?</a>

        </form>
    </div>
  </template>

  <script>

    import router from '../routes';

    export default {

        data() {
          return {
            form: new Form( {name:'', email:'', password:'', password_confirmation:''} )
          }
        },

        methods: {
            onSubmit() {
                this.form.save('/api/register')
                router.push('/login')
          }
        }

    }
  </script>