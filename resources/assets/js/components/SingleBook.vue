<template>
	<div class="pt-5">
		<book-card :book="book" :onVote="getSingleBook"></book-card>
		<div class="card mt-3">
			<div class="card-body">
				<button type="button" @click="deleteBook()" class="btn btn-block btn-link text-danger">
					<i class="fa fa-trash"></i>
					Delete this book
				</button>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		props: ['book_id'],
		data() {
			return {
				book: {
					author: {},
				},
			}
		},
		mounted() {
			this.getSingleBook();
		},
		methods: {
			parseResponse(response) {
				this.book = response.data.data;
			},
			getSingleBook() {
				const app = this;
				axios.get('/api/books/' + app.book_id)
				.then(function (response) {
					app.parseResponse(response);
				});
			},
			deleteBook() {
				const app = this;
				axios.delete('/api/books/' + app.book_id)
				.then(function(response) {
					// redirect to home
					location.href = '/';
				});
			}
		}
	}
</script>