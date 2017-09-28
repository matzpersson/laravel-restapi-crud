class User {

	static find(id) {
		return axios.get('/api/users' + id)
	}

	static delete(id) {
		return axios.delete('/api/users/' + id)
	}

	static all(then) {

		return axios.get("/api/users")
			.then( ({data}) => then(data) );

	}
}

export default User;