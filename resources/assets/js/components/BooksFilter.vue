<template>
	<div>
		<div class="mt-5">
			<h3 class="page-title">Archive - {{filter}}: {{val}}</h3>
		</div>
		<hr>
		<div class="row" v-if="books.length > 0">
			<div class="col-md-12 mt-5" v-for="book in books">
				<book-card :book="book"></book-card>
			</div>
		</div>
		<div v-else class="text-muted text-center">
			<p>No books yet.</p>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		props: ['filter', 'val'],
		data() {
			return {
				books: [],
			};
		},
		mounted() {
			this.fetchBooks();
		},
		methods: {
			fetchBooks() {
				const app = this;
				axios.get(`/api/books/${this.filter}/${this.val}`)
				.then(function(response) {
					app.books = response.data.data;
				});
			}
		}
	}
</script>