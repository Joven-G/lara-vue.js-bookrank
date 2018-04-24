<template>
	<div>
		<div v-for="book in books">
			<span>{{book.title}}</span>
			<span>{{book.genre}}</span>
			<span>{{book.year}}</span>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		data() {
			return {
				books: [],
				meta: {},
			}
		},
		mounted() {
			this.fetchBooks();
		},
		methods: {
			fetchBooks() {
				const app = this;
				axios.get('/api/books')
				.then(function(response) {
					console.log(response.data);
					app.books = response.data.data;
					app.meta = response.data.meta;
				});
			}
		},
	}
</script>