<template>
	<div v-if="books.length > 0">
		<div class="row justify-content-between">
			<div class="col-md-6 my-3" v-for="book in books">
				<book-card :book="book" :onVote="parseResponse"></book-card>
			</div>
		</div>
	</div>
	<div v-else class="text-center text-muted">
		<p>No books yet.</p>
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
			const app = this;
			bus.$on('fetchBooks', function () {
				app.fetchBooks();
			});
			this.fetchBooks();
		},
		methods: {
			parseResponse(response) {
				this.books = response.data.data;
				this.meta = response.data.meta;
			},
			fetchBooks() {
				const app = this;
				axios.get('/api/books')
				.then(function(response) {
					app.parseResponse(response);
				});
			},
		},
	}
</script>