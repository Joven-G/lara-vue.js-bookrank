<template>
	<div class="card py-2 px-3">
		<div class="card-body">
			<div class="row col-md-12">
				<voting-control :book="book" :onVote="onVote"></voting-control>
				<div class="col-md-4 row justify-content-center align-items-self">
						<img src="https://www.opeeqo.com/public/assets/img/avatar-placeholder.jpg" class="img-fluid rounded">
				</div>
				<div class="col-md-7 ml-auto">
					<h5><a :href="`/books/${book.id}`">{{book.title}}</a></h5>
					<span><a :href="`/authors/${book.author.id}`">{{book.author.full_name}}</a></span>
					<br>
					<span>Genre: <b><a :href="`/books/genre/${book.genre}`">{{book.genre}}</a></b></span>
					<br>
					<span>Year: <b><a :href="`/books/year/${book.year}`">{{book.year}}</a></b></span>
					<br>
					<p>{{book.description}}</p>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default {
		props: ['book', 'onVote'],
	}
</script>