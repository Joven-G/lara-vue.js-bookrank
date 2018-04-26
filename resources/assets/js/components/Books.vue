<template>
	<div v-if="books.length > 0">
		<div class="row justify-content-between">
			<div class="col-md-6 my-3" v-for="book in books">
				<book-card :book="book" :onVote="parseResponse"></book-card>
			</div>
			<div class="col-md-12">
			</div>
		</div>
		<div class="navigation mt-5">
			<paginate
		        :page-count="pageCount"
		        :click-handler="fetchBooks"
		        :prev-text="'Prev'"
		        :next-text="'Next'"
		        :page-class="'page-item'"
		        :prev-class="'page-item'"
		        :prev-link-class="'page-link'"
		        :next-class="'page-item'"
		        :next-link-class="'page-link'"
		        :page-link-class="'page-link'"
		        :container-class="'pagination justify-content-center'">
			</paginate>
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
				pageCount: 1,
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
				this.pageCount = this.meta.last_page;
			},
			fetchBooks(page = 1) {
				const app = this;
				axios.get(`/api/books?page=${page}`)
				.then(function(response) {
					app.parseResponse(response);
				});
			},
		},
	}
</script>