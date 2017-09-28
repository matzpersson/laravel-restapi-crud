import './bootstrap';
import App from './components/App.vue'
import router from './routes';

// -- Redirect to Login page if not authenticated
router.afterEach((to, from, next) =>  {

	if (to.path != '/register') {

		if (to.path != '/login' & !auth.authenticated ) {
			router.push('/login')
		}
			
	}

})

new Vue(Vue.util.extend({ router }, App)).$mount('#app');
