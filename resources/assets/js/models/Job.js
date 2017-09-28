class Job {

	static find(id) {
		return axios.get('/api/jobs/' + id)
	}

	static update(id) {
		return axios.put('/api/jobs/' + id)
	}

	static delete(id) {
		return axios.delete('/api/jobs/' + id)
	}

	static all(then) {

		return axios.get("/api/jobs")
			.then( ({data}) => then(data) );

	}
}

export default Job;