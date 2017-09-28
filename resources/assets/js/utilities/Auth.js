class Auth {

	constructor() {
 		this.authenticated = false;
		this.accessToken = null
		this.userName = ""
		this.userEmail = ""       
        this.deAuthorise()
    }
  
    setToken(token) {
    	this.accessToken = token;
    	this.authenticated = true;
    	localStorage.setItem('access_token', token);
    }

    deAuthorise() {
    	this.accessToken = null;
    	this.authenticated = false;
    	localStorage.setItem('access_token', this.accessToken);
    }

  	getAuthHeader() {
		return { 'Authorization': 'Bearer ' + localStorage.getItem('access_token') }
    }

    getAuthBearer() {
        return 'Bearer ' + localStorage.getItem('access_token')
    }
	

    logout() {
        this.deAuthorise()
    }

}

export default Auth;
