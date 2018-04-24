<template>
	<div>
		<h4>{{author.full_name}}</h4>
		<hr>
	</div>
</template>
<script type="text/javascript">
	export default {
		props: ['author_id'],
		data() {
			return {
				author: {
					books: [],
				}
			};
		},
		mounted() {
			this.getSingleAuthor();
		},
		methods: {
			parseResponse(response) {
				this.author = response.data.data;
			},
			getSingleAuthor() {
				const app = this;
				axios.get('/api/authors/' + app.author_id)
				.then(function (response) {
					app.parseResponse(response);
				});
			},
		}
	}
</script>