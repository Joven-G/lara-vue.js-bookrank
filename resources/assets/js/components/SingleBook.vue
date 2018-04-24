<template>
	<div class="pt-5">
		<book-card :book="book" :onVote="getSingleBook"></book-card>
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
		}
	}
</script>