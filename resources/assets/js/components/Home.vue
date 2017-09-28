  <!-- src/components/Home.vue -->

  <template>
    <div >
      <h3>Home</h3>

      <p>This is a plain, authenticated SPA Crud application with Laravel Rest Api on the back. Rest API can be consumed from this application on directly onto the API. Data on both these views are token authenticated. Styling is with <b>Bootstrap</b></p>

      <p><b><router-link to="/users" exact >Users Tab</router-link></b> is a simple, token authenticated listview using VueTable-2. No editing/selection tools.</p>
      <p><b><router-link to="/users" exact >Jobs Tab</router-link></b> show cases a bit more functionality with listview inline dialog editing. </p>


    </div>
    
  </template>


  <script>

    export default {}

  </script>
