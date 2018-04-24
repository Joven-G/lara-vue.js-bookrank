<template>
	<div>
		<div class="card mt-5">
			<div class="card-body">
				<h4>Publish a book</h4>
				<hr>
				<div class="row">
					<div class="col row justify-content-center align-items-center text-center text-muted border-right mr-3 mb-4 cursor-pointer">
						<div>
							<i class="fa fa-camera fa-5x text-muted mb-3"></i>
							<br>
							<span>Upload cover</span>
						</div>
					</div>
					<div class="col-md-9 ml-auto">
						<form @submit.prevent="onSubmit">
							<div class="row">
								<div class="col-md-8">
									<div class="form-group">
										<label for="" class="label-form" for="bookTitle">Title</label>
										<input required type="text" class="form-control" id="bookTitle" v-model="book.title" placeholder="Book title...">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="" class="label-form" for="bookYear">Year</label>
										<input required type="number" class="form-control" id="bookYear" v-model="book.year"  pattern="####" placeholder="Book year...">
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="" class="label-form" for="bookAuthor">Author</label>
										<input required type="text" class="form-control" id="bookAuthor" v-model="book.author"  placeholder="Book author...">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="" class="label-form" for="bookGenre">Genre</label>
										<input required type="text" class="form-control" id="bookGenre" v-model="book.genre"  placeholder="Book genre...">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="" class="label-form" for="bookDescription">Description</label>
										<textarea required type="number" class="form-control" id="bookDescription" maxlength="255" rows="5" autosize="off" v-model="book.description"  placeholder="Book description..."></textarea>
									</div>
								</div>
								<div class="row no-gutters col-md-12">
									<div class="ml-auto">
										<button class="btn btn-danger" role="button" type="submit">Publish</button>
									</div>
								</div>
							</div>
						</form>
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
				book: {
					title: '',
					year: 2018,
					description: '',
					cover: '',
					author: '',
					genre: '',
				}
			}
		},
		methods: {
			onSubmit(ev) {
				const app = this;
				axios.post('/api/books', {
					title: app.book.title,
					year: app.book.year,
					description: app.book.description,
					cover: app.book.cover,
					author_id: 1,
					genre: app.book.genre
				}).then(function (response) {
					bus.$emit('fetchBooks');
					app.reset(ev);
				});
			},
			reset(ev) {
				this.book = {
					title: '',
					year: 2018,
					description: '',
					cover: '',
					author: '',
					genre: '',
				};
				ev.target.reset();
			}
		},
	}
</script>