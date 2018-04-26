<template>
	<div>
		<div class="card mb-4">
			<div class="card-body">
				<h4>{{author.full_name}}</h4>
				<span>{{getFormatedDate(author.birth)}}</span>
			</div>
		</div>
		<h5>Books</h5>
		<hr>
		<div class="card mt-1" v-for="book in books">
			<div class="card-body">
				<span>
					<a :href="`/books/${book.id}`">{{book.title}} ({{book.year}})</a> | {{book.votes}} votes
				</span>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
	export default {
		props: ['author_id'],
		data() {
			return {
				author: {},
				books: [],
			};
		},
		mounted() {
			this.getSingleAuthor();
		},
		methods: {
			parseResponse(response) {
				this.author = response.data.data;
			},
			getFormatedDate(date) {
				if (!date) {
					return '';
				}
				let birth =  new Date(date);
				let month_str = months[birth.getMonth() - 1];
				return `${month_str} ${birth.getDate()}, ${birth.getFullYear()}`;
			},
			getSingleAuthor() {
				const app = this;
				axios.get(`/api/authors/${app.author_id}`)
				.then(function (response) {
					app.parseResponse(response);
				});

				// books from author
				axios.get(`/api/authors/${app.author_id}/books`)
				.then(function(response) {
					app.books = response.data.data;
				});
			},
		}
	}
</script>