<template>
	<div>
		<div class="card p-2 my-3" v-for="book in books">
			<div class="card-body">
				<div class="row">
					<div class="col-md-1 row justify-content-center align-items-center">
						<div class="text-muted text-center">
							<p></p>
							<i class="fa fa-sort-up fa-3x vote-arrow like" @click="likeBook(book)"></i>
							<span :class="'h1 vote-arrow number ' + getVoteClass(book.votes)">{{formatVotes(book.votes)}}</span>
							<i class="fa fa-sort-down fa-3x vote-arrow hate mt-3" @click="hateBook(book)"></i>
						</div>
					</div>
					<div class="col-md-2">
						<div>
							<img src="https://www.opeeqo.com/public/assets/img/avatar-placeholder.jpg" class="img-responsive img-book-cover">
						</div>
					</div>
					<div class="col-md-9">
						<h4><a href="#">{{book.title}}</a></h4>
						<span>Genre: <b>{{book.genre}}</b></span>
						<br>
						<span>Year: <b>{{book.year}}</b></span>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur diam sagittis, consequat quam quis, condimentum massa. </p>
					</div>
				</div>
			</div>
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
			likeBook(book) {
				const app = this;
				axios.put('/api/books/' + book.id + '/vote-up')
				.then(function (response) {
					app.parseResponse(response);
				});
			},
			hateBook(book) {
				const app = this;
				axios.put('/api/books/' + book.id + '/vote-down')
				.then(function (response) {
					app.parseResponse(response);
				});
			},
			getVoteClass(votes) {
				if (votes == 0) {
					return;
				}
				return votes > 0 ? 'text-success' : 'text-danger';
			},
			formatVotes(votes) {
				var padZero = function(num) {
					if (num < 0) {
						return (num > -10) ? ('-0' + (num * -1 )) : num;
					}
					return num < 10 ? ('0' + num) : num;
				}
				return (votes) ? padZero(votes) : '00';
			}
		},
	}
</script>