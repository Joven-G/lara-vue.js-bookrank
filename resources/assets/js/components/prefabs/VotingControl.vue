<template>
	<div class="col-md-1 mr-auto row justify-content-center align-items-center">
		<div class="text-muted text-center" style="max-width: 50px !important;">
			<p></p>
			<i class="fa fa-sort-up fa-3x vote-arrow like" @click="likeBook()"></i>
			<span :class="'h2 vote-arrow number ' + getVoteClass()">{{formatVotes()}}</span>
			<i class="fa fa-sort-down fa-3x vote-arrow hate mt-3" @click="hateBook()"></i>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		props: ['book', 'onVote'],
		data() {
			return {

			};
		},
		mounted() {

		},
		methods: {
			likeBook() {
				const app = this;
				axios.put(`/api/books/${app.book.id}/vote-up`)
				.then(function (response) {
					app.onVote(response);
				});
			},
			hateBook() {
				const app = this;
				axios.put(`/api/books/${app.book.id}/vote-down`)
				.then(function (response) {
					app.onVote(response);
				});
			},
			getVoteClass(votes) {
				if (this.book.votes == 0) {
					return;
				}
				return this.book.votes > 0 ? 'text-success' : 'text-danger';
			},
			formatVotes() {
				var padZero = function(num) {
					if (num < 0) {
						return (num > -10) ? ('-0' + (num * -1 )) : num;
					}
					return num < 10 ? ('0' + num) : num;
				}
				return (this.book.votes) ? padZero(this.book.votes) : '00';
			}
		}
	}
</script>