<template>
    <div class="container h-100">
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new book</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Name</label>
                            <input type="text" v-model="book.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Author</label>
                            <input type="text" v-model="book.author" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Present year</label>
                            <input type="text" v-model="book.present_year" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.bookId = id;
            axios.get('/api/v1/books/' + id)
                .then(function (resp) {
                    app.book = resp.data;
                })
                .catch(function () {
                    alert("Could not load your book")
                });
        },
        data: function () {
            return {
                bookId: null,
                book: {
                    name: '',
                    author: '',
                    present_year: ''
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newbook = app.book;
                axios.patch('/api/v1/books/' + app.bookId, newbook)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your book");
                    });
            }
        }
    }
</script>