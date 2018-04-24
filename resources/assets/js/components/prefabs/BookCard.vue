<template>
	<div class="card py-2 px-3">
		<div class="card-body">
			<div class="row col-md-12">
				<voting-control :book="book" :onVote="onVote"></voting-control>
				<div class="col-md-4 row justify-content-center align-items-self">
						<img src="https://www.opeeqo.com/public/assets/img/avatar-placeholder.jpg" class="img-fluid">
				</div>
				<div class="col-md-7 ml-auto">
					<h5><a :href="'/books/' + book.id">{{book.title}}</a></h5>
					<span>Author: <b>{{book.author.first_name}} {{book.author.last_name}}</b></span>
					<br>
					<span>Genre: <b>{{book.genre}}</b></span>
					<br>
					<span>Year: <b>{{book.year}}</b></span>
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