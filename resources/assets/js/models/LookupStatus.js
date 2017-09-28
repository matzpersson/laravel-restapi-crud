class LookupStatus {

	static find(id) {
		return axios.get('/api/lookups/statuses/' + id)
	}

	static delete(id) {
		return axios.delete('/api/lookups/statuses/' + id)
	}

	static all(then) {

		return axios.get("/api/lookups/statuses")
			.then( ({data}) => then(data) );

	}
}

export default LookupStatus;