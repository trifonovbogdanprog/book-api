<template>
    <div class="container h-100">
        <div class="form-group">
            <router-link :to="{name: 'createbook'}" class="btn btn-success">Create new book</router-link>
            <router-link :to="{name: 'register'}" class="btn btn-success">Register</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Books list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Year</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="book, index in books">
                        <td>{{ book.name }}</td>
                        <td>{{ book.author }}</td>
                        <td>{{ book.present_year }}</td>
                        <td>
                            <router-link :to="{name: 'editbook', params: {id: book.id}}" class="btn btn-xs btn-default">
                                <i class="glyphicons fa-pencil"></i> Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs bt-default"
                               v-on:click="deleteEntry(book.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                books: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/books')
                .then(function (resp) {
                    app.books = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load books");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/books/' + id)
                        .then(function (resp) {
                            app.books.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete book");
                        });
                }
            }
        }
    }
</script>